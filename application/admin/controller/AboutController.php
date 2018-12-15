<?php
namespace app\admin\controller;


use app\admin\model\Tel;
use think\cache\driver\Redis;
use think\Controller;
use think\Request;
use think\Route;
use app\admin\model\Shouye;

class AboutController extends Controller
{

    public function tel(){

        //获取信息
        $infos = Tel::select();






          $count  = count($infos);




        $this->assign('infos',$infos);
        $this->assign('count',$count);
 

        return $this->fetch();

    }

    public function xiugai(Request $request,tel $tel){


        if ($request->isPost()){

            $data = $request->post();
           //做更新操作
            $rst = $tel->update($data);  //返回修改记录条数
            if($rst){


                return   ['info'=>1];
            }else{
                return  ['info'=>0];
            }

        }else{
            //依赖注入获取对象
            $this->assign('tel',$tel);

            //展示修改表单
            return $this->fetch();
        }



    }

    //前台首页两个模块
    public function shouye(){
        return $this->fetch();
    }


    //首页公司文化和公司业务编辑
    public function edit(Request $request){
        $data = $request->post();
        $shouye = new shouye();

        $rst = $shouye->update($data);

        if($rst){


            return   ['status'=>'success'];
        }else{
            return  ['status'=>'failure'];
        }






    }


    public function index(){

          $infos = Shouye::select();
          $info = $infos[0];


          $this->assign('info',$info);

          return $this->fetch();

    }



}


















