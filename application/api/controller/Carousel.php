<?php

namespace app\api\controller;

use \think\Controller;
use \think\Db;

use app\api\model\ErrorCode;

/*
 * 轮播图
 */
class Carousel extends Controller
{
    /*
     * 轮播图数据
     */
    public function Data()
    {
        $return = ['code'=>0,'message'=>'','data'=>null];

        $CarouselData = Db::name('carousel')->order('sort desc')->select();

        if($CarouselData) {
            $return['data'] = $CarouselData;
        }else{
            $return['code'] = ErrorCode::$categoryError;
            $return['message'] = '获取分类数据失败';
        }
        return $return;
    }
}