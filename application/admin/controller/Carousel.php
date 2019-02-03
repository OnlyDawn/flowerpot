<?php

namespace app\admin\controller;

use \think\Controller;
use \think\Request;
use \think\Db;

use app\admin\model\FileUpload;

/*
 * 轮播管理
 */
class Carousel extends Common
{
    /*
     * 列表
     */
    public function Index()
    {
        $list = Db::name('carousel')->order('id desc')->paginate(20);
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
            //检查文件格式
            $file = $_FILES['image'];
            $type = false;
            if($file){
                $FileUpload = new FileUpload();
                $type = $FileUpload->CheckFileType($file);
            }
            if(!$type){
                $this->error('图片格式错误');
            }

            //上传图片
            $file = request()->file('image');
            $fileUploadStr = $FileUpload->Upload($file);
            if($fileUploadStr && is_string($fileUploadStr)){
                //上传
                $image = $fileUploadStr;
                $title = input('post.title');
                $sort = input('post.sort');
                $type = input('post.type');
                $data = [
                    'title' => $title,
                    'image' => 'uploads\\'.$image,
                    'sort' => $sort,
                    'type' => $type
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
     * 修改
     */
    public function Update()
    {
        if (Request::instance()->isPost()) {
            //检查id是否存在
            $id = input('post.id');
            if(!$id){
                $this->error('修改失败，请重新修改');
            }
            //修改
            $title = input('post.title');
            $sort = input('post.sort');
            $type = input('post.type');

            //检查文件格式
            $file = $_FILES['image'];
            if(!empty($file['tmp_name'])){
                $FileUpload = new FileUpload();
                $file_type = $FileUpload->CheckFileType($file);
                if(!$file_type){
                    $this->error('图片格式错误');
                }
                //上传图片
                $file = request()->file('image');
                $fileUploadStr = $FileUpload->Upload($file);
                if($fileUploadStr && is_string($fileUploadStr)){
                    $findInfo = Db::name('carousel')->find($id);
                    if($findInfo){
                        //删除之前的图片
                        $local_file = ROOT_PATH.'/public/'.$findInfo['image'];
                        if(file_exists($local_file)){
                            unlink($local_file);
                        }
                    }
                    $data = [
                        'id' => $id,
                        'title' => $title,
                        'image' => 'uploads\\'.$fileUploadStr,
                        'sort' => $sort,
                        'type' => $type
                    ];
                }else{
                    $this->error('上传图片错误');
                }
            }else{
                //修改
                $title = input('post.title');
                $sort = input('post.sort');
                $type = input('post.type');
                $data = [
                    'id' => $id,
                    'title' => $title,
                    'sort' => $sort,
                    'type' => $type
                ];
            }

            $update = Db::name('carousel')->update($data);
            if($update){
                $this->redirect('index.php/admin/carousel/index');
            }else{
                $this->error('修改失败，请重新修改');
            }

        }else{
            $id = Request::instance()->get('id');
            if ($id) {
                $carouselInfo = Db::name('carousel')->where('id', $id)->find();
                $this->assign('data',$carouselInfo);
                return $this->fetch('update');
            }
        }
    }

    /*
     * 删除
     */
    public function Delete()
    {
        $id = Request::instance()->get('id');
        $findInfo = Db::name('carousel')->find($id);
        if($findInfo) {
            //删除图片
            $file = ROOT_PATH.'/public/'.$findInfo['image'];
            if(file_exists($file)){
                unlink($file);
            }
            $delete = Db::name('carousel')->delete($id);
            if($delete){
                $this->redirect('index.php/admin/carousel/index');
            }else{
                $this->error('请重新删除');
            }
        }else{
            $this->error('请重新删除');
        }
    }
}