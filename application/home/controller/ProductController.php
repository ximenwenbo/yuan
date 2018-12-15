<?php
namespace app\home\controller;


use think\Controller;


class ProductController extends Controller
{
    public function index()
    {

        //获取联系方式
        $info = get_tel();

        $this->assign('info',$info);

        $in = 'appDesign';
        $this->assign('in',$in);



        return $this->fetch();

    }




}


















