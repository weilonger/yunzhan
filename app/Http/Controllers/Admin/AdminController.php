<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
    //管理员页面

    public function index(Request $request){
        echo "管理员控制器";
        return view('admin.admin.index');
    }

    //新增页面
    public function create(){
//        return view('admin.admin.add');
    }

    //插入操作  admin/admin/creaye  get
    public function store(){

    }

    //修改页面  admin/admin    post
    public function edit(){
        return view('admin.admin.edit');
    }

    //更新操作  admin/admin/{admin}/edit  get
    public function update(){

    }

    //删除操作  admin/admin/{admin}  delete
    public function destroy(){

    }
}