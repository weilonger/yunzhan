<?php

namespace resources\sms;

class smsMsg
{

    public $headers=array('Content-Type: application/json','X-LC-Id: qWKBycMzyy55SQwMvzh8KNC5-gzGzoHsz','X-LC-Key: d512SMsoPtufU2VRjXk3rJi8');

    function sendMsg($mobilePhoneNumber){
        $post_data = '{"mobilePhoneNumber":"'.$mobilePhoneNumber.'"}';
        $ch = curl_init("https://api.leancloud.cn/1.1/requestSmsCode");
        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$this->headers);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,false);
        $res=curl_exec($ch);
        curl_close($ch);
        echo $res;
        if(strlen($res)<4){
            return 1;
        }else{
            return 0;
        }
    }

    function checkMsg($mobilePhoneNumber,$code){
        $ch = curl_init("https://api.leancloud.cn/1.1/verifySmsCode/$code?mobilePhoneNumber=$mobilePhoneNumber");
        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$this->headers);
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,false);
        $res=curl_exec($ch);
        curl_close($ch);
        echo $res;
        if(strlen($res)<10){
            return 1;
        }else{
            return 0;
        }
    }
}