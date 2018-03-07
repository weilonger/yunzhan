<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //index 方法

    public function index(Request $request){
//        echo $request->fullUrl();
//        var_dump($request);
        return view('home.index');
    }
}