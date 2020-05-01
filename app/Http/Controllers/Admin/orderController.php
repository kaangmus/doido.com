<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\orderModel;
use App\Model\productModel;
use App\Model\usersModel;
use Illuminate\Http\Request;

class orderController extends Controller
{
    //
    private $order,$user,$product;
    public function __construct()
    {
        $this->order=new orderModel();
        $this->user= new usersModel();
        $this->product=new productModel();
    }
    public function listAll()
    {
        $items=$this->order->listOrder();
        return $items;
        $arrUser=array();
        $arrProductEx=array();
        $arrProductRe=array();
        foreach ($items as $item)
        {
            array_push($arrUser,$this->user->showItem($item->iduser));
            array_push($arrProductEx,$this->product->showItem($item->idproductex));
            array_push($arrProductRe,$this->user->showItem($item->idproductre));
//            echo '<pre>';
//            print_r($item);
//            echo '</pre>';
        }
//        echo 'mag user';
//        foreach ($arrUser as $user)
//        {
//            echo $user->username;
//        }
        $data['productex']=$arrProductEx;
        $data['guest']=$arrUser;
        $data['productre']=$arrProductRe;
        return $data['guest'];
        //print_r($arrUser);
        return view('admin.order',$data);
    }
}
