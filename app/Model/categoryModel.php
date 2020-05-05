<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class categoryModel extends Model
{
    //
    protected $table='category';
    public function listAll()
    {
        $item=categoryModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem(Request $request)
    {
        try{
            $item= new categoryModel();
            $item->title=$request->title;
            $item->describe=$request->describe;
            $item->status=$request->status;
            $item->save();
            return true;
        }
        catch (Exception $ex){
            report($ex);
            return false;
        }


    }
    public function showItem($id)
    {
        $item=categoryModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item=categoryModel::find($id);
            $item->title=$request->title;
            $item->describe=$request->describe;
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
            categoryModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
}
