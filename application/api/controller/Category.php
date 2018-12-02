<?php

namespace app\api\controller;

use \think\Controller;
use \think\Db;

use app\api\model\ErrorCode;

/*
 * 分类
 */
class Category extends Controller
{
    /*
     * 分类数据
     */
    public function Data()
    {
        $return = ['code'=>0,'message'=>'','data'=>null];

        $categoryData = Db::name('category')->select();


        if($categoryData) {
            $return['data'] = $categoryData;
        }else{
            $return['code'] = ErrorCode::$categoryError;
            $return['message'] = '获取分类数据失败';
        }
        return $return;
    }
}