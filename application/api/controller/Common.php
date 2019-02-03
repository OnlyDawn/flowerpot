<?php

namespace app\api\controller;

use \think\Controller;
use \think\Cookie;

class Common extends Controller
{
    public function _initialize()
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods:POST,GET");
        header("Access-Control-Allow-Headers:x-requested-with,content-type");
        header("Content-type:text/json;charset=utf-8");
    }
}