<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

// 后台登录控制器
class LoginController extends Controller
{
    protected function yzm(){
        require_once("../resources/code/Code.class.php");
        $code = new \Code();
        $code->make();
    }

    protected function captcha($tmp){
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::put('code', $phrase);
        // 生成图片   此处要设置浏览器不要缓存
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
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
//        print_r($data);
//        print_r($request->all());
        $ocode =$request->session()->get('code');
//        print_r($ocode);
//        exit();
        // 验证验证码
//        require_once("../resources/code/Code.class.php");
//        // 实例化
//        $code=new \Code();
//        // 获取session
//        $ocode=$code->get();
        // 检测验证码
        if ($ucode==$ocode) {
            $data=\DB::table('admin')->where([
                ['status', '=', '1'],
                ['name', '=', "$name"],
            ])->first();
            // 验证密码
            if ($data) {
                if ($password==\Crypt::decrypt($data->password)) {
                    // 声明数组
                    $arr=[];
                    $time = date('Y-m-d H:i:s',time());
                    $arr['lastlogin']=$time;
                    // 更新登录信息
                    \DB::table('admin')->where('id',$data->id)->update($arr);
                    // 存session
                    \Session::put('adminUserInfo', $data->name);
//                    session(['adminUserInfo'=>$data->name]);
                    // 跳转到首页
                    return redirect('/admin');
                }else{
//                    echo '密码错误';
                    return back()->with("error",'密码错误');
                }
            }else{
//                echo '用户不存在';
                return back()->with("error",'用户名不存在');
            }
        }else{
//            echo '验证码错误';
//            redirect('/admin');
            return back()->with("error",'验证码错误');
        }
//        }else{
////            redirect('/admin');
//            return back()->with("error",'验证码错误');
//        }
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('admin/login');
    }
}
