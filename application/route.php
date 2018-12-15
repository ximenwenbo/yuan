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
    //进入新闻列表
    Route::get('news/index','home/news/index');
    //新闻详情
    Route::get('news/detail','home/news/detail');
    //下一篇新闻
    Route::get('news/next','home/news/next');
    //上一篇新闻
    Route::get('news/last','home/news/last');
    //进入联系我们
    Route::get('contact/index','home/contact/index');
    //引入地图
    Route::get('contact/map','home/contact/map');
    //公司团队首页
    Route::get('team/index','home/team/index');
    //产品服务首页
    Route::get('product/index','home/product/index');
});

Route::get('index','index/VaDate/index');

//后台路由设置
Route::group('admin',function(){
    //管理员登录
    Route::any('admin','admin/manager/login',['methed'=>'get|post']);
    //管理员退出登录
    Route::get('manager/out','admin/manager/out');





    Route::group('',function(){
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
        //公司简介
        Route::get('profiles/index','admin/profiles/index');
        //添加简介
        Route::any('profiles/tianjia','admin/profiles/tianjia',['methed'=>'get|post']);
        //修改简介
        Route::any('profiles/xiugai','admin/profiles/xiugai',['methed'=>'get|post']);
        //公司新闻列表
        Route::get('news/index','admin/news/index');
        //添加新闻
        Route::any('news/tianjia','admin/news/tianjia',['methed'=>'get|post']);
        //修改新闻
        Route::any('news/xiugai','admin/news/xiugai',['methed'=>'get|post']);
        //删除新闻
        Route::post('news/shanchu','admin/news/shanchu');
        //banner图片第一张
        Route::get('lunbo_first/index','admin/lunbo_first/index');
        //后台-banner图第一张图片上传
        Route::post('lunbo_first/pics_up','admin/lunbo_first/pics_up');
        //修改banner图第一张
        Route::any('lunbo_first/xiugai','admin/lunbo_first/xiugai',['methed'=>'get|post']);
        //除banner图片第一张外的设置
        Route::get('lunbo_other/index','admin/lunbo_other/index');
        //后台-banner图片上传(除了第一张)
        Route::post('lunbo_other/pics_up','admin/lunbo_other/pics_up');
        //添加banner图（不包括第一张）
        Route::any('lunbo_other/tianjia','admin/lunbo_other/tianjia',['methed'=>'get|post']);
       //修改banner图
        Route::any('lunbo_other/xiugai','admin/lunbo_other/xiugai',['methed'=>'get|post']);
        //删除banner图
        Route::post('lunbo_other/shanchu','admin/lunbo_other/shanchu');
        //banner图上线设置
        Route::post('lunbo_other/change_status','admin/lunbo_other/change_status');
        //公司团队首页
        Route::get('team/index','admin/team/index');
        //添加团队成员
        Route::any('team/tianjia','admin/team/tianjia',['methed'=>'get|post']);
        //修改团队成员
        Route::any('team/xiugai','admin/team/xiugai',['methed'=>'get|post']);
        //删除团队成员
        Route::post('team/shanchu','admin/team/shanchu');
        //团队图片上传
        Route::post('team/pics_up','admin/team/pics_up');
        //产品服务列表
        Route::get('product_service/index','admin/product_service/index');
        //添加产品服务
        Route::any('product_service/tianjia','admin/product_service/tianjia');
        //修改产品服务
        Route::any('product_service/xiugai','admin/product_service/xiugai');
        //删除产品服务
        Route::post('product_service/delete','admin/product_service/delete');

    },['after_behavior'=>['\app\admin\behavior\CheckLogin']]);



});