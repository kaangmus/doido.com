<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\messengerModel;
use App\Model\usersModel;
use Illuminate\Http\Request;

class messagingController extends Controller
{
    //
    private $mess, $user;
    public function __construct()
    {
        $this->user= new usersModel();
        $this->mess=new messengerModel();
    }
    public function listAll()
    {
        $data['items']=$this->mess->listAll();
        //$data['items2']=$this->mess->listAll2();
        return view('admin.messenger',$data);
    }
    public function addItem(Request $request)
    {
        if(isset($request->email))
        {
            $user=$this->user->getIdEmail($request->email);
            $iduser=$user[0]->id;
            $this->mess->addItem($request,$iduser);
            return back();
        }
        else{

        }
    }
    public function chatItem($id)
    {
        $data['infoguest']=$this->user->showItem($id);
        $data['items']=$this->mess->listAll();
        $data['itemDetail']=$this->mess->chatItem($id);
        return view('admin.messenger',$data);
    }
    public function addChat(Request $request, $id)
    {
        $this->mess->addItem($request,$id);
        return back();
    }
}
