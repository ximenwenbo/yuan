<?php
namespace app\home\controller;


use app\home\model\ProductCategory;
use think\Controller;
use app\home\model\Product;
use think\Db;



class ProductController extends Controller
{
    public function index()
    {

        //获取联系方式
        $info = get_tel();

        $this->assign('info',$info);

            //获取产品分类列表
          $category  =   ProductCategory::select();
          $this->assign('category',$category);
         //获取产品列表
        $product = Product::select();



        $this->assign('product',$product);








        return $this->fetch();

    }




}


















