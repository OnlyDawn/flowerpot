<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\work\flowerpot\public/../application/admin\view\carousel\index.html";i:1543405768;}*/ ?>
<!DOCTYPE html>
<html class="iframe-h">

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
		<div class="wrap-container clearfix">
				<div class="column-content-detail">
					<div class="layui-form" id="table-list">
						<table class="layui-table" lay-even lay-skin="nob">
							<colgroup>
								<col width="50">
								<col class="hidden-xs" width="50">
								<col class="hidden-xs" width="100">
								<col>
								<col class="hidden-xs" width="150">
								<col class="hidden-xs" width="150">
								<col width="80">
								<col width="150">
							</colgroup>
							<thead>
								<tr>
									<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose"></th>
									<th class="hidden-xs">ID</th>
									<th class="hidden-xs">排序</th>
									<th>名称</th>
									<th class="hidden-xs">创建时间</th>
									<th class="hidden-xs">修改时间</th>
									<th>状态</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td><input type="checkbox" name="" lay-skin="primary" data-id="1"></td>
									<td class="hidden-xs">1</td>
									<td class="hidden-xs"><input type="text" name="title" autocomplete="off" class="layui-input" value="0" data-id="1"></td>
									<td>玩具</td>
									<td class="hidden-xs">1989-10-14</td>
									<td class="hidden-xs">1989-10-14</td>
									<td><button class="layui-btn layui-btn-mini layui-btn-normal">正常</button></td>
									<td>
										<div class="layui-inline">
											<button class="layui-btn layui-btn-small layui-btn-normal go-btn" data-id="1" data-url="article-detail.html"><i class="layui-icon">&#xe642;</i></button>
											<button class="layui-btn layui-btn-small layui-btn-danger del-btn" data-id="1" data-url="article-detail.html"><i class="layui-icon">&#xe640;</i></button>
										</div>
									</td>
								</tr>
								<tr>
									<td><input type="checkbox" name="" lay-skin="primary" data-id="1"></td>
									<td class="hidden-xs">1</td>
									<td class="hidden-xs"><input type="text" name="title" autocomplete="off" class="layui-input" value="0" data-id="1"></td>
									<td>玩具</td>
									<td class="hidden-xs">1989-10-14</td>
									<td class="hidden-xs">1989-10-14</td>
									<td><button class="layui-btn layui-btn-mini layui-btn-normal">正常</button></td>
									<td>
										<div class="layui-inline">
											<button class="layui-btn layui-btn-small layui-btn-normal go-btn" data-id="1" data-url="article-detail.html"><i class="layui-icon">&#xe642;</i></button>
											<button class="layui-btn layui-btn-small layui-btn-danger del-btn" data-id="1" data-url="article-detail.html"><i class="layui-icon">&#xe640;</i></button>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<div class="page-wrap">
							<ul class="pagination">
								<li class="disabled"><span>«</span></li>
								<li class="active"><span>1</span></li>
								<li>
									<a href="#">2</a>
								</li>
								<li>
									<a href="#">»</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
		</div>
		<script src="http://www.flowerpot.com\/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://www.flowerpot.com\/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
	</body>

</html>