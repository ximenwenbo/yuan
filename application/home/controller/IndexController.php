<?php
namespace app\home\controller;


use think\Controller;
use app\home\model\Tel;

class IndexController extends Controller
{
    public function index()
    {

        //获取联系方式
       $info = get_tel();

         $this->assign('info',$info);





        return $this->fetch();

    }




}


















