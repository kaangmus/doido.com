<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\cart_productModel;
use App\Model\cartModel;
use App\Model\cate_productModel;
use App\Model\productModel;
use Illuminate\Http\Request;
//use Gloudemans\Shoppingcart\Facades\Cart;
//use Cart;
use Gloudemans\Shoppingcart\Cart;
use Auth; //use thư viện auth

class cartController extends Controller
{
    //
    private $cartItem,$product,$cart,$cart_product;
    public function __construct()
    {
        $this->cartItem = app(Cart::class);
        $this->product= new productModel();
        $this->cart= new cartModel();
        $this->cart_product= new cart_productModel();
    }
    public function cartShow()
    {
        $data['items']=$this->cartItem->content();
        return view('front.cart',$data);
    }
    public function addItem(Request $request)
    {
        $item=$this->product->showItem($request->id);
        $this->cartItem->add(['id'=>$request->id,'name'=>$item->title,'price'=>$item->sale,'qty'=>1,'weight'=>1,'options' => ['img' => $item->coverimg,'size'=>$request->size,'color'=>$request->color]]);
        return redirect('cart');
    }
    public function deleteAll()
    {
        $this->cartItem->destroy();
    }
    public function deleteItem($id)
    {
        if($id=='all')
        {
            $this->cartItem->destroy();
        }
        else{
            $this->cartItem->remove($id);
        }
        return redirect('cart');
    }
    public function pay()
    {
        $total=0;
        $data=$this->cartItem->content();
        foreach ($data as $item)
        {
            $total+=$item->price*$item->weight;
        }
        if(Auth::check())
        {
            $idcart=$this->cart->addItem(Auth::user()->id,$total,1);
            foreach ($data as $item)
            {
                $cart_product=array('idcart'=>$idcart,'idproduct'=>$item->id,'countsale'=>$item->qty,'pricesale'=>$item->price,'size'=>$item->options->size,'color'=>$item->options->color);
                $this->cart_product->addItem($cart_product);
            }
        }
        else{
            return redirect()->intended('register');
        }
        $this->deleteAll();
        return back();
    }

}
