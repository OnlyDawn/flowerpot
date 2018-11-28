<?php

namespace app\admin\controller;

use \think\Controller;
use \think\Request;
use \think\Db;

use app\admin\model\FileUpload;

/*
 * 轮播管理
 */
class Carousel extends Controller
{
    /*
     * 列表
     */
    public function Index()
    {
        $list = Db::name('carousel')->paginate(20);
        $page = $list->render();
        $this->assign('list',$list);
        $this->assign('page',$page);
        return $this->fetch('index');
    }

    /*
     * 添加
     */
    public function Add()
    {
        if (Request::instance()->isPost()){
            $file = $_FILES['image'];
            $type = false;
            if($file){
                $FileUpload = new FileUpload();
                $type = $FileUpload->CheckFileType($file);
            }
            if(!$type){
                $this->error('图片格式错误');
            }
            $file = request()->file('image');
            $fileUploadStr = $FileUpload->Upload($file);
            if($fileUploadStr && is_string($fileUploadStr)){
                $image = $fileUploadStr;
                $title = input('post.title');
                $sort = input('post.sort');
                $data = [
                    'title' => $title,
                    'image' => 'uploads\\'.$image,
                    'sort' => $sort
                ];
                $insert = Db::name('carousel')->insert($data);
                if($insert){
                    $this->redirect('index.php/admin/carousel/index');
                }else{
                    $this->error('添加失败，请重新添加');
                }
            }else{
                $this->error('上传图片错误');
            }

        }else{
            return $this->fetch('add');
        }
    }

    /*
     * 删除
     */
    public function Delete()
    {

    }

    /*
     * 修改
     */
    public function Update()
    {

    }

}