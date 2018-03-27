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
// 前台路由
Route::group(['namespace'=>'Home'],function(){
    // 前台首页
    Route::get('/',"IndexController@index");
    //注册页面
    Route::get('register','IndexController@register');
    //完成注册
    Route::get('register/add','IndexController@add');
    //发送短信
    Route::post('sendsms','SmsController@send');
    //短信验证
    Route::post('checksms','SmsController@check');
    //发送邮件
    Route::any('sendemail','EmailController@send');
    //邮箱验证
    Route::post('checkemail','EmailController@check');

});

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
    //用户控制器
    Route::resource('user','UserController');
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
    Route::resource('article','ArticleController');
    //分类论文资源
    Route::resource('types','TypeArticleController');

});

 // 图片上传
// Route::get('photo','UserController@photo');

// Route::post('upload','UserController@upload');

// Route::get('cookie','UserController@cookie');

//Auth::routes();
