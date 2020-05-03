<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class mediaModel extends Model
{
    //
    protected $table='media';
    public function listAll()
    {
        $item=mediaModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem(Request $request,$idproduct)
    {
            try {
                if($request->hasfile('media'))
                {

                    foreach($request->file('media') as $file)
                    {
                        $item = new mediaModel();
                        $item->idproduct=$idproduct;
                        $filename=$file->getClientOriginalName();
                        $item->url = $filename;
                        //$file->storeAs('media',$filename);
                        $file->move('public/media',$filename);
                        $item->save();
                    }
                }
                return true;
            } catch (Exception $ex) {
                report($ex);
                return false;
            }

    }
    public function deleteItem($id)
    {
        try{
            mediaModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
    public function listItem($id)
    {
        $items=DB::table('media')
            ->where('idproduct',$id)
            ->get();
        return $items;
    }
    public function deleteID($id)
    {
        DB::table('media')->where('idproduct', $id)->delete();
        return true;
    }
    public function listMedia($id)
    {
        $items=mediaModel::where('idproduct',$id)->get();
        return $items;
    }
}
