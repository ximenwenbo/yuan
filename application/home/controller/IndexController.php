<?php
namespace app\home\controller;


use app\admin\model\Shouye;
use think\Controller;
use app\home\model\Tel;
use app\home\model\Business;
use app\admin\model\LunboOther;
use app\admin\model\LunboFirst;

class IndexController extends Controller
{
    public function index()
    {

//       $kehuduan = $_SERVER['REMOTE_ADDR']; //客户端IP，有可能是用户的IP，也可能是代理的IP。
//
//
//    $fuwuduan = $_SERVER['SERVER_ADDR'];  //获取服务器端IP
//        dump($kehuduan);
//        dump($fuwuduan);
//        exit;

        //获取联系方式
       $info = get_tel();

         $this->assign('info',$info);

        //获取公司业务信息
        $data = Business::select();
     $this->assign('data',$data);

     //获取公司文化信息
        $infos = Shouye::select()[0];
        $this->assign('infos',$infos);

        /**
         * @example 获取第一张轮播图
         *
         */

$first = LunboFirst::select()[0];


$this->assign('first',$first);
        /**
         * 获取banner图(除第一张)
         */
        $other = LunboOther::where('is_use','=',1)->select();

       $second  =  $other[0]['img_path'];
       $third   = $other[1]['img_path'];
      $this->assign('second',$second);
      $this->assign('third',$third);
        $this->assign('other',$other);






        return $this->fetch();

    }




}


















