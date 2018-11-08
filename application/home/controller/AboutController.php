<?php
namespace app\home\controller;


use think\Controller;

class AboutController extends Controller
{
    public function index()
    {

        //获取联系方式
        $info = get_tel();

        $this->assign('info',$info);


        return $this->fetch();

    }




}


















