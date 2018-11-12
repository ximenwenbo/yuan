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
    //修改前台首页企业文化
    Route::any('abouts/edit','admin/abouts/edit',['methed'=>'get|post']);
    //前台企业文化
    Route::any('abouts/shouye','admin/abouts/shouye');
    //前台企业文化
    Route::any('abouts/index','admin/abouts/index');
    //前台首页公司主营业务
    Route::get('business/index','admin/business/index');
    //添加业务
    Route::any('business/tianjia','admin/business/tianjia',['methed'=>'get|post']);
    //修改业务
    Route::any('business/xiugai','admin/business/xiugai',['methed'=>'get|post']);
    //删除业务
    Route::post('business/shanchu','admin/business/shanchu');
    //公司二维码
    Route::get('picture/index','admin/picture/index');


});