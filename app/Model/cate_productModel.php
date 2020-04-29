<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class cate_productModel extends Model
{
    //
    protected $table='cate_product';
    public function listAll()
    {
        $item=cate_productModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem($idproduct, $idcategory)
    {
        try{
            foreach ($idcategory as $items)
            {
                $item= new cate_productModel();
                $item->idproduct=$idproduct;
                $item->idcategory=$items;
                $item->save();
            }
            return true;
        }
        catch (Exception $ex){
            report($ex);
            return false;
        }


    }
    public function showItem($id)
    {
        $item=cate_productModel::find($id);
        return $item;
    }
    public function listItem($id)
    {
        $items=DB::table('cate_product')
            ->join('category', 'category.id', '=', 'cate_product.idcategory')
            ->where('idproduct',$id)->get();
        return $items;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item=cate_productModel::find($id);
            $item->idproduct=$request->idproduct;
            $item->idcategory=$request->idcategory;
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
            cate_productModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
}
