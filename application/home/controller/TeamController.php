<?php
namespace app\home\controller;


use think\Controller;

use app\home\model\Team;

class TeamController extends Controller
{
    public function index()
    {

        //获取联系方式
        $info = get_tel();

        $this->assign('info',$info);

        $teams = Team::select();

        $this->assign('teams',$teams);





        return $this->fetch();

    }




}


















