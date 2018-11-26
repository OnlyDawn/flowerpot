<?php
namespace app\admin\controller;

use \think\Controller;

class Login extends Controller
{
    public function Index()
    {
        echo 123;
    }

    /*
     * 登录页面
     */
    public function Sign()
    {
        return $this->fetch('login');
    }

    /*
     * 验证登录
     */
    public function verify()
    {
        return 1;
    }
}