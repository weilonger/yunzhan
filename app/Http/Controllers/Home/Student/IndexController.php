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

class IndexController extends Controller
{
    //index 方法

    public function index(Request $request)
    {
        $id = session('userInfo.id');
        $data = \DB::table('student_info')->where('id',$id)->first();
//        dd($data);
        return view('home.student.index')->with('data',$data);
    }
}