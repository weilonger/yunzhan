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

class CourseController extends Controller
{
    //显示当前教师的课程
    public function index()
    {
        $id = session('userInfo.id');
        $info = \DB::table('relation')
            ->select('course.*', 'relation.*', 'type.name as name1')
            ->join('course', 'course.id', 'relation.courseid')
            ->join('type', 'type.id', 'relation.classid')
            ->where('relation.teacherid', $id)
            ->paginate(6);
//        dd($info);
        return view('home.teacher.course.index')->with('data', $info);
    }

    public function add()
    {
        $data = \DB::table('type')->select(\DB::raw('*,concat(path,id) as p'))->where('kind', '<=', '2')->orderBy('p', 'asc')->get();
        return view('home.teacher.course.add')->with('data', $data);
    }

    //插入操作  teacher/course  post
    public function charu()
    {
        parse_str($_POST['str'], $arr);
//        dd($arr);
//        print_r($arr);
//        exit();
        $rules = [
            'name' => 'required',
            'info' => 'required',
            'typeid' => 'required',
            'isable' => 'required',
            'starttime' => 'required',
            'endtime' => 'required',
        ];
//        // 表单验证的提示信息
        $message = [
            "name.required" => "请输入名称",
            "info.required" => "请输入简介",
            "typeid.required" => "请选择分类",
            'isable.required' => '请选择是否开启',
            "starttime.required" => "请输入课程开启时间",
            "endtime.required" => "请输入课程关闭时间",
        ];
//        // 使用laravel的表单验证
        $validator = \Validator::make($arr, $rules, $message);
        $typeid = $arr['typeid'];
        $data = \DB::table('type')->select('*')->where('id', $typeid)->first();
        $kind = $data->kind;
//        return $kind;
        if ($kind < 2) {
            $arr['type'] = '1';
        } else {
            $arr['type'] = '0';
        }
        if ($validator->passes()) {
            if (\DB::table("course")->insert($arr)) {
//                \DB::table('type')->insert();
                //插入教师信息到关系表
                return 1;
            } else {
                return 0;
            }
        } else {
//            return 'msg';
            return $validator->getMessageBag()->getMessages();
        }
    }

    //通过课程id查看作业题目
    public function question($id)
    {
        $question = \DB::table('question')->where('courseid', $id)->get();
//       dump($question);
        return view('home.teacher.course.question')->with('question', $question);
    }

    public function work($id){
        $work = \DB::table('work')->where('questionid',$id)->get();
//        dump($work);
        return view('home.teacher.course.work')->with('work',$work);
    }

    public function addinfo($id)
    {
        $info = \DB::table('relation')
            ->where('id', $id)
            ->first();
//        dd($info);
        return view('home.teacher.course.info')->with('info', $info);
    }


    public function addquestion()
    {
        parse_str($_POST['str'], $arr);
        // 表单验证的规则
        $rules = [
            'name' => 'required',
            'info' => 'required',
        ];
        // 表单验证的提示信息
        $message = [
            "name.required" => "请输入作业名称",
            "info.required" => "请输入作业简介",
        ];

        // 使用laravel的表单验证
        $validator = \Validator::make($arr, $rules, $message);
        // 开始验证
        if ($validator->passes()) {
            // 验证通过添加数据库
            unset($arr['extra']);
            $arr['createtime'] = date('Y-m-d H:i:s', time());
            // 插入数据库
            if (\DB::table("question")->insert($arr)) {
                return 1;
            }else{
                return 0;
            }
        } else {
            // 具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();
        }
    }
}