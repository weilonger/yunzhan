<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use DB;

// 后台配置控制器
class ConfigController extends Controller
{
    // 后台配置首页方法

    public function index()
    {
        // 加载配置页面
        return view('admin.config.index');
    }

    public function store(Request $request)
    {
        // 接收原图
        $oldimg =  $request->input('oldimg');
        $type = $request->input('type');
        // 获取数据
        $arr = $request->except("_token", 'imgs','oldimg','type');
        // 写入文件中
        $str1 = var_export($arr, true);
        $str = "<?php 
        return " . $str1 . " ?>";
        // 写入到指定文件
        file_put_contents('../config/web.php', $str);
        if ($oldimg == $request->input("imgs")) {

        } else {
            unlink("./Uploads/Sys/" . $oldimg);
        }
        return back();
    }
}
