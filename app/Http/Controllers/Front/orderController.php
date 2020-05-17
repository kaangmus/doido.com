<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\orderModel;
use App\Model\productModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    //
    private $product;
    private $order;
    public function __construct()
    {
        $this->product=new productModel();
        $this->order= new orderModel();
    }
    public function showOrder($id)
    {
        $data['product']=$this->product->productDetail($id);
        $data['listproduct']=$this->product->listProduct();
        return view('front.order',$data);
    }
    public function addOrder(Request $request)
    {
        $idproduct=$request->idproduct;
        $style="doi";
        if(isset($request->checkId)){
            $idproductnew=$request->checkId;
        }
        else{
            $idproductnew=$this->product->addItem($request);
        }
        $iduser=$this->product->showItem($idproduct);
        $arr=array("iduser"=>$iduser->iduser,"idguest"=>Auth::user()->id,"idproductex"=>$idproduct,"idproductre"=>$idproductnew,"style"=>$style);
        $this->order->addItem($arr);
        return view('front.thankyou');
    }
}
