<?php
use think\Route;


/*home前台*/
Route::rule('/','home/index/index','GET');  //首页路由注册


//前台路由设置
Route::group('home',function(){
    //前台首页
    Route::get('index/index','home/index/index');
    //前台关于我们
    Route::get('about/index','home/about/index');
    //前台团队服务
    Route::get('','');
});


//后台路由设置
Route::group('admin',function(){
    //管理员登录
    Route::any('manager/login','admin/manager/login',['methed'=>'get|post']);
    //管理员退出登录
    Route::get('manager/out','admin/manager/out');

    //后台首页
    Route::get('index/index','admin/index/index');
    Route::get('index/welcome','admin/index/welcome');
    //前台联系方式展示 包括地址 网址等
    Route::get('about/tel','admin/about/tel');
    //联系方式修改
    Route::any('about/xiugai','admin/about/xiugai');


});