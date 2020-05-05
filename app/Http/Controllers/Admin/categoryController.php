<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\categoryModel;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    //
    private $category;
    public function __construct()
    {
        $this->category= new categoryModel();
    }
    public function listAll()
    {
        $data['items']=$this->category->listAll();
       // return $data['items'];
        return view('admin.category',$data);
    }
    public function addItem(Request $request)
    {
        $check=$this->category->addItem($request);
        if($check)
        {
            return back();
        }
        else
        {
            dd('create err!!!!!!');
        }
    }
    public function updateItem(Request $request){
        $id=$request->id;
        $check=$this->category->updateItem($request,$id);
        if($check)
        {
            return back();
        }
        else
        {
            dd('Update err!!!!!!');
        }
    }
    public function deleteItem($id)
    {
        $check=$this->category->deleteItem($id);
        if($check)
        {
            return back();
        }
        else
        {
            dd('Delete err!!!!!!');
        }
    }
}
