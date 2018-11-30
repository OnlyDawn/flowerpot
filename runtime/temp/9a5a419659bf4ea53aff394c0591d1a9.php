<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\work\flowerpot\public/../application/admin\view\carousel\index.html";i:1543512234;}*/ ?>
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
				<button class="layui-btn layui-btn-small layui-btn-normal" onclick="add()"><i class="layui-icon">&#xe654;</i>添加</button>
				<div class="layui-form" id="table-list">
						<table class="layui-table" lay-even lay-skin="nob">
							<thead>
								<tr>
									<th>ID</th>
									<th>标题</th>
									<th>图片</th>
									<th>排序</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
							<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carousel): $mod = ($i % 2 );++$i;?>
							<tr>
								<td class="hidden-xs"><?php echo $carousel['id']; ?></td>
								<td class="hidden-xs"><?php echo $carousel['title']; ?></td>
								<td class="hidden-xs"><img src="http://www.flowerpot.com\\<?php echo $carousel['image']; ?>" alt="" width="200px"></td>
								<td class="hidden-xs"><?php echo $carousel['sort']; ?></td>
								<td>
									<div class="layui-inline">
										<button class="layui-btn layui-btn-small layui-btn-normal go-btn" data-id="1" onclick="update(<?php echo $carousel['id']; ?>)"><i class="layui-icon">&#xe642;</i></button>
										<button class="layui-btn layui-btn-small layui-btn-danger del-btn" data-id="1"  onclick="is_delete(<?php echo $carousel['id']; ?>)"><i class="layui-icon">&#xe640;</i></button>
									</div>
								</td>
							</tr>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							</tbody>
						</table>
						<div class="page-wrap">
							<?php echo $page; ?>
						</div>
					</div>
				</div>
		</div>
		<script src="http://www.flowerpot.com\/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
		<script src="http://www.flowerpot.com\/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
	</body>

</html>
<script>
	function add()
	{
        window.location.href='/index.php/admin/carousel/add';
    }
    function update(id)
	{
        window.location.href='/index.php/admin/carousel/update?id='+id;
    }
    function is_delete(id){
        layer.confirm('确定要删除吗？', {
            btn: ['确定', '取消'] //可以无限个按钮
        }, function(index, layero){
            window.location.href='/index.php/admin/carousel/delete?id='+id;
        }, function(index){
            //按钮【按钮二】的回调
        });
	}
</script>