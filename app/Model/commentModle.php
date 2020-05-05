<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class commentModle extends Model
{
    //
    protected $table = 'comment';

    public function __construct()
    {
    }

    public function addItem(Request $request)
    {
        $item = new commentModle();
        $item->idcomment = $request->idcomment;
        $item->iduser = $request->iduser;
        $item->idproduct = $request->idproduct;
        $item->title = $request->title;
        $item->comment = $request->comment;
        $item->save();
    }

    public function listAll()
    {
        $item = commentModle::orderBy('created_at', 'DESC')->get();
        return $item;
    }

    public function listComment($id)
    {
        $items = DB::table('comment')
            ->join('users', 'users.id', '=', 'comment.iduser')
            ->where('idproduct', $id)->get();
        return $items;
    }

    public function countMonth()
    {
        $item = DB::select('SELECT 
    (MONTH(created_at)) AS month, COUNT(*) AS so
FROM
    `comment`
GROUP BY month(created_at)
ORDER BY month DESC
LIMIT 2');
        return $item;
    }
}
