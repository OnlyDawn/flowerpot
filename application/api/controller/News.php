<?php

namespace app\api\controller;

use \think\Controller;
use \think\Db;

/*
 * 新闻资讯
 */
class News extends Controller
{
    /*
     * 列表数据
     */
    public function DataList()
    {
        $return =['code'=>0,'message'=>'','data'=>null];

        $paginate = input('page_num');
        if(!$paginate){
            $paginate = 20;
        }

        $data = Db::name('news')
            ->paginate((int)$paginate);

        $return['data'] = $data;
        return $return;
    }

    /*
     * 资讯详情
     */
    public function NewsFind()
    {
        $return = ['code'=>0,'message'=>'','data'=>null];

        $id = input('id');

        if(empty($id) || !isset($id)){
            $return['code'] = ErrorCode::$dataDefectError;
            $return['message'] = '参数缺失';
            return $return;
        }
        $newsInfo = Db::name('news')->find($id);

        $return['data'] = $newsInfo;
        return $return;
    }
}