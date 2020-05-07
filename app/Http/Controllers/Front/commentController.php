<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Model\commentModle;
use Illuminate\Http\Request;

class commentController extends Controller
{
    //
    private $comment;
    public function __construct()
    {
        $this->comment=new commentModle();
    }
    public function addItem(Request $request)
    {
        return $request;
    }
    public function listAll()
    {

    }
    public function deleteItem($id)
    {
        $this->comment->deleteItem($id);
        return back();
    }
}
