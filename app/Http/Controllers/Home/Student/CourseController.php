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

class CourseController extends Controller
{
    //当前所有课程
    public function index()
    {
        $id=session('userInfo.id');
        $data= \DB::table('student_relation')
            ->select('relation.courseid','student_relation.*','course.*','type.name as tname')
            ->join('relation','student_relation.classid','relation.classid')
            ->join('course','course.id','relation.courseid')
            ->join('type','type.id','relation.classid')
            ->where('studentid',$id)
            ->get();
        var_dump($data);
        return view('home.student.course.index')->with('data',$data);
    }


    //选课列表
    public function choose(){

    }

    //作业列表
    public function question($id){

    }

    //已提交作业列表
    public function work($id){

    }
}