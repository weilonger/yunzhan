<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

// 后台登录控制器
class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = '/admin/dash';
    protected $username;

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => 'logout']);
        $this->username = config('admin.global.username');
    }

    public function showLoginForm()
    {
        return view('admin.login.index');
    }

    protected function guard()
    {
        return auth()->guard('admin');
    }

    protected function yzm(){
        require_once("../resources/code/Code.class.php");

        $code = new \Code();
        $code->make();
    }

   // 后台登录方法

//    public function index(){
//
//        return view('admin.login');
//    }
//
//    // 后台登录处理
//
//    public function check(){
//    	// 判断
//
//    	if ($_POST['name']=='admin' && $_POST['pass']=='123') {
//
//
//    		session(['adminUserInfo'=>$_POST['name']]);
//    		return redirect('admin');
//    	}else{
//
//    		return back();
//    	}
//    }
}
