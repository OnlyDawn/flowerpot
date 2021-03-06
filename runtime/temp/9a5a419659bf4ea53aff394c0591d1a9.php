<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\work\flowerpot\public/../application/admin\view\carousel\index.html";i:1544344378;}*/ ?>
<!DOCTYPE html>
<html class="iframe-h">

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
<div class="wrap-container clearfix">
	<div class="column-content-detail">
		<button class="layui-btn layui-btn-small layui-btn-normal" onclick="add()"><i class="layui-icon">&#xe654;</i>添加</button>
		<div class="layui-form" id="table-list">
			<table class="layui-table" lay-even lay-skin="nob">
				<colgroup>
					<col width="50">
					<col width="50">
					<col class="hidden-xs" width="100">
					<col class="hidden-xs" width="150">
					<col width="80">
					<col width="150">
				</colgroup>
				<thead>
				<tr>
					<th class="hidden-xs">ID</th>
					<th>轮播名称</th>
					<th>图片</th>
					<th class="hidden-xs">排序</th>
					<th class="hidden-xs">位置</th>
					<th>操作</th>
				</tr>
				</thead>
				<tbody>
				<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$carousel): $mod = ($i % 2 );++$i;?>
				<tr>
					<td class="hidden-xs"><?php echo $carousel['id']; ?></td>
					<td><?php echo $carousel['title']; ?></td>
					<td><img src="\<?php echo $carousel['image']; ?>" alt="" width="200px"></td>
					<td class="hidden-xs"><?php echo $carousel['sort']; ?></td>
					<td class="hidden-xs">
						<?php if($carousel['type'] == 1): ?>web
						<?php else: ?>app
						<?php endif; ?>
					</td>
					<td>
						<div class="layui-inline">
							<button class="layui-btn layui-btn-small layui-btn-normal" data-id="1" onclick="update(<?php echo $carousel['id']; ?>)" ><i class="layui-icon">&#xe642;</i></button>
							<button class="layui-btn layui-btn-small layui-btn-danger" data-id="1"  onclick="is_delete(<?php echo $carousel['id']; ?>)"><i class="layui-icon">&#xe640;</i></button>
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
<script src="/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
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