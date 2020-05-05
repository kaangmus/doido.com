<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class blogModel extends Model
{
    //
    protected $table='blog';
    public function listAll()
    {
        $item=blogModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem(Request $request)
    {
        try{
            $item= new blogModel();
            $item->title=$request->title;
            $item->describe=$request->describe;
            $item->content=$request->content;
            $item->status=$request->status;
            if($request->hasFile('img'))
            {
                $filename=$request->img->getClientOriginalName();
                $item->img=$filename;
                $request->img->move('public/media',$filename);
            }
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
        $item=blogModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item=blogModel::find($id);
            $item->title=$request->title;
            $item->describe=$request->describe;
            $item->content=$request->content;
            $item->status=$request->status;
            if($request->hasFile('img'))
            {
                $filename=$request->img->getClientOriginalName();
                $item->img=$filename;
                $request->img->move('public/media',$filename);
            }
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
            blogModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
}
