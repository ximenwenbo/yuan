<?php
namespace app\admin\controller;


use app\admin\model\Tel;
use think\Controller;
use think\Request;

class AboutController extends Controller
{
    public function index()
    {



        return $this->fetch();

    }
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


                return   ['status'=>'success'];
            }else{
                return  ['status'=>'failure'];
            }

        }else{
            //依赖注入获取对象
            $this->assign('tel',$tel);

            //展示修改表单
            return $this->fetch();
        }



    }






}


















