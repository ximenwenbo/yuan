<?php
namespace  app\home\model;

use think\Model;


class News extends model{



    //控制器方法依赖注入执行的地方
    public static function invoke(\think\Request $request)
    {
        $id = $request->param('id');
        return self::find($id);
    }

}