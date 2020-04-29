<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class commentModle extends Model
{
    //
    protected $table='comment';
    public function __construct()
    {
    }
    public function addItem(Request $request)
    {
        $item= new commentModle();
        $item->idcomment=$request->idcomment;
        $item->iduser=$request->iduser;
        $item->idproduct=$request->idproduct;
        $item->title=$request->title;
        $item->comment=$request->comment;
        $item->save();
    }
}
