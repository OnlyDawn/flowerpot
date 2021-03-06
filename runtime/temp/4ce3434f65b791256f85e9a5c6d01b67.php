<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\work\flowerpot\public/../application/admin\view\goods\add.html";i:1544019920;}*/ ?>
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
    <form class="layui-form" action="/admin/goods/add" method="post" enctype="multipart/form-data">
        <div class="layui-tab" style="margin: 0;">
            <ul class="layui-tab-title">
            </ul>
            <div class="layui-tab-content">
                <div class="layui-tab-item"></div>
                <div class="layui-tab-item layui-show">
                    <div class="layui-form-item">
                        <label class="layui-form-label">商品名称 ：</label>
                        <div class="layui-input-block">
                            <input type="text" name="name" required lay-verify="required" placeholder="请输入商品名称" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">商品：</label>
                        <div class="layui-input-block">
                            <select name="category_id" lay-verify="required">
                                <option value="">请选择分类栏目</option>
                                <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $data['id']; ?>"><?php echo $data['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">图像上传：</label>
                        <div class="layui-upload">
                            <input type="file" name="image" accept="image/*" required lay-verify="require|file" id="">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">商品内容：</label>
                        <div class="layui-input-block">
                            <textarea id="LAY_demo_editor" name="content"  style="display: none;"></textarea>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">商品排序：</label>
                        <div class="layui-input-block">
                            <input type="text" name="sort" required lay-verify="required|number" placeholder="请输入数字" autocomplete="off" class="layui-input" value="">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">商品链接：</label>
                        <div class="layui-input-block">
                            <input type="text" name="url" required lay-verify="required|url" placeholder="请输入商品url" autocomplete="off" class="layui-input" value="">
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

<script src="/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>

</body>

</html>
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