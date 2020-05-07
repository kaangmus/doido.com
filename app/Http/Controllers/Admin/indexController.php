<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\categoryModel;
use App\Model\commentModle;
use App\Model\orderModel;
use App\Model\productModel;
use App\Model\usersModel;
use Illuminate\Http\Request;
use Auth; //use thư viện auth
use Session;

class indexController extends Controller
{
    //
    private $user, $product, $comment, $order, $category;

    public function __construct()
    {
        $this->user = new usersModel();
        $this->product = new productModel();
        $this->comment = new commentModle();
        $this->order = new orderModel();
        $this->category = new categoryModel();
    }

    public function indexShow()
    {
        if (Auth::user()->lever != 0) {
            return redirect()->intended('admin/profile');
        } else {

            if (count($this->comment->countMonth()) < 2 && count($this->order->countMonth()) < 2 & count($this->product->countMonth()) < 2 && count($this->user->countMonth()) < 2) {
                $data['checkcount'] = false;
            } else {
                $data['checkcount'] = true;
                $data['countcomment'] = $this->comment->countMonth();
                $data['countorder'] = $this->order->countMonth();
                $data['countproduct'] = $this->product->countMonth();
                $data['countuser'] = $this->user->countMonth();
            }
            //  return $data['countcomment'];
            $data['users'] = $this->user->listAll();
            $data['product'] = $this->product->listAll();
            $data['comment'] = $this->comment->listAll();
            $data['order'] = $this->order->listAll();
            $data['itemsCategory'] = $this->category->listAll();
            return view('admin.index', $data);
        }
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
        $checkEmail = $this->user->checkEmail($request->email);
        if (count($checkEmail) == 0) {
            $this->user->addItem($request);
            $arr = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            Auth::attempt($arr);
            if (Auth::user()->lever == 0) {
                return redirect()->intended('admin');
            } else {
                return redirect()->intended('/');
            }
        } else {
            Session::flash('error', 'Email đã tồn tại!');
            return redirect()->intended('register');
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
