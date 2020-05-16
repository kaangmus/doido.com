<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Auth; //use thư viện auth

class productModel extends Model
{
    //
    protected $table = 'product';
    protected $cate_product, $media,$rate;

    public function __construct()
    {
        $this->cate_product = new cate_productModel();
        $this->media = new mediaModel();
        $this->rate=new rateModel();
    }
    public function listAllProduct()
    {
        $items=DB::table('product')->orderBy('created_at', 'DESC')->get();
        return $items;
    }
    public function listAll()
    {
//        $item = productModel::orderBy('created_at', 'DESC')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->select('*','AVG(rate.rating)')->get();
//        $items=DB::table('rate')
//            ->join('product', 'product.id', '=', 'rate.idproduct')
//            ->select('product.id')
//            ->avg('rate.rating')
//            ->groupBy('product.id')
//            ->get();
        $items=DB::select('SELECT product.id,product.title,product.describe,product.tag,product.price,product.status,product.statustype,product.contents,product.coverimg,product.desiredproducts,product.iduser,AVG(rate.rating) as diem FROM product,rate WHERE product.id=rate.idproduct and toggle=1 GROUP BY product.id,product.title,product.describe,product.tag,product.price,product.status,product.statustype,product.contents,product.coverimg,product.desiredproducts,product.iduser');
        return $items;
    }

    public function listProduct()
    {
        if (Auth::user()->lever == 0) {
            $item = productModel::orderBy('created_at', 'DESC')->get();
        } else {
            $item = productModel::where('iduser', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        }
        return $item;
    }

    public function addItem(Request $request)
    {
        try {
            $item = new productModel();
            $item->title = $request->title;
            $item->price = $request->price;
            $item->describe = $request->describe;
            $item->tag = $request->tag;
            $item->iduser = Auth::user()->id;
            $item->statustype = $request->statustype;
            $item->contents = $request->contents;
            $item->status = $request->status;
            $item->toggle = 1;
            $item->desiredproducts = $request->desiredproducts;
            if ($request->hasFile('coverimg')) {
                $filename = $request->coverimg->getClientOriginalName();
                $item->coverimg = $filename;
                $request->coverimg->move('public/media', $filename);
            }
            $item->save();
            if (isset($request->idcategory)) {
                $this->cate_product->addItem($item->id, $request->idcategory);
            }
            $this->media->addItem($request, $item->id, null);
            $this->rate->addItemProduct($item->id);
            return $item->id;
        } catch (Exception $ex) {
            report($ex);
            return false;
        }
    }

    public function showItem($id)
    {
        $item = productModel::find($id);
        return $item;
    }
    public function updateStatus($id,$statustype)
    {
        $item = productModel::find($id);
        $item->statustype = $statustype;
        $item->save();
    }

    public function updateItem(Request $request, $id)
    {
        try {
            $item = productModel::find($id);
            $item->title = $request->title;
            $item->price = $request->price;
            $item->describe = $request->describe;
            $item->tag = $request->tag;
            $item->iduser = Auth::user()->id;
            $item->statustype = $request->statustype;
            $item->contents = $request->contents;
            $item->status = $request->status;
            $item->toggle = $request->toggle;
            $item->desiredproducts = $request->desiredproducts;
            if ($request->hasFile('coverimg')) {
                $filename = $request->coverimg->getClientOriginalName();
                $item->coverimg = $filename;
                $request->coverimg->move('public/media', $filename);
                //$request->coverimg->storeAs('media',$filename);
            }
            $item->save();
            if (isset($request->idcategory)) {
                $this->cate_product->deleteID($id);
                $this->cate_product->addItem($item->id, $request->idcategory);
            }
            if (isset($request->media)) {
                $this->media->deleteID($id);
                $this->media->addItem($request, $item->id);
            }
            return true;
        } catch (Exception $ex) {
            report($ex);
            return false;
        }

    }
    public function updateToggle($id,$toggle)
    {
        $item = productModel::find($id);
        $item->toggle=$toggle;
        $item->save();
    }
    public function deleteItem($id)
    {
        try {
            productModel::destroy($id);
            return true;
        } catch (Exception $ex) {
            report($ex);
            return false;
        }
    }

    public function product()
    {
        $items = DB::table('product')
            ->where('toggle',1)
            ->select('product.*')
            ->paginate(9);
//            ->get();
        return $items;
    }

    public function searchItem($search)
    {
        $items = DB::table('product')
//            ->join('cate_product', 'product.id', '=', 'cate_product.idproduct')
//            ->join('category', 'category.id', '=', 'cate_product.idcategory')
            ->where('product.title', 'like', '%' . $search . '%')
            ->where('toggle',1)
            ->orwhere('product.tag', 'like', '%' . $search . '%')
            ->select('product.*', 'product.id')
            ->paginate(9);
        if (count($items) == 0) {
            $items = $this->searchCategoryProduct($search);
        }
        return $items;
    }

    public function searchCategoryProduct($search)
    {
        $items = DB::table('product')
            ->join('cate_product', 'product.id', '=', 'cate_product.idproduct')
            ->join('category', 'category.id', '=', 'cate_product.idcategory')
            ->where('category.title', 'like', '%' . $search . '%')
            ->where('toggle',1)
            ->select('product.*')
            ->paginate(9);
        return $items;
    }

    public function searchPrice($min, $max)
    {
        $items = DB::table('product')
            ->select('product.*', 'product.id')
            ->whereBetween('price', [$min, $max])
            ->paginate(9);
        return $items;
    }

    public function listProductCate($id)
    {
        $items = DB::table('cate_product')
            ->join('product', 'cate_product.idproduct', '=', 'product.id')
            ->where('cate_product.idcategory', $id)
            ->get();
        return $items;
    }
    public function countMonth()
    {
        $item = DB::select('SELECT 
    (MONTH(created_at)) AS month, COUNT(*) AS so
FROM
    `product`
GROUP BY month(created_at)
ORDER BY month DESC
LIMIT 2');
        return $item;
    }
}
