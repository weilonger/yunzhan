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

// 后台路由
// 通过路由组 提取公共命名空间 公共的前缀
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
    // 后台首页
    Route::get('/','IndexController@index');
    // 后台用户管理模块
    Route::resource('user','UserController');
    // 后台商品管理模块
    Route::resource('admin','AdminController');

//    Route::any('admin/update','AdminController@update');

    Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'LoginController@login');

    Route::get('yzm','LoginController@yzm');
    Route::post('logout', 'LoginController@logout');

    Route::get('dash', 'DashboardController@index');

    Route::post('admin/ajaxStatu','AdminController@ajaxStatu');
});

 // 图片上传
 Route::get('photo','UserController@photo');

 Route::post('upload','UserController@upload');

 Route::get('cookie','UserController@cookie');

Auth::routes();
Route::get('/home', 'HomeController@index');
