<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"D:\work\flowerpot\public/../application/admin\view\category\update.html";i:1543590794;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title>花盆网</title>
	<link rel="stylesheet" type="text/css" href="http://www.flowerpot.com\/static/admin/layui/css/layui.css" />
	<link rel="stylesheet" type="text/css" href="http://www.flowerpot.com\/static/admin/css/admin.css" />
</head>
<body>
<div class="wrap-container">
	<form class="layui-form" action="/admin/category/update" method="post" style="width: 80%;padding-top: 20px;">
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
		<div class="layui-form-item">
			<label class="layui-form-label">名称：</label>
			<div class="layui-input-block">
				<input type="text" name="name" value="<?php echo $data['name']; ?>" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
			</div>
		</div>

		<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn layui-btn-normal" onclick="submit" >立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
			</div>
		</div>
	</form>
</div>

<script src="http://www.flowerpot.com\/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>

</body>

</html>