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
//    Route::get('register','CommonController@register');
});

Route::get('admin/login', 'Admin\LoginController@index');
Route::get('/admin/captcha/{tmp}', 'Admin\LoginController@captcha');
Route::get('admin/yzm','Admin\LoginController@yzm');

// 后台路由
// 通过路由组 提取公共命名空间 公共的前缀
<<<<<<< HEAD
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
=======
Route::group(['namespace'=>'Admin','prefix'=>'admin', 'middleware' => ['web']],function(){
>>>>>>> 5b7e805930e514087a87842ef472f0e9f8e27e83
    // 后台首页
    Route::get('/','IndexController@index');

    Route::resource('user','UserController');
    // 后台商品管理模块
    Route::resource('admin','AdminController');
    // 文件上传路由
    Route::any('upload','IndexController@upload');
//    Route::any('admin/update','AdminController@update');


    Route::post('check','LoginController@check');


    Route::get('logout', 'LoginController@logout');

    Route::get('dash', 'DashboardController@index');

    Route::post('admin/ajaxStatu','AdminController@ajaxStatu');
    //无限分类
    Route::resource('type','TypeController');

    Route::resource('config','ConfigController');

    Route::resource('slider','SliderController');

    Route::resource('article','ArticleController');

    Route::resource('types','TypeArticleController');

});

 // 图片上传
// Route::get('photo','UserController@photo');

// Route::post('upload','UserController@upload');

// Route::get('cookie','UserController@cookie');

Auth::routes();
Route::get('/home', 'HomeController@index');
