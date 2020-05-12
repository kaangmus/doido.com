<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use DB;

class rateModel extends Model
{
    //
    protected $table='rate';
    public function addItem(Request $request)
    {
        $item= new rateModel();
        $item->iduser=Auth::user()->id;
        $item->idproduct=$request->idproduct;
        $item->rating=$request->rating;
        $item->save();
        return true;
    }
    public function addItemProduct($idproduct)
    {
        $item= new rateModel();
        $item->iduser=Auth::user()->id;
        $item->idproduct=$idproduct;
        $item->rating=0;
        $item->save();
        return true;
    }
    public function avgItem($id)
    {
        $item=DB::table('rate')->where('idproduct',$id)->avg('rating');
        return $item;
    }
}
