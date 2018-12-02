<?php

namespace app\admin\controller;

use \think\Controller;
use \think\Db;
use \think\Request;
use app\admin\model\FileUpload;

/*
 * 工程案例
 */
class ProjectCase extends Controller
{
    /*
     * 列表
     */
    public function Index()
    {
        $list = Db::name('project_case')
            ->order('id desc')->paginate(10);
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
                $data = [
                    'title' => $title,
                    'image' => 'uploads\\'.$image,
                    'sort' => $sort
                ];
                $insert = Db::name('project_case')->insert($data);
                if($insert){
                    $this->redirect('index.php/admin/project_case/index');
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
                //检查id是否存在
                $id = input('post.id');
                if($id){
                    $findInfo = Db::name('project_case')->find($id);
                    if($findInfo){
                        //删除之前的图片
                        unlink(ROOT_PATH.'/public/'.$findInfo['image']);
                    }
                }
                //修改
                $image = $fileUploadStr;
                $title = input('post.title');
                $sort = input('post.sort');
                $data = [
                    'id' => $id,
                    'title' => $title,
                    'image' => 'uploads\\'.$image,
                    'sort' => $sort
                ];
                $update = Db::name('project_case')->update($data);
                if($update){
                    $this->redirect('index.php/admin/project_case/index');
                }else{
                    $this->error('修改失败，请重新修改');
                }
            }else{
                $this->error('上传图片错误');
            }
        }else{
            $id = Request::instance()->get('id');
            if ($id) {
                $projectCaseInfo = Db::name('project_case')->where('id', $id)->find();
                $this->assign('data',$projectCaseInfo);
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
        $findInfo = Db::name('project_case')->find($id);
        if($findInfo) {
            //删除图片
            unlink(ROOT_PATH.'/public/'.$findInfo['image']);
            $delete = Db::name('project_case')->delete($id);
            if($delete){
                $this->redirect('index.php/admin/project_case/index');
            }else{
                $this->error('请重新删除');
            }
        }else{
            $this->error('请重新删除');
        }
    }
}