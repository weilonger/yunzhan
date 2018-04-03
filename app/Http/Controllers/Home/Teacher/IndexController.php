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

class IndexController extends Controller
{
    //index 方法

    public function index(Request $request)
    {
        $id = session('userInfo.id');
        $data = \DB::table('teacher_info')->where('id',$id)->first();
//        dd($data);
        return view('home.teacher.index')->with('data',$data);
    }
}