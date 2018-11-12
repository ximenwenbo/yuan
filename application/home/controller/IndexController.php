<?php
namespace app\home\controller;


use app\admin\model\Shouye;
use think\Controller;
use app\home\model\Tel;
use app\home\model\Business;

class IndexController extends Controller
{
    public function index()
    {

        //获取联系方式
       $info = get_tel();

         $this->assign('info',$info);

        //获取公司业务信息
        $data = Business::select();
     $this->assign('data',$data);

     //获取公司文化信息
        $infos = Shouye::select()[0];
        $this->assign('infos',$infos);







        return $this->fetch();

    }




}


















