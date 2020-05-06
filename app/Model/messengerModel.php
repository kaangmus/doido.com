<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use Auth; //use thư viện auth

class messengerModel extends Model
{
    //
    protected $table = 'messenger';

    public function __construct()
    {
    }

    public function addItem(Request $request,$iduser)
    {
        $item = new messengerModel();
        $item->idguest = $iduser;
        $item->iduser = Auth::user()->id;
        $item->title = $request->title;
        $item->contents = $request->contents;
        $item->save();
    }

    public function listAll()
    {
        $items = DB::table('messenger')
            ->join('users', 'users.id', '=', 'messenger.idguest')
            ->where('messenger.iduser',Auth::user()->id)
            ->groupBy('messenger.idguest','username','img')
            ->select('messenger.idguest','username','img')
            ->get();
        return $items;
    }
//    public function listAll2()
//    {
//        $items = DB::table('messenger')
//            ->join('users', 'users.id', '=', 'messenger.idguest')
//            ->where('messenger.idguest',Auth::user()->id)
//            ->groupBy('messenger.iduser','username','img')
//            ->select('messenger.idguest','username','img')
//            ->get();
//        return $items;
//    }
    public function chatItem($id)
    {
        $items = DB::table('messenger')
//            ->where('messenger.iduser',Auth::user()->id)
//            ->where('messenger.idguest',$id)
            ->where([['messenger.iduser','=',Auth::user()->id],['messenger.idguest','=', $id]])
            ->orwhere([['messenger.iduser','=',$id],['messenger.idguest','=', Auth::user()->id]])
            ->get();
        return $items;
    }
}
