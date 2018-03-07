<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    //index 方法

    public function index(Request $request){
//        echo $request->fullUrl().'<br>';
//        echo $request->path().'<br>';
//        echo $request->url().'<br>';
//        var_dump($request->is('admin'));
        return view('admin.index');
    }
}