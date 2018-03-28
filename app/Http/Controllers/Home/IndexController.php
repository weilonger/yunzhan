<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //index 方法
    //前端首页
    public function index(Request $request){
//        echo $request->fullUrl();
//        var_dump($request);
        if ($slider=\Cache::get('slider')) {
//            var_dump(1);
        }else{
            $slider=\DB::table("slider")->orderBy("orders","desc")->where('status','=','1')->get();
            \Cache::put("slider",$slider,1);
        }
//        var_dump($slider);
//        exit();
        $tot = count($slider);
        return view('home.index')->with('slider',$slider)->with('tot',$tot);
    }

    //用户名验证
    protected function checkname(Request $request){
        $raw = file_get_contents('php://input');
        $json = json_decode($raw);
        $username = $json->username;
        $student = \DB::table('student')->select('*')->where('username','=',$username)->first();
        $teacher = \DB::table('teacher')->select('*')->where('username','=',$username)->first();
//        print_r($student);
//        print_r($teacher);
//        die();
        if($student==Null && $teacher==Null){
            echo('{"code":200, "message":"用户名合法"}');
        }else{
            echo('{"code":1, "message":"用户名已存在"}');

        }
    }

    //前端注册页面
    protected function register(){
        $data=\DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','<=','2')->orderBy('p','asc')->get();
        return view('home.register')->with('data',$data);
    }

    public function add(Request $request){
        $raw = file_get_contents('php://input');
        $json = json_decode($raw);
        $type = $json->type;
//        print_r($json);
//        exit();
        if($type == '1'){
            $table = 'student';
            $table_info = 'student_info';
            $pre = '11';
        }elseif($type == '0'){
            $table = 'teacher';
            $table_info = 'teacher_info';
            $pre = '00';
        }
        $name = $json->name;
        $json->password = \Crypt::encrypt($json->password);
        $data = [
            'username'=>$json->username,
            'gender'=>$json->gender,
            'typeid'=>$json->typeid,
            'password'=>$json->password,
            'phone'=>$json->phone
        ];
        $id = \DB::table($table)->insertGetId($data);
        $var=sprintf("%04d", $id);
        $number = $pre.date('Y').$var;
        $starttime =  date('Y-m-d H:i:s',time());
        $data_info = [
            'id'=>$id,
            'number'=>$number,
            'name'=>$name,
            'starttime'=>$starttime,
        ];
        $info = \DB::table($table_info)->insert($data_info);
        if($info){
            echo('{"code":200, "message":"注册成功"}');
        }else{
            echo('{"code":1, "message":"注册失败"}');
        }
    }

    //前端登录页面
    public function login(){
        return view('home.login');
    }

    public function checklogin(){
        $raw = file_get_contents('php://input');
        $json = json_decode($raw);
        $type = $json->type;
        if($type == '1'){
            $table = 'student';
            $table_info = 'student_info';
        }elseif($type == '0'){
            $table = 'teacher';
            $table_info = 'teacher_info';
        }
        $username = $json->username;
        $password = $json->password;
        $data = \DB::table($table)->where('username',$username)->first();
        $id = $data->id;
        $real_password =\Crypt::decrypt($data->password);
        if($password == $real_password){
            $arr=[];
            $time = date('Y-m-d H:i:s',time());
            $arr['lastlogin']=$time;
            \DB::table($table_info)->where('id',$id)->update($arr);
            \Session::put('userInfo.username', $username);
            \Session::put('userInfo.id', $id);
            \Session::put('userInfo.type',$type);
            if($type == '1'){
                echo('{"code":200, "message":"登录成功" ,"href":"student"}');
            }else{
                echo('{"code":200, "message":"登录成功" ,"href":"teacher"}');
            }
        }else{
            echo('{"code":1, "message":"登陆失败"}');
        }
    }

    public function findpass(){
        return view('home.findpass');
    }

    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login');
    }

    public function delDir($path){
        // 读取路径
        $arr=scandir($path);
        // 遍历并且删除
        foreach ($arr as $key => $value) {
            // 过滤.和..
            if ($value !='.' && $value!='..') {
                unlink($path.'/'.$value);
            }
        }
    }

    public function flush(){
        $this->delDir("../storage/framework/views");
        $this->delDir("../storage/framework/cache");
        return back();
    }

    public function info($id,$type){
        if($type == '1'){
            $table = 'student';
            $table_info = 'student_info';
        }elseif($type == '0'){
            $table = 'teacher';
            $table_info = 'teacher_info';
        }
        $info=\DB::table($table)
                ->select($table.'.*',$table_info.'.*','type.name as tpname')
                ->where($table.".id",$id)
                ->join($table_info,$table_info.".id",$table.".id")
                ->join('type','type.id',$table.".typeid")
                ->get();
//        dd($info);
        return view('home.'.$table.'.info')->with('info',$info);
//        dd($detail_info);
    }

}