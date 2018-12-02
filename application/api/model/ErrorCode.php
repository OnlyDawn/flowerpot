<?php

namespace app\api\model;

use \think\Model;

/*
 * 接口错误码
 *********接口错误码***********
 * code        说明
 * 10000       获取分类数据失败
 * 90000        参数缺失
 */
class ErrorCode extends Model
{
    //分类
    public static $categoryError = '100000';

    public static $dataDefectError = '900000';
}