<?php
namespace app\admin\controller;



use think\Controller;
use app\admin\model\Picture;
use think\Request;


class PictureController extends  Controller{

    public function index(){


        $infos = Picture::select();
        $this->assign('infos',$infos);



         return $this->fetch();



    }









}