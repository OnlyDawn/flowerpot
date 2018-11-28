<?php

namespace app\admin\model;

use \think\Controller;
use \think\Model;

/*
 * 文件上传
 */
class FileUpload extends Model
{
    /*
     * 本地上传
     */
    public function Upload($file)
    {
        $url = false;
        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                $url = $info->getSaveName();
            }else{
                // 上传失败获取错误信息
                $url = $file->getError();
            }
        }
        return $url;
    }

    /*
     * 检查文件类型是否为image/webp
     */
    public function CheckFileType($file)
    {
        $bool = false;
        if(isset($file) && isset($file['type'])){
            switch($file['type']){
                case 'image/jpg':
                    $bool = true;
                    break;
                case 'image/jpeg':
                    $bool = true;
                    break;
                case 'image/gif':
                    $bool = true;
                    break;
                case 'image/png':
                    $bool = true;
                    break;
            }
        }
        return $bool;
    }
}