<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    //index 方法
    public function index(Request $request){
        return view('admin.class.index');
    }

    //课程添加页面
    public function create(){
        //查询分类
        $data=\DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','<=','2')->orderBy('p','asc')->get();
//        var_dump($data);
        return view('admin.class.add')->with('data',$data);
    }
}