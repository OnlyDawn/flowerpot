<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\work\flowerpot\public/../application/admin\view\carousel\add.html";i:1543593131;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="renderer" content="webkit">
  		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>花盆网</title>
		<link rel="stylesheet" type="text/css" href="http://www.flowerpot.com\/static/admin/layui/css/layui.css"/>
		<link rel="stylesheet" type="text/css" href="http://www.flowerpot.com\/static/admin/css/admin.css"/>
	</head>
	<body>
	<form class="layui-form column-content-detail" action="/index.php/admin/carousel/add" enctype="multipart/form-data" method="post">
	<!--<form class="layui-form column-content-detail" action="/index.php/admin/file/upload" enctype="multipart/form-data" method="post">-->
					<div class="layui-tab">
						<div class="layui-tab-content">
							<div class="layui-tab-item layui-show">
								<div class="layui-form-item">
									<label class="layui-form-label">标题：</label>
									<div class="layui-input-block">
										<input type="text" name="title" required lay-verify="required" placeholder="请输入轮播图标题" autocomplete="off" class="layui-input">
									</div>
								</div>

								<div class="layui-form-item">
									<label class="layui-form-label">图像上传：</label>
									<div class="layui-upload">
										<input type="file" name="image" accept="image/*" required lay-verify="require|file" id="">
									</div>
									<div class="layui-input-block">
										<input type="file" name="file（可随便定义）" class="layui-upload-file">
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">排序：</label>
									<div class="layui-input-block">
										<input type="text" name="sort" required lay-verify="required|number" placeholder="请输入数字" autocomplete="off" class="layui-input" value="">
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
	<script src="http://www.flowerpot.com\/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://www.flowerpot.com\/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
<script>
    layui.use('form', function(){
        var form = layui.form;

        //各种基于事件的操作，下面会有进一步介绍
    });
</script>