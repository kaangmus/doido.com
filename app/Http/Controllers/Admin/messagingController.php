<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class messagingController extends Controller
{
    //
    public function listAll()
    {
        return view('admin.messaging');
    }
}
