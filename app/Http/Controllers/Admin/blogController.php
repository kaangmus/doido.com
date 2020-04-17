<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\blogModel;
use Illuminate\Http\Request;

class blogController extends Controller
{
    //
    private $blog;
    public function __construct()
    {
        $this->blog= new blogModel();
    }
    public function listAll()
    {
        $data['items']=$this->blog->listAll();
        return view('admin.blog',$data);
    }
    public function addShow()
    {
        return view('admin.editBlog');
    }
    public function addItem(Request $request)
    {
        $this->blog->addItem($request);
        return redirect()->intended('admin/blog');
    }
    public function updateShow($id)
    {
        $data['item']=$this->blog->showItem($id);
        return view('admin.editBlog',$data);
    }
    public function updateItem(Request $request,$id)
    {
        $this->blog->updateItem($request,$id);
        return redirect()->intended('admin/blog');
    }
    public function deleteItem($id)
    {
        $this->blog->deleteItem($id);
        return back();
    }
}
