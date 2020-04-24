<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\usersModel;
use Illuminate\Http\Request;
use Auth; //use thư viện auth

class indexController extends Controller
{
    //
    private $user;
    public function __construct()
    {
        $this->user=new usersModel();
    }
    public function indexShow()
    {
        return view('admin.index');
    }
    public function showLogin()
    {
        return view('admin.login');
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
}
