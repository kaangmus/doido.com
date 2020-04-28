<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\categoryModel;
use App\Model\productModel;
use Illuminate\Http\Request;

class productController extends Controller
{
    //
    private $product, $category;
    public function __construct()
    {
        $this->category= new categoryModel();
        $this->product= new productModel();
    }
    public function listAll()
    {
        $data['items']=$this->product->listProduct();
        return view('admin.product',$data);
    }
    public function addShow()
    {
        $data['listCate']=$this->category->listAll();
        return view('admin.editProduct',$data);
    }
    public function addItem(Request $request)
    {
        $this->product->addItem($request);
        return redirect()->intended('admin/product');
    }
    public function updateShow($id)
    {
        $data['listCate']=$this->category->listAll();
        $data['item']=$this->product->showItem($id);
        return view('admin.editProduct',$data);
    }
    public function updateItem(Request $request, $id)
    {
        $this->product->updateItem($request,$id);
        return redirect()->intended('admin/product');
    }
    public function deleteItem($id)
    {
        $this->product->deleteItem($id);
        return back();
    }

}
