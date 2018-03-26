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
        if ($slider=\Cache::get('slider')) {
//            var_dump(1);
        }else{
            $slider=\DB::table("slider")->orderBy("orders","desc")->where('status','=','1')->get();
            \Cache::put("slider",$slider,1);
        }
//        var_dump($slider);
//        exit();
        $tot = count($slider);
        return view('home.index')->with('slider',$slider)->with('tot',$tot);
    }

    protected function register(){
        return view('home.register');
    }

    public function add(Request $request){

    }
}