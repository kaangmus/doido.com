<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\commentModle;
use App\Model\orderModel;
use App\Model\productModel;
use App\Model\usersModel;
use Illuminate\Http\Request;
use Auth; //use thư viện auth

class indexController extends Controller
{
    //
    private $user, $product,$comment,$order;
    public function __construct()
    {
        $this->user=new usersModel();
        $this->product=new productModel();
        $this->comment=new commentModle();
        $this->order=new orderModel();
    }
    public function indexShow()
    {
        //return count($this->user->countMonth());
        if(count($this->comment->countMonth())<2&&count($this->order->countMonth())<2&count($this->product->countMonth())<2&&count($this->user->countMonth())<2)
        {
            $data['checkcount']=false;
        }
        else{
            $data['checkcount']=true;
            $data['countcomment']=$this->comment->countMonth();
            $data['countorder']=$this->order->countMonth();
            $data['countproduct']=$this->product->countMonth();
            $data['countuser']=$this->user->countMonth();
        }
      //  return $data['countcomment'];
        $data['users']=$this->user->listAll();
        $data['product']=$this->product->listAll();
        $data['comment']=$this->comment->listAll();
        $data['order']=$this->order->listAll();
        return view('admin.index',$data);
    }
    public function showLogin()
    {
        return view('front.login');
    }
    public function checkLogin(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }
        //kiểm tra trường remember có được chọn hay không
        if (Auth::attempt($arr)) {

            return redirect()->intended('admin');
        } else {

            return redirect()->intended('login');
        }
    }
    public function logout()
    {
        Auth::logout();
        Return redirect()->intended('login');
    }
    public function showRegister()
    {
        return view('front.register');
    }
    public function register(Request $request)
    {
        $this->user->addItem($request);
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        Auth::attempt($arr);
        if(Auth::user()->lever==1)
        {
            return redirect()->intended('/');
        }
        else{
            return redirect()->intended('admin');
        }

    }
    public function forgetPassword()
    {
        return view('front.forgetpassword');
    }
    public function getPassword(Request $request)
    {
        return $request->email;
    }
}
