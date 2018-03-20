<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
//    public function create(){
//    	return view('admin.user.add');

//    }

    // 添加操作
    public function store(Request $request){
        $arr=$request->except('_token');
        // 表单验证的规则
        $rules=[
            'title' => 'required',
            'href' => 'required',
            'orders' => 'required',
            'status'=> 'required',
            'img' => 'required',
        ];
        // 表单验证的提示信息
        $message=[
            "title.required"=>"请输入Title",
            "href.required"=>"请输入href",
            "orders.required"=>"请输入排序",
            'status.required'=>'请输入状态值',
            "img.required"=>"请选择图片",
        ];
        // 使用laravel的表单验证
        $validator = Validator::make($arr,$rules,$message);
        // 开始验证
        if ($validator->passes()) {
            // 验证通过添加数据库
            // 插入数据库
            if (DB::table("slider")->insert($arr)) {
                return redirect('/admin/slider');
            }else{
                return back();
            }
        }else{
            // 具体查看laravel的核心类
            return back()->withInput()->withErrors($validator);
        }
    }

    // 修改操作
//    public function update(){
//
//    }

// 删除操作
    public function destroy(Request $request){
        // 获取删除ID
        $id=$request->input('id');
        // 查巡图片
        $data=\DB::select("select * from slider where id=$id");
        // 删除操作
        // 删除成功 返回值1
        // 删除失败 返回值0
        if (\DB::delete("delete from slider where id=$id")) {
            // 删除成功 删除图片
            unlink("./Uploads/Slider/{$data[0]->img}");
            return "1";
        }else{
            return "0";
        }
    }
    // 删除所有的方法
    public function delAll(Request $request){
        $str=$request->input('str');
        $data=\DB::select("select * from slider where id in($str)");
        // 执行删除语句
        if ($a=\DB::delete("delete from slider where id in($str)")) {
            // 删除图片
            foreach ($data as $value) {
                unlink("./Uploads/Slider/{$value->img}");
            }
            return $a;
        }else{
            return 0;
        }

    }

    // ajax 修改数据
    public function sort(Request $request){
        // 修改数据库
        if (\DB::update("update slider set sort={$request->input('val')} where id={$request->input('id')}")) {
            echo "1";
        }else{
            echo 0;
        }
    }


}
