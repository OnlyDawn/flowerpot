<?php

namespace app\admin\controller;

use \think\Controller;
use \think\Request;
use \think\Db;
use app\admin\model\FileUpload;

/*
 * 商品
 */
class Goods extends Controller
{
    /*
     * 列表
     */
    public function Index()
    {
        $list = Db::name('goods')
            ->alias('g')
            ->field('g.*,c.name as categoryName')
            ->join('fp_category c','g.category_id=c.id')
            ->order('g.id desc')->paginate(10);
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
        if(Request::instance()->isPost()){
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
                $name = input('post.name');
                $category_id = input('post.category_id');
                $content = input('post.content');
                $url = input('post.url');
                $sort = input('post.sort');
                $data = [
                    'name' => $name,
                    'image' => 'uploads\\'.$image,
                    'category_id' => $category_id,
                    'content' => $content,
                    'url' => $url,
                    'sort' => $sort,
                    'ctime' => time()
                ];
                $insert = Db::name('goods')->insert($data);
                if($insert){
                    $this->redirect('/admin/goods/index');
                }else{
                    $this->error('添加失败，请重新添加');
                }
            }else{
                $this->error('上传图片错误');
            }
        }else{
            $category = Db::name('category')->select();
            $this->assign('category',$category);
            return $this->fetch('add');
        }
    }

    /*
     * 修改
     */
    public function Update()
    {
        if(Request::instance()->isPost()){
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
                $id = input('post.id');
                $name = input('post.name');
                $category_id = input('post.category_id');
                $content = input('post.content');
                $url = input('post.url');
                $sort = input('post.sort');
                $data = [
                    'id' => $id,
                    'name' => $name,
                    'image' => 'uploads\\'.$image,
                    'category_id' => $category_id,
                    'content' => $content,
                    'url' => $url,
                    'sort' => $sort,
                    'ctime' => time()
                ];
                $update = Db::name('goods')->update($data);
                if($update){
                    $this->redirect('/admin/goods/index');
                }else{
                    $this->error('添加失败，请重新添加');
                }
            }else{
                $this->error('上传图片错误');
            }
        }else{
            $id = Request::instance()->get('id');
            if($id) {
                $goods = Db::name('goods')->find($id);
                if($goods) {
                    $category = Db::name('category')->select();
                    $this->assign('category', $category);
                    $this->assign('goods', $goods);
                    return $this->fetch('update');
                }else{
                    $this->error('请重新修改');
                }
            }else{
                $this->error('请重新修改');
            }
        }
    }

    /*
     * 删除
     */
    public function Delete()
    {
        $id = input('id');
        $findInfo = Db::name('goods')->find($id);
        if($findInfo) {
            //删除图片
            unlink(ROOT_PATH.'/public/'.$findInfo['image']);
            $delete = Db::name('goods')->delete($id);
            if($delete){
                $this->redirect('/admin/goods/index');
            }else{
                $this->error('请重新删除');
            }
        }else{
            $this->error('请重新删除');
        }
    }
}