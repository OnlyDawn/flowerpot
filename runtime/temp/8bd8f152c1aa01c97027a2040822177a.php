<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\work\flowerpot\public/../application/admin\view\login\login.html";i:1543354123;}*/ ?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>后台登录</title>
		<link rel="stylesheet" type="text/css" href="http://www.flowerpot.com\/static/admin/layui/css/layui.css" />
		<link rel="stylesheet" type="text/css" href="http://www.flowerpot.com\/static/admin/css/login.css" />
	</head>

	<body>
		<div class="m-login-bg">
			<div class="m-login">
				<h3>花盆网登录</h3>
				<div class="m-login-warp">
					<form class="layui-form" method="post" action="/index.php/admin/login/verify">
						<div class="layui-form-item">
							<input type="text" name="title" required lay-verify="required" placeholder="用户名" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-form-item">
							<input type="password" name="password" required lay-verify="required" placeholder="密码" autocomplete="off" class="layui-input">
						</div>
						<div class="layui-form-item">
							<div class="layui-inline">
								<input type="text" name="verity" required lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
							</div>
							<div class="layui-inline">
								<div><img id="verify_img" src="<?php echo captcha_src(); ?>" width="155px" alt="captcha" onclick="refreshVerify()" /></div>
							</div>
						</div>
						<div class="layui-form-item m-login-btn">
							<div class="layui-inline">
								<button class="layui-btn layui-btn-normal" lay-submit lay-filter="login">登录</button>
							</div>
							<div class="layui-inline">
								<button type="reset" class="layui-btn layui-btn-primary">取消</button>
							</div>
						</div>
					</form>
				</div>
				<p class="copyright">Copyright 2015-2016 by XIAODU</p>
			</div>
		</div>
		<script src="http://www.flowerpot.com\/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>

		<!-----验证码刷新---->
		<script>
            function refreshVerify() {
                var ts = Date.parse(new Date())/1000;
                var img = document.getElementById('verify_img');
                img.src = "/index.php/captcha?id="+ts;
            }
		</script>
		<!--<script>-->
			<!--layui.use(['form', 'layedit', 'laydate'], function() {-->
				<!--var form = layui.form(),-->
					<!--layer = layui.layer;-->


				<!--//自定义验证规则-->
				<!--// form.verify({-->
				<!--// 	title: function(value) {-->
				<!--// 		if(value.length < 5) {-->
				<!--// 			return '标题至少得5个字符啊';-->
				<!--// 		}-->
				<!--// 	},-->
				<!--// 	password: [/(.+){6,12}$/, '密码必须6到12位'],-->
				<!--// 	verity: [/(.+){6}$/, '验证码必须是6位'],-->
				<!--//-->
				<!--// });-->


				<!--//监听提交-->
				<!--form.on('submit(login)', function(data) {-->
					<!--// layer.alert(JSON.stringify(data.field), {-->
					<!--// 	title: '最终的提交信息'-->
					<!--// })-->
					<!--// return false;-->
				<!--});-->

			<!--});-->
		<!--</script>-->
	</body>

</html>