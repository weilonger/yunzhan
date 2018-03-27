<?php
/**
 * Created by PhpStorm.
 * User: codel
 * Date: 2018/3/26
 * Time: 16:35
 */
namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use resources\sms\Auth;

class SmsController extends Controller{
    public function send(Request $request){
//        require_once("/homes/yzm/Auth.class.php");
        $raw = file_get_contents('php://input');
        $json = json_decode($raw);
        setcookie("phone",$json->phone,time()+3600);
        $auth = new Auth();
        $auth->SendSmsCode($json->phone);
    }

    public function check(){
        $raw = file_get_contents('php://input');
        $json = json_decode($raw);
        $phone = $json->phone;
        $phoneCode = $json->phoneCode;
        $auth = new Auth();
        $auth->CheckSmsYzm($phone, $phoneCode);
    }
}