<?php

namespace app\admin\controller;

use \think\Controller;
use \think\Cookie;

class Common extends Controller
{
    public function _initialize()
    {
        if(!Cookie::has('name')){
            echo "<script>alert('您还没有登录，请先登录');location.href='/admin/login/sign'</script>";
        }
    }
}