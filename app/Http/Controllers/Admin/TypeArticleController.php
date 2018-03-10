<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;

// 论文分类首页控制器
class TypeArticleController extends Controller
{
   // 论文分类首页方法

    public function index(){
        
        // 加载用户管理页面
        $data = \DB::select('select * from  users');
//        var_dump($data);
        return view('admin.user.index');
    }

    // 论文分类修改页面
    public function edit(){
    	return view('admin.user.edit');
    }

    // 论文分类添加页面
    public function create(){
//    	return view('admin.user.add');

    }

    // 添加操作
    public function store(){

    }


    // 修改操作
    public function update(){

    }


    // 删除操作
    public function destory(){

    }


}
