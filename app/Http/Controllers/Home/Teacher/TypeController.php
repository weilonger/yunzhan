<?php
/**
 * Created by PhpStorm.
 * User: codel
 * Date: 2018/3/20
 * Time: 17:45
 */
namespace App\Http\Controllers\Home\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    //index 方法
    public function index(Request $request)
    {

    }

    public function banji(){
        $id=session('userInfo.id');
        $info1 = \DB::table('teacher_relation')
                ->join('type','type.id','teacher_relation.classid')
                ->where([
                    ['teacher_relation.teacherid',$id],
                    ['type.kind','3']
                ])
                ->get();
//        foreach ($info1 as $in){
//            $in->kind1 = count(explode('-',$in->path.$in->id))-2;
//        }

        $info2 = \DB::table('relation')
                ->join('type','type.id','relation.classid')
                ->where([
                    ['relation.teacherid',$id],
                    ['type.kind','3']
                ])
                ->get();
//        foreach ($info2 as $in){
//            $in->kind1 = count(explode('-',$in->path.$in->id))-2;
//        }
//        dd($info1);
        $class = \DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind','3')->orderby('p')->get();
        return view('home.teacher.type.banji')->with('data1',$info1)->with('data2',$info2)->with('class',$class);
    }

    public function check($id){
        $info = \DB::table('student_relation')
            ->join('student','student.id','student_relation.studentid')
            ->join('student_info','student_info.id','student_relation.studentid')
            ->where('student_relation.classid',$id)
            ->paginate(6);
        $tot = count(\DB::table('student_relation')->where('student_relation.classid',$id)->get());
//        dd($info);
        return view('home.teacher.type.check')->with('info',$info)->with('tot',$tot);
    }
}