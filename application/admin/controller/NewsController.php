<?php
namespace app\admin\controller;


use app\admin\model\Tel;
use think\Controller;
use think\Request;
use think\Route;
use app\admin\model\News;
use think\Validate;
use think\Db;

class NewsController extends Controller
{

    //新闻列表
    public function index(){

        $info  = News::select();
        $this->assign('info',$info);

        return $this->fetch();

    }

    public function ind(Request $request)
    {
        //获得订单列表信息，传递给模板展示
        //制作分页数据
        $orderinfos = Order::with('user')
            ->order('order_id desc')
            ->paginate(6);



        //获得分页页码列表信息
        $pagelist = $orderinfos->render();

        $this -> assign('orderinfos',$orderinfos);
        $this -> assign('pagelist',$pagelist);

        return $this -> fetch();
    }
    //添加新闻

    public function tianjia(Request $request){
        if ($request->isPost()){
            //对form表单收集的数据实现校验
            //① 制作验证规则
            $rules = [
                //'表单域name的名称'=>规则,
                //被校验信息 必填，并且News表中title字段没有出现过被验证的内容信息,长度不小于2个字符
                'title'    => 'require|unique:News|min:2',


                //作者必填
                'author'   => 'require',
                //内容必填
                'content'  => 'require',
                 //新闻关键字
                'keywords' => 'require'
             ];

            //② 制作验证的错误提示信息
            $notices = [
                //表单域name的名称.规则 => 具体错误提示,
                'title'    =>  '标题必须填写且长度不能小于两个字符',
                'author'     =>  '作者名称必填',
                'content'        =>  '新闻内容必填',
                'keywords'   =>  '关键字必填',

            ];

            //③ 实例化Validate类对象
            $validate = new Validate($rules,$notices);
          $data = $request->post();
            if($validate ->batch()-> check($data)){
                $news = new News();
                //添加入库
                $rst = $news->save($data);

                if ($rst){
                    return ['status'=>'success'];
                }else{
                    return ['status'=>'failure'];
                }

            }else{
                //验证失败
                //获得验证的错误信息
                $errorinfo = $validate->getError();
                //dump($errorinfo);  //一维数组方式返回全部校验错误信息 [goods_name=>xx,goods_price=>yy]
                $errorinfo = implode(',',$errorinfo); //把错误信息由Array变为,号分隔的字符串String
                //xx,yy,zz 等错误提示
                //传递错误信息给客户端显示
                return ['status'=>'failure','errorinfo'=>$errorinfo];
            }

        }else{
            return $this->fetch();
        }
    }


    public function xiugai(Request $request,News $news){
        if ($request->isPost()){

            $data = $request->post();
            $result = $news->update($data);
            if ($result){
                return ['status'=>'success'];
            }else{
                return ['status'=>'shi'];
            }

        }else{
            $this->assign('info',$news);
            return $this->fetch();

        }

    }

    public function shanchu(News $news){
        //逻辑删除 假删除
        $rst = $news->delete();

        if ($rst){
            return ['status'=>'success'];
        }else{
            return ['status'=>'failure'];
        }

    }


    public function delsel($ids){

        $news = new News();
        $rst = $news->where('id','in',$ids)->delete();

        if ($rst){
            return ['info'=>1];
        }else{
            return ['info'=>0];

        }

    }







}


















