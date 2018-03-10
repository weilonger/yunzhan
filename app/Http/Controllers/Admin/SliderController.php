<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;

// 轮播图首页控制器
class SliderController extends Controller
{
   // 轮播图首页方法
    public function index(){
        // 获取数据总数
        $tot=\DB::table("slider")->count();
        $data=\DB::table("slider")->paginate(5);
        // 加载页面
        return view('admin.slider.index')->with('tot',$tot)->with("data",$data);
    }

    // 轮播图修改页面
    public function edit(){
    	return view('admin.slider.edit');
    }

    // 轮播图添加页面
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
