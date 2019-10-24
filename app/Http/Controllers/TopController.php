<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TopController extends Controller
{
    /**
    * トップ画面の表示
    *
    * @return Response 
    */
    public function index()
    {
        return view('top.index');
    }
}
