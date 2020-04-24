<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\usersModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    //
    private $user;
    public function __construct()
    {
        $this->user= new usersModel();
    }
    public function addShow()
    {
        return view('admin.proFile');
    }
    public function addItem(Request $request)
    {
        $this->user->addItem($request);
        return redirect()->intended('admin/profile/user');
    }
    public function showItem()
    {
        $data['item']=$this->user->showItem(Auth::user()->id);
        return view('admin.proFile',$data);
    }
    public function updateItem(Request $request)
    {
        $this->user->updateItem($request,Auth::user()->id);
        return back();
    }
    public function updateShow($id)
    {
        $data['item']=$this->user->showItem($id);
        return view('admin.proFile',$data);
    }
    public function updateUser(Request $request, $id)
    {
        $this->user->updateItem($request,$id);
        return redirect()->intended('admin/profile/user');
    }
    public function deleteItem($id)
    {
        $this->user->deleteItem($id);
        return back();
    }
    public function listAll()
    {
        $data['items']=$this->user->listAll();
        return view('admin.user',$data);
    }
}
