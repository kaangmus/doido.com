<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
use Auth; //use thư viện auth

class productModel extends Model
{
    //
    protected $table='product';
    protected $cate_product, $media;
    public function __construct()
    {
        $this->cate_product= new cate_productModel();
        $this->media= new mediaModel();
    }
    public function listAll()
    {
        $item=productModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function listProduct()
    {
        if(Auth::user()->lever==0)
        {
            $item=productModel::orderBy('created_at','DESC')->get();
        }
        else
        {
            $item=productModel::where('iduser',Auth::user()->id)->orderBy('created_at','DESC')->get();
        }
        return $item;
    }
    public function addItem(Request $request)
    {
        try{
            $stringStyle='';
            $item= new productModel();
            $item->title=$request->title;
            $item->price=$request->price;
            $item->describe=$request->describe;
            $item->tag=$request->tag;
            $item->iduser=Auth::user()->id;
            if(isset($request->style))
            {
                foreach ($request->style as $itemStyle)
                {
                    $stringStyle=$stringStyle.$itemStyle.",";
                }
                $item->style=$stringStyle;
            }
            $item->count=$request->count;
            $item->contents=$request->contents;
            $item->status=$request->status;
            $item->desiredproducts=$request->desiredproducts;
            if($request->hasFile('coverimg'))
            {
                $filename=$request->coverimg->getClientOriginalName();
                $item->coverimg=$filename;
                $request->coverimg->move('public/media',$filename);
                //$request->coverimg->storeAs('media',$filename);
            }
            $item->save();
            if(isset($request->idcategory))
            {
                $this->cate_product->addItem($item->id,$request->idcategory);
            }
            $this->media->addItem($request, $item->id,null);
            return $item->id;
        }
        catch (Exception $ex){
            report($ex);
            return false;
        }
    }
    public function showItem($id)
    {
        $item=productModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item=productModel::find($id);
            $stringStyle='';
            $item->title=$request->title;
            $item->price=$request->price;
            $item->describe=$request->describe;
            $item->tag=$request->tag;
            $item->iduser=Auth::user()->id;
            if(isset($request->style))
            {
                foreach ($request->style as $itemStyle)
                {
                    $stringStyle=$stringStyle.$itemStyle.",";
                }
                $item->style=$stringStyle;
            }
            $item->count=$request->count;
            $item->contents=$request->contents;
            $item->status=$request->status;
            $item->desiredproducts=$request->desiredproducts;
            if($request->hasFile('coverimg'))
            {
                $filename=$request->coverimg->getClientOriginalName();
                $item->coverimg=$filename;
                $request->coverimg->move('public/media',$filename);
                //$request->coverimg->storeAs('media',$filename);
            }
            $item->save();
            if(isset($request->idcategory))
            {
                $this->cate_product->addItem($item->id,$request->idcategory);
            }
            $this->media->addItem($request, $item->id);
            return true;
        }catch (Exception $ex)
        {
            report($ex);
            return false;
        }

    }
    public function deleteItem($id)
    {
        try{
            productModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
    public function product()
    {
        $items = DB::table('product')
            ->join('cate_product', 'product.id', '=', 'cate_product.idproduct')
            ->join('category', 'category.id', '=', 'cate_product.idcategory')
            ->select('product.*')
            ->get();
        return $items;
    }
    public function searchItem($search)
    {
        $items = DB::table('product')
            ->join('cate_product', 'product.id', '=', 'cate_product.idproduct')
            ->join('category', 'category.id', '=', 'cate_product.idcategory')
            ->where('product.title', 'like', '%'.$search.'%')
            ->select('product.*')
            ->get();
        if(is_array($items)==false)
        {
            $items=$this->searchCategoryProduct($search);
        }
        return $items;
    }
    public function searchCategoryProduct($search)
    {
        $items = DB::table('product')
            ->join('cate_product', 'product.id', '=', 'cate_product.idproduct')
            ->join('category', 'category.id', '=', 'cate_product.idcategory')
            ->where('category.title', 'like', '%'.$search.'%')
            ->select('product.*')
            ->get();
        return $items;
    }
    public function listProductCate($id)
    {
        $items = DB::table('cate_product')
            ->join('product','cate_product.idproduct','=','product.id')
            ->where('cate_product.idcategory',$id)
            ->get();
        return $items;
    }
}
