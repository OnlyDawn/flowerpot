<?php

namespace app\admin\controller;

use \think\Controller;

/*
 * 首页
 */
class Index extends Controller
{
    /*
     * 导航首页
     */
    public function Index()
    {
        return $this->fetch('index');
    }

    /*
     * 后台首页
     */
    public function Welcome()
    {
        return $this->fetch('welcome');
    }
}