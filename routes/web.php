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
    });

    //教师页面
    Route::group(['namespace'=>'Teacher','prefix'=>'teacher'],function(){
        //教师首页
        Route::get('/','IndexController@index');
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
    //添加班级
    Route::post('course/establish','CourseController@establish');
    //分派课程
    Route::post('course/allocate','CourseController@allocate');
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
