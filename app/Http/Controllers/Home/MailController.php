<?php
/**
 * Created by PhpStorm.
 * User: codel
 * Date: 2018/3/21
 * Time: 10:20
 */

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class MailController extends Controller
{
    public function send(Request $request){
        $email = '1448245883@qq.com';
        $name = '云站';
        $uid = '1';
        $code = '0';
        $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
        \Mail::send('home.mail.test', $data, function($message) use($data)
        {
            $message->to($data['email'])->subject('欢迎注册我们的网站，请激活您的账号！');
        });
//        $raw = file_get_contents('php://input');
//        $json = json_decode($raw);
//        $mail = $json->mail;
//        $code = $request->input('body');
//        dd($raw);

        // Mail::send()的返回值为空，所以可以其他方法进行判断
//        \Mail::send('home.mails.test',["code"=>$code],function($message){
//            $to = '1448245883@qq.com';
//            $message ->to($to)->subject('验证码');
//        });
        // 返回的一个错误数组，利用此可以判断是否发送成功
    }

    public function check(){

    }
}
