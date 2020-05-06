<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class usersModel extends Model
{
    //
    protected $table='users';
    public function listAll()
    {
        $item=usersModel::orderBy('created_at','DESC')->get();
        return $item;
    }
    public function addItem(Request $request)
    {
        try{
            $item= new usersModel();
            $item->username=$request->username;
            $item->email=$request->email;
            $item->phone=$request->phone;
            $item->city=$request->city;
            $item->address=$request->address;
            $item->describe=$request->describe;
            $item->password=bcrypt($request->password);
            $item->lever=isset($request->lever)?$request->lever:1;
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
    public function getIdEmail($email)
    {
        $item=DB::table('users')->where('email',$email)->get();
        return $item;
    }
    public function showItem($id)
    {
        $item=usersModel::find($id);
        return $item;
    }
    public function updateItem(Request $request, $id)
    {
        try{
            $item=usersModel::find($id);
            $item->username=$request->username;
            $item->email=$request->email;
            $item->phone=$request->phone;
            $item->city=$request->city;
            $item->describe=$request->describe;
            $item->address=$request->address;
            if($request->password!=null)
            {
                $item->password=bcrypt($request->password);
            }
            $item->lever=isset($request->lever)?0:1;
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
            usersModel::destroy($id);
            return true;
        }catch (Exception $ex)
        {
            report ($ex);
            return false;
        }
    }
    public function countMonth()
    {
        $item = DB::select('SELECT 
    (MONTH(created_at)) AS month, COUNT(*) AS so
FROM
    `users`
GROUP BY month(created_at)
ORDER BY month DESC
LIMIT 2');
        return $item;
    }
}
