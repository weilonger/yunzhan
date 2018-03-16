<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use DB;

// 后台登录控制器
class LoginController extends Controller
{
    protected function yzm(){
        require_once("../resources/code/Code.class.php");
        $code = new \Code();
        $code->make();
    }

   // 后台登录方法
    public function index(){
        return view('admin.login.index');
    }

//
//    // 后台登录处理
    public function check(Request $request){
        $name=$request->input('name');
        $password=$request->input('password');
        $ucode=$request->input('yzm');
        // 验证验证码
        require_once("../resources/code/Code.class.php");
        // 实例化
        $code=new \Code();
        // 获取session
        $ocode=$code->get();
        // 检测验证码
        if (strtoupper($ucode)==$ocode) {
            // 验证密码
            $data=\DB::table('admin')->where([['name','=',"$name"],['status','=',0]])->first();
            if ($data) {
                if ($password==\Crypt::decrypt($data->password)) {
                    // 声明数组
                    $arr=[];
                    $arr['lastlogin']=time();
                    // 更新登录信息
                    \DB::table('admin')->where('id',$data->id)->update($arr);
                    // 存session
                    session(['adminUserInfo'=>$data->name]);
                    // 跳转到首页
                    return redirect('/admin');
                }else{
                    return back()->with("error",'密码错误');
                }
            }else{
                return back()->with("error",'用户名不存在');
            }
        }else{
//            redirect('/admin');
            return back()->with("error",'验证码错误');
        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('admin/login');
    }
}
