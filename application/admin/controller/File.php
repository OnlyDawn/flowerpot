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
        $file = request()->file('file');
        if($file) {
            $FileUpload = new FileUpload();
            $upload = $FileUpload->Upload($file);
            if($upload){
                $return = ['code'=>0,'msg'=>'','data'=>[]];
                $data = [];
                $data['src'] = '/uploads/'.$upload;
                $return['data'] = $data;
            }else{
                $return['code'] = 'error';
            }

            return json_encode($return);
        }
    }
}