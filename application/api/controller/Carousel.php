<?php

namespace app\api\controller;

use \think\Controller;
use \think\Db;

use app\api\model\ErrorCode;

/*
 * 轮播图
 */
class Carousel extends Common
{
    /*
     * 轮播图数据
     */
    public function Data()
    {
        $return = ['code'=>0,'message'=>'','data'=>null];

        $type = input('type');
        if($type=='web'){
            $type = 1;
        }else{
            $type = 2;
        }

        $CarouselData = Db::name('carousel')->field("id,title,image,sort")->where(['type'=>$type])->order('sort desc')->select();

        if($CarouselData) {
            $return['data'] = $CarouselData;
        }else{
            $return['code'] = ErrorCode::$categoryError;
            $return['message'] = '获取分类数据失败';
        }
        return $return;
    }
}