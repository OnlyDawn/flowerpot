<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\work\flowerpot\public/../application/admin\view\news\add.html";i:1547043760;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>花盆网</title>
    <link rel="shortcut icon" href="/static/index.ico" />
    <link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/admin.css" />
</head>

<body>
<div class="page-content-wrap">
    <form class="layui-form" action="/admin/news/add" method="post">
        <div class="layui-tab" style="margin: 0;">
            <ul class="layui-tab-title">
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item"></div>
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">资讯标题 ：</label>
                        <div class="layui-input-block">
                            <input type="text" name="title" required lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">选择时间 ：</label>
                        <div class="layui-input-block">
                            <input type="text" name="time" class="layui-input" id="test1">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">作者 ：</label>
                        <div class="layui-input-block">
                            <input type="text" name="author" required lay-verify="required" value="花盆之家" placeholder="请输入作者" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章内容：</label>
                        <div class="layui-input-block">
                            <textarea id="LAY_demo_editor" name="content"  style="display: none;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="padding-left: 10px;">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-normal" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>
</div>

<script src="/static/admin/layui/laydate/laydate.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>

</body>

</html>
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#test1' //指定元素
    });
</script>
<script>
    layui.use(['form','layedit'], function(){
        var layedit = layui.layedit;
        var form = layui.form;

        layedit.set({
            uploadImage: {
                url: '/admin/file/upload' //接口url
                ,type: 'post' //默认post
            }
        });
        layedit.build('LAY_demo_editor'); //建立编辑器
    });
</script>
