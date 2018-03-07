<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// User控制器
class CommonController extends Controller
{
    protected function index(){

    }
    protected function register(){
        return view('home.register');
    }
}
