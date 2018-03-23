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
    Route::get('mail/send','MailController@send');
//    Route::get('register','CommonController@register');
});

Route::get('admin/login', 'Admin\LoginController@index');
Route::get('admin/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::get('admin/yzm','Admin\LoginController@yzm');

// 后台路由
// 通过路由组 提取公共命名空间 公共的前缀

Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
    // 后台首页
    Route::get('/','IndexController@index');

    Route::resource('course','CourseController');

    Route::resource('user','UserController');
    // 后台商品管理模块
    Route::resource('admin','AdminController');
    // 文件上传路由
    Route::any('upload','IndexController@upload');
//    Route::any('admin/update','AdminController@update');
    //登录检验
    Route::post('check','LoginController@check');
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
