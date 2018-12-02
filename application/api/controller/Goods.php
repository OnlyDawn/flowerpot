<?php

namespace app\api\controller;

use \think\Controller;
use \think\Db;

use app\api\model\ErrorCode;
use think\Request;

/*
 * 商品
 */
class Goods extends Controller
{
    /*
     * 列表数据
     */
    public function DataList()
    {
        $return = ['code'=>0,'message'=>'','data'=>null];

        //每页显示条数
        $pageNum = input('get.page_num');
        if(!$pageNum){
            $pageNum = 20;
        }

        $list = Db::name('goods')
            ->alias('g')
            ->field('g.*,c.name as categoryName')
            ->join('fp_category c','g.category_id=c.id')
            ->order('g.id desc')->paginate((int)$pageNum);

        $return['data'] = $list;
        return $return;
    }

    /*
     * 商品详情
     */
    public function GoodsFind()
    {
        $return = ['code'=>0,'message'=>'','data'=>null];

        $id = input('id');

        if(empty($id) || !isset($id)){
            $return['code'] = ErrorCode::$dataDefectError;
            $return['message'] = '参数缺失';
            return $return;
        }
        $goodsInfo = Db::name('goods')->find($id);

        $return['data'] = $goodsInfo;
        return $return;
    }
}