<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
{
    //管理员页面

    public function index(Request $request){
//        echo "管理员控制器";
        $tot=DB::table('admin')->count();
        $users = DB::table('admin')->paginate(5);
        $type=\DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','<=','2')->orderBy('p','asc')->get();
        return view('admin.admin.index')->with('data',$users)->with('tot',$tot)->with('type',$type);
    }

    //插入操作  admin/admin  post
    public function store(){
        // 直接把字符串数组化
        parse_str($_POST['str'],$arr);
        // 表单验证的规则
        $rules=[
            'name' => 'required|unique:admin|between:5,12',
            'password' => 'required|same:repass|between:5,12',
        ];
        // 表单验证的提示信息
        $message=[
            "name.required"=>"请输入用户名",
            "password.required"=>"请输入密码",
            "name.unique"=>"用户名已存在",
            "password.same"=>"两次密码不一致",
            "password.between"=>"密码长度不在5-12位之间",
            "name.between"=>"用户名长度不在5-12位之间",
        ];

        // 使用laravel的表单验证
        $validator = Validator::make($arr,$rules,$message);
        // 开始验证
        if ($validator->passes()) {
            // 验证通过添加数据库
            unset($arr['repass']);
            $arr['password']=\Crypt::encrypt($arr['password']);
            $arr['scid'] = 1;
            $arr['starttime']=date('Y-m-d H:i:s',time());
            $arr['lastlogin']=date('Y-m-d H:i:s',time());
            // 插入数据库
            if (DB::table("admin")->insert($arr)) {
                return 1;
            }else{
                return 0;
            }
        }else{
            // 具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();
        }
    }

    //修改页面  admin/admin    post
    public function edit($id){
        $data = DB::table("admin")->find($id);
        $data->password=Crypt::decrypt($data->password);
        return view('admin.admin.edit')->with('data',$data);
    }

    //更新操作  admin/admin/{admin}/edit  get
    public function update(){
        parse_str($_POST['str'],$arr);
        // 表单验证的规则
//        print_r($arr);
        $rules=[
            'password' => 'required|same:repass|between:5,12',
        ];
        // 表单验证的提示信息
        $message=[
            "password.required"=>"请输入密码",
            "password.same"=>"两次密码不一致",
            "password.between"=>"密码长度不在5-12位之间",
        ];
        // 使用laravel的表单验证
        $validator = Validator::make($arr,$rules,$message);
        // 开始验证
        if ($validator->passes()) {
//            echo "123";
//            exit();
            // 验证通过添加数据库
            unset($arr['repass']);
            $arr['password']=Crypt::encrypt($arr['password']);
//            $data = ['password'=>"$arr[password]",'status'=>"$arr[status]"];
            // 插入数据库
            if (\DB::update("update admin set status= '$arr[status]' ,password='$arr[password]' where id=$arr[id]")) {
//            if (\DB::table('admin')->where('id',$arr[id])->update($data)) {
                return 1;
            }else{
                return 0;
            }
        }else{
            // 具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();
        }
    }

    //删除操作  admin/admin/{admin}  delete
    public function destroy($id){
        if (DB::table("admin")->delete($id)) {
            return 1;
        }else{
            return 0;
        }
    }

    public function ajaxStatu(Request $request){
        $arr=$request->except('_token');
//        print_r($arr);
//        if (\DB::update("update admin set status= '$arr[status]'where id=$arr[id]")) {
        if(DB::table('admin')->where('id','=',$arr['id'])->update(["status"=>$arr['status']])) {
//        if(DB::table('admin')->where('id', $arr['id'])->update(['status' => $arr['status']])){
            return 1;
        }else{
            return 0;
        }
    }

    public function info($id){
        $info = \DB::table('admin')->select("admin.*","type.name as type")->join('type','admin.typeid','=','type.id')->where('admin.id',$id)->first();
//        dd($info);
        $info->password = \Crypt::decrypt($info->password);
//        dd($info);
        return view('admin.admin.info')->with('info',$info);
    }
}