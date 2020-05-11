<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\rateModel;
use Illuminate\Http\Request;

class rateController extends Controller
{
    //
    private $rate;
    public function __construct()
    {
        $this->rate=new rateModel();
    }
    public function addItem(Request $request)
    {
        $this->rate->addItem($request);
    }
    public function avgItem($id)
    {
        $item=$this->rate->avgItem($id);
        return $item;
    }
}
