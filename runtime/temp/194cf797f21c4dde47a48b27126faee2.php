<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\work\flowerpot\public/../application/admin\view\index\index.html";i:1543405496;}*/ ?>
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
		<div class="main-layout" id='main-layout'>
			<!--侧边栏-->
			<div class="main-layout-side">
				<div class="m-logo">
				</div>
				<ul class="layui-nav layui-nav-tree" lay-filter="leftNav">
			      <li class="layui-nav-item">
					<a href="/index.php/admin/carousel/index"  target="iframe" data-id='4' data-text="轮播管理"><i class="iconfont">&#xe60c;</i>轮播管理</a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;" data-url="email.html" data-id='4' data-text="商品管理"><i class="iconfont">&#xe602;</i>商品管理</a>
				  </li>
				  <li class="layui-nav-item">
				    <a href="javascript:;" data-url="email.html" data-id='4' data-text="新闻资讯"><i class="iconfont">&#xe605;</i>新闻资讯</a>
				  </li>
				  <li class="layui-nav-item">
					<a href="javascript:;" data-url="email.html" data-id='4' data-text="工程案例"><i class="iconfont">&#xe639;</i>工程案例</a>
				  </li>
				  <li class="layui-nav-item">
     		        <a href="javascript:;" data-url="email.html" data-id='4' data-text="分类管理"><i class="iconfont">&#xe604;</i>分类管理</a>
				  </li>
				</ul>
			</div>
			<!--右侧内容-->
			<div class="main-layout-container">
				<!--头部-->
				<div class="main-layout-header">
					<div class="menu-btn" id="hideBtn">
						<a href="javascript:;">
							<span class="iconfont">&#xe60e;</span>
						</a>
					</div>
					<ul class="layui-nav" lay-filter="rightNav">
					  <li class="layui-nav-item"><a href="javascript:;" data-url="email.html" data-id='4' data-text="邮件系统"><i class="iconfont">&#xe603;</i></a></li>
					  <li class="layui-nav-item">
					    <a href="javascript:;" data-url="admin-info.html" data-id='5' data-text="个人信息">超级管理员</a>
					  </li>
					  <li class="layui-nav-item"><a href="javascript:;">退出</a></li>
					</ul>
				</div>
				<!--主体内容-->
				<div class="main-layout-body">
					<!--tab 切换-->
					<div class="layui-tab layui-tab-brief main-layout-tab" lay-filter="tab" lay-allowClose="true">
					  <ul class="layui-tab-title">
					    <li class="layui-this welcome">后台主页</li>
					  </ul>
					  <div class="layui-tab-content">
					    <div class="layui-tab-item layui-show" style="background: #f5f5f5;">
					    	<!--1-->
					    	<iframe src="/index.php/admin/index/welcome" width="100%" height="100%" name="iframe" scrolling="auto" class="iframe" framborder="0"></iframe>
					    	<!--1end-->
					    </div>
					  </div>
					</div>
				</div>
			</div>
			<!--遮罩-->
			<div class="main-mask">
				
			</div>
		</div>
		<script type="text/javascript">
			var scope={
				link:'./welcome.html'
			}
		</script>
		<script src="http://www.flowerpot.com\/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://www.flowerpot.com\/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://www.flowerpot.com\/static/admin/js/main.js" type="text/javascript" charset="utf-8"></script>
		
	</body>
</html>
