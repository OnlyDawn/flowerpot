<?php

namespace app\admin\controller;

use \think\Controller;
use \think\Db;
use \think\Request;

/*
 * 分类
 */
class Category extends Controller
{
    /*
     *  列表
     */
    public function Index()
    {
        $list = Db::name('category')->order('id desc')->paginate(10);
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
            $name = input('name');
            if($name){
                $insert = Db::name('category')->insert(['name'=>$name]);
                if($insert){
                    $this->redirect('/admin/category/index');
                }else{
                    $this->error('请重新添加');
                }
            }
        }else {
            return $this->fetch('add');
        }
    }

    /*
     * 修改
     */
    public function Update()
    {
        if(Request::instance()->isPost()){
            $data = input();
            if($data) {
                $update = Db::name('category')->update($data);
                if($update){
                    return $this->redirect('/admin/category/index');
                }else{
                    $this->error('请重新修改');
                }
            }else{
                $this->error('请重新修改');
            }
        }else{
            $id = Request::instance()->get('id');
            $categoryInfo = Db::name('category')->find($id);
            $this->assign('data',$categoryInfo);
            return $this->fetch('update');
        }
    }

    /*
     * 删除
     */
    public function Delete()
    {
        $id = input('id');
        if($id){
            $delete = Db::name('category')->delete($id);
            if($delete){
                $this->redirect('/admin/category/index');
            }else{
                $this->error('请重新删除');
            }
        }else{
            $this->error('请重新删除');
        }
    }
}