<?php

namespace app\admin\controller;

use \think\Controller;
use app\admin\model\FileUpload;

/*
 * 文件上传
 */
class File extends Controller
{
    /*
     * 本地上传
     */
    public function Upload()
    {
        $file = request()->file('image');
        if($file) {
            $FileUpload = new FileUpload();
            $upload = $FileUpload->Upload($file);
            return json_encode($upload);
        }
    }
}