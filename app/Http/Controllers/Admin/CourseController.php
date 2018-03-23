<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    //index 方法
    public function index(Request $request){
        $tot = \DB::table('course')->count();
        $data =  \DB::table('course')->paginate(8);
        foreach ($data as $vv){
            $vv->type = $this->getName($vv->typeid);
        }
//        print_r($data);
//        exit();
        return view('admin.course.index')->with('tot',$tot)->with('data',$data);
    }

    protected function getName($id){
        $type = \DB::table('type')->select('name')->where('id','=',$id)->get();
        foreach ($type as $ty){
            return $ty->name;
        }

    }

    //课程添加页面
    public function create(){
        //查询分类
        $data=\DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','<=','2')->orderBy('p','asc')->get();
//        var_dump($data);
        return view('admin.course.add')->with('data',$data);
    }

    //插入操作  admin/admin  post
    public function store(){
        parse_str($_POST['str'],$arr);
//        print_r($arr);
//        exit();
        $rules=[
            'name' => 'required',
            'info' => 'required',
            'typeid' => 'required',
            'isselect'=> 'required',
            'starttime' => 'required',
            'endtime' => 'required',
        ];
//        // 表单验证的提示信息
        $message=[
            "name.required"=>"请输入名称",
            "info.required"=>"请输入简介",
            "typeid.required"=>"请选择分类",
            'isselect.required'=>'请选择是否可选修',
            "starttime.required"=>"请输入课程开启时间",
            "endtime.required"=>"请输入课程关闭时间",
        ];
//        // 使用laravel的表单验证
        $validator = \Validator::make($arr,$rules,$message);
        if ($validator->passes()) {
            if (\DB::table("course")->insert($arr)) {
                return 1;
            }else{
                return 0;
            }
        }else{
//            return 'msg';
            return $validator->getMessageBag()->getMessages();
        }
    }

}