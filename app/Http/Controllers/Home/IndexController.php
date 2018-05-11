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
        $data=\DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','<=','3')->orderBy('p','asc')->get();
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
            $table_relation = 'student_relation';
            $pre = '11';
        }elseif($type == '0'){
            $table = 'teacher';
            $table_info = 'teacher_info';
            $table_relation = 'teacher_relation';
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
            'email'=>$json->mail,
            'starttime'=>$starttime,
        ];
        $info = \DB::table($table_info)->insert($data_info);
        if($type == '1') {
            $data_relation = [
                'studentid' => $id,
                'classid' => $json->typeid,
            ];
        }elseif($type == '0'){
            $data_relation = [
                'teacherid' => $id,
                'classid' => $json->typeid,
            ];
        }
        $relation = \DB::table($table_relation)->insert($data_relation);
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
            $table_relation = 'student_relation';
        }elseif($type == '0'){
            $table = 'teacher';
            $table_info = 'teacher_info';
            $table_relation = 'teacher_relation';
        }
        $info=\DB::table($table)
                ->select($table.'.*',$table_info.'.*','type.name as tpname')
                ->where($table.".id",$id)
                ->join($table_info,$table_info.".id",$table.".id")
                ->join('type','type.id',$table.".typeid")
                ->first();
//        dd($info);
        $info->password = \Crypt::decrypt($info->password);
        return view('home.'.$table.'.info')->with('info',$info);
//        dd($detail_info);
    }

    public function upload(Request $request){
        $type = $request->input('type');

        if($request->hasFile('extra')) {
            $state ='extra';
        }elseif($request->hasFile('work')){
            $state = 'work';
        }else{
            $state = Null;
        }
        if($state !=Null){
            $file = $request->file($state);
            // 判断目录是否存在
            //        $dir=$request->input('files');
            if (!file_exists("./Uploads/$type")) {
                mkdir("./Uploads/$type");
            }
//            echo 1;
            // 判断上传的文件是否有效
            if ($file->isValid()) {
                //             获取后缀
                $ext = $file->getClientOriginalExtension();
                // 生成新的文件名
//                // 移动到指定目录
//                $request->file('extras')->move("./Uploads/$type", $newFile);

//                $ext = $file->getClientOriginalExtension();
//                // 生成新的文件名
//                $name = $request->input('extra');
//                $newFile = $name . $ext;
                $newFile = time() . rand() . '.' . $ext;
                // 移动到指定目录
                $request->file($state)->move("./Uploads/$type", $newFile);
                echo json_encode($newFile) ;
            }
        }else{
            exit();
        }
    }

    public function download($path,$name)
    {
//        echo "下载";
        header("Content-type:text/html;charset=utf-8");
        //$file_path="testMe.txt";
        //用以解决中文不能显示出来的问题
        //$file_name=iconv("utf-8","gb2312",$file_name);
        //$file_sub_path=$_SERVER['DOCUMENT_ROOT']."marcofly/phpstudy/down/down/";
        //$file_path=$file_sub_path.$file_name;
        //首先要判断给定的文件存在与否
        $file_path ='Uploads/'. $path.'/'.$name;
//        dd($file_path);
        if(!file_exists($file_path)){
            echo "没有该文件文件";
            return ;
        }
        $fp=fopen($file_path,"r");
        $file_size=filesize($file_path);
        //下载文件需要用到的头
        Header("Content-type: application/octet-stream");
        Header("Accept-Ranges: bytes");
        Header("Accept-Length:".$file_size);
        Header("Content-Disposition: attachment; filename=".$name);
        $buffer=1024;
        $file_count=0;
        //向浏览器返回数据
        while(!feof($fp) && $file_count<$file_size){
            $file_con=fread($fp,$buffer);
            $file_count+=$buffer;
            echo $file_con;
        }
        fclose($fp);
    }
}