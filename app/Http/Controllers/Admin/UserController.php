<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;

// 后台用户管理首页控制器
class UserController extends Controller
{
   // 用户管理首页方法
    public function index($type){
        if($type){
            $table = 'student';
            $table_info = 'student_info';
            $info = [
                'status'=>'学生',
                'type'=>$type,
            ];
        }else{
            $table = 'teacher';
            $table_info = 'teacher_info';
            $info = [
                'status'=>'教师',
                'type'=>$type,
            ];
        }
        // 加载用户管理页面
        $data =\DB::table($table)
            ->select($table.'.*',$table_info.'.*','type.name as tpname')
            ->join($table_info,$table_info.".id",$table.".id")
            ->join('type','type.id',$table.".typeid")
            ->paginate(6);
        foreach ($data as $vv){
            $vv->password = \Crypt::decrypt($vv->password);
        }

        $tot = count($data);
//        dd($data);
//        var_dump($data);
        return view('admin.user.index')->with('info',$info)->with('data',$data)->with('tot',$tot);
    }

    public function ajaxStatus(Request $request){
        $type = $request->input('type');
        $arr=$request->except('_token','type');
        if($type){
            $table = 'student_info';
        }else{
            $table = 'teacher_info';
        }
        if(\DB::table($table)->where('id','=',$arr['id'])->update(["state"=>$arr['state']])) {
            return 1;
        }else{
            return 0;
        }
    }

    public function detail($id,$type){
        if($type){
            $table = 'student';
            $table_info = 'student_info';
            $info = [
                'status'=>'学生',
                'type'=>$type,
            ];
        }else{
            $table = 'teacher';
            $table_info = 'teacher_info';
            $info = [
                'status'=>'教师',
                'type'=>$type,
            ];
        }
        // 加载用户管理页面
        $data =\DB::table($table)
            ->select($table.'.*',$table_info.'.*','type.name as tpname')
            ->where($table.".id",$id)
            ->join($table_info,$table_info.".id",$table.".id")
            ->join('type','type.id',$table.".typeid")
            ->first();
        $data->password = \Crypt::decrypt($data->password);
        return view('admin.user.detail')->with('info',$info)->with('data',$data);
    }
//    // 后台用户管理修改页面
//    public function edit(){
//    	return view('admin.user.edit');
//    }
//
//    // 后台用户管理添加页面
    public function add($type){
        if($type){
            $info = [
                'status'=>'学生',
                'type'=>$type,
            ];
        }else{
            $info = [
                'status'=>'教师',
                'type'=>$type,
            ];
        }
        $data=\DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','<=','3')->orderBy('p','asc')->get();
    	return view('admin.user.add')->with('info',$info)->with('data',$data);
    }

    public function deposit($type,Request $request){
        $data = $request->except("_token");
//        dd($data);
        if($type == '1'){
            $table = 'student';
            $table_info = 'student_info';
            $table_relation = 'student_relation';
            $pre = '11';
        }elseif($type == '0'){
            $table = 'teacher';
            $table_info = 'teacher_info';
            $table_relation = 'teacher_realtion';
            $pre = '00';
        }
//        array:[
//          "username" => ""
//          "name" => ""
//          "gender" => "1"
//          "typeid" => ""
//          "password" => ""
//          "phone" => ""
//          "email" => ""
//        ]
        $data = [
            'username'=>$request->username,
            'gender'=>$request->gender,
            'typeid'=>$request->typeid,
            'password'=>\Crypt::encrypt($request->password),
            'phone'=>$request->phone
        ];
//        dd($data);
        $id = \DB::table($table)->insertGetId($data);
        $var=sprintf("%04d", $id);
        $number = $pre.date('Y').$var;
        $starttime =  date('Y-m-d H:i:s',time());
        $data_info = [
            'id'=>$id,
            'number'=>$number,
            'name'=>$request->name,
            'email'=>$request->email,
            'starttime'=>$starttime,
        ];
        $info = \DB::table($table_info)->insert($data_info);
        if($type == '1') {
            $data_relation = [
                'studentid' => $id,
                'classid' => $request->typeid,
            ];
        }elseif($type =='0'){
            $data_relation = [
                'teacherid' => $id,
                'classid' => $request->typeid,  
            ];
        }
        $relation = \DB::table($table_relation)->insert($data_relation);
        if($info){
            return redirect('admin/user/'.$type);
        }else{
            return back()->with("error","存储失败");
        }
    }
//
//    // 添加操作
//    public function store(){
//
//    }
//
//
//    // 修改操作
//    public function update(){
//
//    }
//
//
//    // 删除操作
//    public function destory(){
//
//    }
//
}
