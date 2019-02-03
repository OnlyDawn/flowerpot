<?php

namespace app\admin\controller;

use \think\Controller;
use \think\Db;
use \think\Request;

/*
 * 新闻资讯
 */
class News extends Common
{
    /*
     * 列表
     */
    public function Index()
    {
        $list = Db::name('news')
            ->order('id desc')->paginate(20);
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
            $data = input();
            if($data) {
                $data['ctime'] = !isset($data['time'])?strtotime($data['time']):time();
                unset($data['file'],$data['time']);
                $insert = Db::name('news')->insert($data);
                if ($insert) {
                    $this->redirect('/admin/news/index');
                } else {
                    $this->error('添加失败，请重新添加');
                }
            }else{
                $this->error('添加失败，请重新添加');
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
        if(Request::instance()->isPost()){
            $data = input();
            if($data) {
                $data['ctime'] = isset($data['time'])?strtotime($data['time']):time();
                unset($data['file'],$data['time']);
                unset($data['file']);
                $update = Db::name('news')->update($data);
                if ($update) {
                    $this->redirect('/admin/news/index');
                } else {
                    $this->error('修改失败，请重新修改');
                }
            }else{
                $this->error('修改失败，请重新修改');
            }
        }else{
            $id = Request::instance()->get('id');
            if($id) {
                $newsInfo = Db::name('news')->find($id);
                $newsInfo['ctime'] = date('Y-m-d',$newsInfo['ctime']);
                if($newsInfo) {
                    $this->assign('data',$newsInfo);
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
        if($id) {
            //删除图片
            $delete = Db::name('news')->delete($id);
            if($delete){
                $this->redirect('/admin/news/index');
            }else{
                $this->error('请重新删除');
            }
        }else{
            $this->error('请重新删除');
        }
    }
}