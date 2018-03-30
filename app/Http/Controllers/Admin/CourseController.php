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
            'isable'=> 'required',
            'starttime' => 'required',
            'endtime' => 'required',
        ];
//        // 表单验证的提示信息
        $message=[
            "name.required"=>"请输入名称",
            "info.required"=>"请输入简介",
            "typeid.required"=>"请选择分类",
            'isable.required'=>'请选择是否开启',
            "starttime.required"=>"请输入课程开启时间",
            "endtime.required"=>"请输入课程关闭时间",
        ];
//        // 使用laravel的表单验证
        $validator = \Validator::make($arr,$rules,$message);
        $typeid = $arr['typeid'];
        $data = \DB::table('type')->select('*')->where('id',$typeid)->first();
        $kind = $data->kind;
//        return $kind;
        if ($kind<=2){
            $arr['type'] = '1';
        }else{
            $arr['type'] = '0';
        }
        if ($validator->passes()) {
            if (\DB::table("course")->insert($arr)) {
//                \DB::table('type')->insert();
                return 1;
            }else{
                return 0;
            }
        }else{
//            return 'msg';
            return $validator->getMessageBag()->getMessages();
        }
    }

    public function edit($id){
        $data = \DB::table("course")->find($id);
        $type =\DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','<=','2')->orderBy('p','asc')->get();
        return view('admin.course.edit')->with('data',$data)->with('type',$type);
    }

    public function update(){
        parse_str($_POST['str'],$arr);
        $id = $arr['id'];
        unset($arr['id']);
        // 表单验证的规则
//        print_r($arr);
        $rules=[
            'name' => 'required',
            'info' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
        ];
        // 表单验证的提示信息
        $message=[
            "name.required"=>"请输入名称",
            "info.required"=>"请输入简介",
            "starttime.required"=>"请输入开始时间",
            "endtime.required"=>"请输入结束时间",
        ];
        // 使用laravel的表单验证
        $validator = \Validator::make($arr,$rules,$message);
        // 开始验证
        if ($validator->passes()) {
            // 验证通过添加数据库
//            return 1;
            if (\DB::table('course')->where('id',$id)->update($arr)) {
                return 1;
            }else{
                return 0;
            }
        }else{
            // 具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();
        }
    }

    //删除操作
    public function destroy($id){
        if (\DB::table("course")->delete($id)) {
            return 1;
        }else{
            return 0;
        }
    }

    public function ajaxStatu(Request $request){
        $arr=$request->except('_token');
        if(\DB::table('course')->where('id','=',$arr['id'])->update(["isable"=>$arr['isable']])) {
            return 1;
        }else{
            return 0;
        }
    }

    public function assign(){
        $data = \DB::table('course')->where('isable','1')->paginate(8);
        foreach ($data as $vv){
            $vv->tpname = $this->getName($vv->typeid);
        }
        $tot =\DB::table('course')->where('isable','1')->count() ;
//        dd($data);
        return view('admin.course.assign')->with('data',$data)->with('tot',$tot);
    }


    public function establish(Request $request){

    }

    public function allocate(Request $request){
        //课程id
        $id = $request->input('id');
        //父id
        $typeid = $request->input('typeid');
        $data = \DB::table('type')
//            ->select(\DB::raw('type.*,teacher.name,concat(type.path,type.id) as p'))
//            ->join('teacher','teacher.typeid','type.id')
//            ->orderby('p','asc')
            ->select('*')
            ->where([
                ['pid', $typeid],
                ['kind','3'],
            ])
            ->get();

        return view('admin.course.allocate')->with('data',$data)->with('id',$id);
    }
}