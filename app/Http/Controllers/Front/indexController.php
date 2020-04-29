<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\blogModel;
use App\Model\cate_productModel;
use App\Model\mediaModel;
use App\Model\productModel;
use Illuminate\Http\Request;

class indexController extends Controller
{
    //
    private $product,$media,$blog,$cate_product;
    public function __construct()
    {
        $this->product= new productModel();
        $this->media= new mediaModel();
        $this->blog= new blogModel();
        $this->cate_product=new cate_productModel();
    }
    public function indexShow()
    {
        $data['items1']=$this->product->listAll();
        $data['items2']=$this->product->listAll();
        $data['items3']=$this->product->listAll();
        $data['items4']=$this->product->listAll();
        $data['items5']=$this->product->listAll();
        return view('front.index',$data);
    }
    public function searchItem($search)
    {
        $search= str_replace(' ', '%', $search);
        $data['items']=$this->product->searchItem($search);
        return view('front.sanpham',$data);
    }
    public function getsearch(Request $request)
    {
        $key= str_replace(' ', '%', $request->search);
        $data['items']=$this->product->searchItem($key);
        return view('front.sanpham',$data);
    }
    public function productDetail($id)
    {
        $data['item']=$this->product->showItem($id);
        $data['itemsCate']=$this->cate_product->listItem($id);
        $data['itemsMedia']=$this->media->listMedia($id);
        return view('front.productDetail',$data);
    }
    public function listProduct($id)
    {
        $data['items']=$this->product->listProductCate($id);
        return view('front.sanpham',$data);
    }
    public function blog($id)
    {
        $data['item']= $this->blog->showItem($id);
        return view('front.blogDetail',$data);
    }
    public function product()
    {
        $data['items']=$this->product->product();
        return view('front.sanpham',$data);
    }

}
