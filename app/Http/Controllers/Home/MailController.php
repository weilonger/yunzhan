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
        $name = $request->input('name');
        $code = rand();
        // Mail::send()的返回值为空，所以可以其他方法进行判断
        \Mail::send('mails.test'.$code,['name'=>$name],function($message){
            $to = '1448245883@qq.com';
            $message ->to($to)->subject('验证码');
        });
        // 返回的一个错误数组，利用此可以判断是否发送成功
        dd(Mail::failures());
    }

    public function check(){

    }
}
