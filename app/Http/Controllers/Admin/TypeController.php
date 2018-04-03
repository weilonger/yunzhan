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
        return view('admin.type.manager');
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