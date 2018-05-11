<?php
/**
 * Created by PhpStorm.
 * User: codel
 * Date: 2018/3/20
 * Time: 17:45
 */
namespace App\Http\Controllers\Home\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    //所在班级
    public function index(Request $request)
    {
        $id=session('userInfo.id');
        $class= \DB::table('student')
                ->where('id',$id)
                ->first();
        $classid = $class->typeid;
//        dump($classid);
        $info1= \DB::table('student_relation')
            ->join('type','type.id','student_relation.classid')
            ->where([
                ['student_relation.studentid',$id],
                ['type.kind','3'],
                ['student_relation.classid',$classid]
            ])
            ->get();
//        dump($info1);
        $info2 = \DB::table('student_relation')
            ->join('type','type.id','student_relation.classid')
            ->where([
                ['student_relation.studentid',$id],
                ['type.kind','3'],
                ['student_relation.state','2'],
                ['student_relation.classid','!=',$classid]
            ])
            ->get();
//        dump($info2);
        return view('home.student.type.index')->with('data1',$info1)->with('data2',$info2);
    }

}