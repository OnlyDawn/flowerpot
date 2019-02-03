<?php

namespace app\api\controller;

use \think\Controller;
use \think\Db;

/*
 * 项目案例
 */
class ProjectCase extends Common
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

        $data = Db::name('project_case')
            ->order('sort desc')
            ->paginate((int)$paginate);

        $return['data'] = $data;
        return $return;
    }
}