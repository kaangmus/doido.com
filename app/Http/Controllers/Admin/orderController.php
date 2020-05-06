<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\orderModel;
use App\Model\productModel;
use App\Model\usersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['items']=$this->order->listOrder();
        $data['items2']=$this->order->listOrderGuest();
        return view('admin.order',$data);
    }
    public function deleteItem($id)
    {
        $this->order->deleteItem($id);
        return back();
    }
    public function detailItem($id)
    {
        $data['productexItem']=$this->order->productEx($id);
        $data['productreItem']=$this->order->productRe($id);
        $data['order']=$this->order->showItem($id);
        if($data['order']->idguest==Auth::user()->id)
        {
            $data['guestItem']=$this->order->orderUser2($id);
        }
        else
        {
            $data['guestItem']=$this->order->orderUser($id);
        }
       return view('admin.orderDetail',$data);
    }
    public function updateStatus($id,$status)
    {
        $check=$this->order->updateStatus($id,$status);
        if($check)
        {
            return redirect()->intended('admin/ordermanger');
        }
        else{
            return dd('loi update');
        }
    }
}
