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
//        var_dump($data);
        return view('home.student.course.index')->with('data',$data);
    }


    //选课列表
    public function choose(){
        $id = session('userInfo.id');
        $course =\DB::table('course')->select('course.*','type.name as tname')->join('type','type.id','course.typeid')->where('course.type','1')->get();
        $selected = \DB::table('student_relation')->select('course.*','type.name as tname')->join('type','type.id','student_relation.classid')
                ->join('course','course.typeid','student_relation.classid')
                ->where([['student_relation.studentid',$id],['course.type','1']])->get();
//        var_dump($course);
//        var_dump($selected);
//        $count = count($course)-count($selected);
        if(count($course&&count($selected))){
            for ($i = 0; $i < count($course); $i++) {
                $a[$i] = true;
                for($j=0;$j<count($selected);$j++) {
                    if ($course[$i]->id == $selected[$j]->id) {
                        $a[$i] = false;
                    }
                }
            }
        }
        for($i = 0;$i<count($course);$i++){
            if($a[$i] ==false){
                unset($course[$i]);
            }
        }
//        var_dump($course);
        return view('home.student.course.choose')->with('course',$course)->with('selected',$selected);
    }

    public function questioninfo($id){
//        +"id": 1
//        +"name": "第一次作业"
//        +"info": "完成环境安装"
//        +"extras": "152544130723463.txt"
//        +"teacherid": 1
//        +"classid": 11
//        +"courseid": 1
//        +"createtime": "2018-05-04 13:41:48"
        $data = \DB::table('question')->where('id',$id)->first();
        $data->studentid = session('userInfo.id');
//        dump($data);
        return view('home.student.course.infos')->with('data',$data);
    }

    //取消选课
    public function remove($id){
        $studentid = session('userInfo.id');
        $data = \DB::table('student_relation')->where([['classid',$id],['studentid',$studentid]])->first();
//        var_dump($data);

        $relationid = $data->id;
//        var_dump($relationid);
        if(\DB::table('student_relation')->delete($relationid)){
            return 1;
        }
    }

    //作业列表
    public function question($courseid,$classid){
        $question = \DB::table('question')->where([['courseid',$courseid],['classid',$classid]])->get();
//        var_dump($question);
        return view('home.student.course.question')->with('question',$question);
    }

    //展示课程详情
    public function showinfo($id){
        $data = \DB::table('course')->select('course.*','type.name as tname')->join('type','course.typeid','type.id')
                ->where('course.id',$id)->first();
//        dump($data);
        return view('home.student.course.info')->with('data',$data);
    }

    public function select(){
        $studentid = session('userInfo.id');
        parse_str($_POST['str'], $arr);
        $classid = $arr['typeid'];
        $arr1 = [
            'studentid'=>$studentid,
            'classid'=>$classid,
            'state'=>'1'
        ];
        if (\DB::table("student_relation")->insert($arr1)) {
            return 1;
        }else{
            return 0;
        }
    }

    public  function addwork() {
        parse_str($_POST['str'], $arr);
        // 表单验证的规则
        $rules = [
            'tname' => 'required',
        ];
        $message = [
            "tname.required" => "请输入作业名称",
        ];
        $validator = \Validator::make($arr, $rules, $message);
        if ($validator->passes()) {
            unset($arr['works']);
            $arr['committime'] = date('Y-m-d H:i:s', time());
            // 插入数据库
//            var_dump($arr);
//            die();
            if (\DB::table("work")->insert($arr)) {
                return 1;
            }else{
                return 0;
            }
        } else {
            // 具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();
        }
    }

    //已提交作业列表
    public function work($id){

    }
}