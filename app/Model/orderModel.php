<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth; //use thư viện auths
use DB;
class orderModel extends Model
{
    //
    protected $table='orderproduct';
    public function listAll()
    {
        $item=orderModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem($request)
    {
        try{
            $item= new orderModel();
            $item->iduser=$request['iduser'];
            $item->idguest=$request['idguest'];
            $item->idproductex=$request['idproductex'];
            $item->idproductre=$request['idproductre'];
            $item->style=$request['style'];
            $item->save();
            return $item->id;
        }
        catch (Exception $ex){
            report($ex);
            return false;
        }


    }
    public function listOrder()
    {
        $items=DB::table('orderproduct')->where('iduser',Auth::user()->id)->get();
        return $items;
    }
    public function showItem($id)
    {
        $item=orderModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item= new orderModel();
            $item->iduser=$request->iduser;
            $item->total=$request->total;
            $item->status=$request->status;
            $item->save();
            return true;
        }catch (Exception $ex)
        {
            report($ex);
            return false;
        }

    }
    public function deleteItem($id)
    {
        try{
            orderModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
}
