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
        $captcha = input('verify');
        if(!captcha_check($captcha)){
            //验证码错误
        }else{
            //验证码正确
        }
    }
}