<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;

// 后台配置控制器
class ConfigController extends Controller
{
   // 后台配置首页方法

    public function index(){
        
        // 加载配置页面
        $data = \DB::select('select * from  users');
//        var_dump($data);
        return view('admin.system.config.index');
    }

    // 后台配置修改页面
    public function edit(){
    	return view('admin.system.config.edit');
    }

    // 后台配置添加页面
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
