<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Auth; //use thư viện auths
use DB;

class orderModel extends Model
{
    //
    protected $table = 'orderproduct';

    public function listAll()
    {
        $item = orderModel::orderBy('created_at', 'DESC')->get();
        return $item;
    }

    public function addItem($request)
    {
        try {
            $item = new orderModel();
            $item->iduser = $request['iduser'];
            $item->idguest = $request['idguest'];
            $item->idproductex = $request['idproductex'];
            $item->idproductre = $request['idproductre'];
            $item->style = $request['style'];
            $item->save();
            return $item->id;
        } catch (Exception $ex) {
            report($ex);
            return false;
        }


    }

    public function listOrder()
    {
        $items = DB::table('orderproduct')
            ->join('users', 'users.id', '=', 'orderproduct.idguest')
            ->join('product', 'orderproduct.idproductre', '=', 'product.id')
            ->where('orderproduct.iduser', Auth::user()->id)
            ->select('*', 'orderproduct.style as orderType', 'orderproduct.id as idOrder', 'orderproduct.status as orderStatus')
            ->get();
        return $items;
    }

    public function listOrderGuest()
    {
        $items = DB::table('orderproduct')
            ->join('users', 'users.id', '=', 'orderproduct.iduser')
            ->join('product', 'orderproduct.idproductex', '=', 'product.id')
            ->where('orderproduct.idguest', Auth::user()->id)
            ->select('*', 'orderproduct.style as orderType', 'orderproduct.id as idOrder', 'orderproduct.status as orderStatus')
            ->get();
        return $items;
    }

    public function showItem($id)
    {
        $item = orderModel::find($id);
        return $item;
    }

    public function updateStatus($id, $status)
    {
        $item = orderModel::find($id);
        $item->status = $status;
        $item->save();
        return true;
    }

    public function updateItem(Request $request, $id)
    {
        try {
            $item = new orderModel();
            $item->iduser = $request->iduser;
            $item->total = $request->total;
            $item->status = $request->status;
            $item->save();
            return true;
        } catch (Exception $ex) {
            report($ex);
            return false;
        }

    }

    public function deleteItem($id)
    {
        try {
            orderModel::destroy($id);
            return true;
        } catch (Exception $ex) {
            report($ex);
            return false;
        }
    }

    public function productEx($id)
    {
        $item = DB::table('orderproduct')
            ->join('product', 'orderproduct.idproductex', '=', 'product.id')
            ->where('orderproduct.id', $id)
            ->get();
        return $item;
    }

    public function productRe($id)
    {
        $item = DB::table('orderproduct')
            ->join('product', 'orderproduct.idproductre', '=', 'product.id')
            ->where('orderproduct.id', $id)
            ->get();
        return $item;
    }

    public function orderUser($id)
    {
        $item = DB::table('orderproduct')
            ->join('users', 'orderproduct.idguest', '=', 'users.id')
            ->where('orderproduct.id', $id)
            //->select('*','orderproduct.style as orderType','orderproduct.id as idOrder')
            ->get();
        return $item;
    }
    public function orderUser2($id)
    {
        $item = DB::table('orderproduct')
            ->join('users', 'orderproduct.iduser', '=', 'users.id')
            ->where('orderproduct.id', $id)
            //->select('*','orderproduct.style as orderType','orderproduct.id as idOrder')
            ->get();
        return $item;
    }

    public function countMonth()
    {
        $item = DB::select('SELECT 
    (MONTH(created_at)) AS month, COUNT(*) AS so
FROM
    `orderproduct`
GROUP BY month(created_at)
ORDER BY month DESC
LIMIT 2');
        return $item;
    }
}
