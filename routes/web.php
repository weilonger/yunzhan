<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//学生、教师路由
Route::group(['namespace'=>'Home','middleware'=>['web','homeLogin']],function() {
    //学生页面
    Route::group(['namespace'=>'Student','prefix'=>'student'],function(){
        //学生首页
       Route::get('/','IndexController@index');
        //查看课程
        Route::get('course','CourseController@index');
        //查看班级
        Route::get('class','TypeController@index');
        //查看作业问题
        Route::get('question/{courseid}/{classid}','CourseController@question');
        //查看选课列表
        Route::get('choose','CourseController@choose');
        //选课操作
        Route::post('select','CourseController@select');
        //确认课程信息
        Route::get('showinfo/{id}','CourseController@showinfo');
        //删除选课
        Route::get('remove/{id}','CourseController@remove');
        //作业信息
        Route::get('questioninfo/{id}','CourseController@questioninfo');
        //作业上传
        Route::post('addwork','CourseController@addwork');
    });

    //教师页面
    Route::group(['namespace'=>'Teacher','prefix'=>'teacher'],function(){
        //教师首页
        Route::get('/','IndexController@index');
        //班级页面
        Route::get('banji','TypeController@banji');
        //班级人员查看
        Route::get('check/{id}','TypeController@check');
        //查看所授课程列表
        Route::get('course','CourseController@index');
        //课程添加页面
        Route::get('course/add','CourseController@add');
        //课程添加操作
        Route::post('course/charu','CourseController@charu');
        //根据课程查看相关作业列表
        Route::get('question/{id}','CourseController@question');
        //添加作业
        Route::post('addquestion','CourseController@addquestion');
        //传递作业信息
        Route::get('addinfo/{id}','CourseController@addinfo');
        //查看学生作业上传情况
        Route::get('work/{id}','CourseController@work');
        //查看学生选课
        Route::get('choose','CourseController@choose');
        //确认学生选课信息
        Route::get('confirm/{studentid}/{classid}/{courseid}','CourseController@confirm');
        //确认动作
        Route::post('agree','CourseController@agree');

    });
    //退出登录
    Route::get('logout','IndexController@logout');
    //清除缓存
    Route::get('flush','IndexController@flush');
    //个人信息展示
    Route::get('info/{id}/{type}','IndexController@info');
});

// 前台路由
Route::group(['namespace'=>'Home'],function(){
    // 前台首页
    Route::get('/',"IndexController@index");
    //登陆页面
    Route::get('login','IndexController@login');
    //登陆验证
    Route::post('checklogin','IndexController@checklogin');
    //注册页面
    Route::get('register','IndexController@register');
    //完成注册
    Route::post('add','IndexController@add');
    //找回密码页面
    Route::get('findpass','IndexController@findpass');
    //发送短信
    Route::post('sendsms','SmsController@send');
    //短信验证
    Route::post('checksms','SmsController@check');
    //
    Route::post('checkname','IndexController@checkname');
    //发送邮件
    Route::any('sendmail','MailController@send');
    //邮箱验证
    Route::post('checkmail','MailController@check');
    //文件上传
    Route::any('upload','IndexController@upload');
    //文件下载
    Route::any('download/{path}/{name}','IndexController@download');

});

//后端路由
Route::group(['namespace'=>'Admin','prefix'=>'admin',],function() {
    //登陆
    Route::get('login', 'LoginController@index');
    //验证码
    Route::get('captcha/{tmp}', 'LoginController@captcha');
    //登录检验
    Route::post('check', 'LoginController@check');
    Route::get('yzm', 'LoginController@yzm');
});

// 后台路由
// 通过路由组 提取公共命名空间 公共的前缀
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>['web','adminLogin']],function(){
    // 后台首页
    Route::get('/','IndexController@index');
    //清除缓存
    Route::get('flush','IndexController@flush');
    //当前管理员信息
    Route::get('info/{id}','AdminController@info');
    //课程控制器
    Route::resource('course','CourseController');
    //修改课程状态
    Route::post('course/ajaxStatu','CourseController@ajaxStatu');
    //添加班级页面
    Route::post('course/establish','CourseController@establish');
    //添加班级操作
    Route::post('course/tianjia','CourseController@tianjia');
    //分派课程页面
    Route::post('course/allocate','CourseController@allocate');
    //分派课程操作
    Route::post('course/fenpei','CourseController@fenpei');
    //课程分配
    Route::get('assign','CourseController@assign');
    //用户添加页面
    Route::get('user/add/{type}','UserController@add');
    //用户添加操作
    Route::post('user/deposit/{type}','UserController@deposit');
    //用户详情页面
    Route::get('user/detail/{id}/{type}','UserController@detail');
    //用户信息展示
    Route::get('user/{type}','UserController@index');
    //状态修改
    Route::post('user/ajaxStatu','UserController@ajaxStatus');
    // 后台商品管理模块
    Route::resource('admin','AdminController');
    // 文件上传路由
    Route::any('upload','IndexController@upload');
//    Route::any('admin/update','AdminController@update');
    //登出
    Route::get('logout', 'LoginController@logout');

    Route::get('dash', 'DashboardController@index');
    //状态修改
    Route::post('admin/ajaxStatu','AdminController@ajaxStatu');
    //无限分类
    Route::resource('type','TypeController');
    //查看班级学生
    Route::get('type/check/{id}','TypeController@check');
    //班级管理
    Route::get('manager','TypeController@manager');
    //后台配置
    Route::resource('config','ConfigController');
    //轮播图
    Route::resource('slider','SliderController');
    //论文管理
//    Route::resource('article','ArticleController');
    //分类论文资源
//    Route::resource('types','TypeArticleController');

});

 // 图片上传
// Route::get('photo','UserController@photo');

// Route::post('upload','UserController@upload');

// Route::get('cookie','UserController@cookie');

//Auth::routes();
