<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
class TypeController extends Controller
{
    //分类管理页面
    public function index(Request $request){
        // 四、实现树形结构
//        $data=\DB::select("select type.*,concat(path,id) p from type order by p");
        $data=\DB::table('type')->select(DB::raw('*,concat(path,id) as p'))->orderBy('p','asc')->paginate(10);
        $tot= \DB::table('type')->count();
//        var_dump($data);
        // 查询数据
        // $data=\DB::table("type")->orderBy("sort",'desc')->get();
        // 加载页面
        return view("admin.type.index")->with("data",$data)->with("tot",$tot);
    }

    public function create(){
        return view('admin.type.add');
    }

    //插入操作  admin/admin  post
    public function store(Request $request){
        $data = $request->except("_token");
        $data['kind']=substr_count($data['path'],'-')-1;
//        $data['createtime']=date('Y-m-d H:i:s',time());
//        var_dump($request->all());
        if(DB::table('type')->insert($data)){
            return redirect('admin/type');
        }else{
            return back()->with("error","存储失败");
        }
    }

    //修改页面  admin/admin    post
    public function edit($id){

    }

    //更新操作  admin/admin/{admin}/edit  get
    public function update(){
    }

    //删除操作  admin/admin/{admin}  delete
    public function destroy($id){
        if(\DB::delete("delete from type where id=$id or path like '%,$id-%'")){
            return 1;
        }else{
            return 0;
        }
    }

    public function manager(){
        $class = \DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','3')->orderby('p')->paginate(8);

        foreach ($class as $vv){
            $vv->count = count(\DB::table('student_relation')->where('classid',$vv->id)->get());
        }
//dd($class);
        $tot = count(\DB::table('type')->where('kind','3')->get());
        return view('admin.type.manager')->with('class',$class)->with('tot',$tot);
    }

    public function check($id){
//        $tot = count(\DB::table('student_relation')->where('classid',$id)->get());
        $info = \DB::table('student_relation')
                ->join('student','student.id','student_relation.studentid')
                ->join('student_info','student_info.id','student_relation.studentid')
                ->where('student_relation.classid',$id)
                ->paginate(6);
        $teacher1 = \DB::table('teacher_relation')
                        ->join('teacher','teacher.id','teacher_relation.teacherid')
                        ->join('teacher_info','teacher_info.id','teacher_relation.teacherid')
                        ->where('teacher_relation.classid',$id)
                        ->first();

        $teacher2 = \DB::table('relation')
                    ->join('teacher','teacher.id','relation.teacherid')
                    ->join('teacher_info','teacher_info.id','relation.teacherid')
                    ->where('relation.classid',$id)
                    ->first();
//        dd($info);

        $class = \DB::table('type')->where('id',$id)->first();
//        dd($class);
        $kind1 = count(explode('-',$class->path))-2;
        $state = ($kind1 == $class->kind)?1:0;
//        dd($state);
        return view('admin.type.check')->with('data',$info)->with('teacher1',$teacher1)->with('teacher2',$teacher2)->with('state',$state);
    }

    public function bianli(){
        $one=\DB::table("type")->where("pid",0)->get();
        // 遍历one的孩子
        foreach ($one as $value) {
            $value->zi=\DB::table("type")->where("pid",$value->id)->get();
        }
        // 遍历三级分类
        foreach ($one as $value) {
            foreach ($value->zi as $v) {
                $v->zi=\DB::table("type")->where("pid",$v->id)->get();
            }
        }
        // 二、使用递归实现数据格式化
        $arr=$this->data();
        // 三、使用递归实现数据格式化
        $data=\DB::table("type")->get();
        $arr=$this->data1($data,$pid=0);
    }

    // 数据格式化处理方法
    public function data($pid=0){
        // 数据库查询
        $data=\DB::table("type")->where("pid",$pid)->get();
        // 查询下一级分类
        foreach ($data as $key => $value) {
            $value->zi=$this->data($value->id);
        }
        return $data;
    }

    // 数据格式化
    public function data1($data,$pid=0){
        $newArr=array();
        // 获取顶级分类
        foreach ($data as $key => $value) {
            if ($value->pid==$pid) {
                $newArr[$value->id]=$value;
                $newArr[$value->id]->zi=$this->data1($data,$value->id);
            }
        }
        return $newArr;
    }

}