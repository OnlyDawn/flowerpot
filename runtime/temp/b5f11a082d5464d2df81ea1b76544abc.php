<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\work\flowerpot\public/../application/admin\view\category\index.html";i:1543755579;}*/ ?>
<!DOCTYPE html>
<html class="iframe-h">

<head>
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title>花盆网</title>
    <link rel="stylesheet" type="text/css" href="/static/admin/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/static/admin/css/admin.css" />
</head>

<body>
<div class="wrap-container clearfix">
    <div class="column-content-detail">
        <!--<button class="layui-btn layui-btn-small layui-btn-normal addBtn hidden-xs" data-url="/admin/category/add"><i class="layui-icon">&#xe654;</i>添加</button>-->
        <button class="layui-btn layui-btn-small layui-btn-normal " onclick="add()"><i class="layui-icon">&#xe654;</i>添加</button>

        <div class="layui-form" id="table-list">
            <table class="layui-table" lay-even lay-skin="nob">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名称</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$category): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td class="hidden-xs"><?php echo $category['id']; ?></td>
                    <td class="hidden-xs"><?php echo $category['name']; ?></td>
                    <td>
                        <div class="layui-inline">
                            <button class="layui-btn layui-btn-small layui-btn-normal" data-id="1" onclick="update(<?php echo $category['id']; ?>,'<?php echo $category['name']; ?>')"><i class="layui-icon">&#xe642;</i></button>
                            <button class="layui-btn layui-btn-small layui-btn-danger" data-id="1"  onclick="is_delete(<?php echo $category['id']; ?>)"><i class="layui-icon">&#xe640;</i></button>
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

<div class="wrap-container" style="display: none">
    <form class="layui-form" action="/admin/category/add" method="post" style="width: 80%;padding-top: 20px;">
        <div class="layui-form-item">
            <label class="layui-form-label">名称：</label>
            <div class="layui-input-block">
                <input type="text" name="name" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">
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

<script src="/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>
<script src="/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>
</body>

</html>
<script>
    function add()
    {
        //页面层
        layer.open({
            type: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['420px', '240px'], //宽高
            content: '<div class="wrap-container" ">\n' +
            '    <form class="layui-form" action="/admin/category/add" method="post" style="width: 80%;padding-top: 20px;">\n' +
            '        <div class="layui-form-item">\n' +
            '            <label class="layui-form-label">名称：</label>\n' +
            '            <div class="layui-input-block">\n' +
            '                <input type="text" name="name" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">\n' +
            '            </div>\n' +
            '        </div>\n' +
            '\n' +
            '        <div class="layui-form-item">\n' +
            '            <div class="layui-input-block">\n' +
            '                <button class="layui-btn layui-btn-normal" onclick="submit" >立即提交</button>\n' +
            '                <button type="reset" class="layui-btn layui-btn-primary">重置</button>\n' +
            '            </div>\n' +
            '        </div>\n' +
            '    </form>\n' +
            '</div>'
        });
    }

    function update(id,name)
    {
        alert(name)
        //页面层
        layer.open({
            type: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['420px', '240px'], //宽高
            content: '<div class="wrap-container">\n' +
            '\t<form class="layui-form" action="/admin/category/update" method="post" style="width: 80%;padding-top: 20px;">\n' +
            '\t\t<input type="hidden" name="id" value="'+id+'">\n' +
            '\t\t<div class="layui-form-item">\n' +
            '\t\t\t<label class="layui-form-label">名称：</label>\n' +
            '\t\t\t<div class="layui-input-block">\n' +
            '\t\t\t\t<input type="text" name="name" value="'+name+'" required lay-verify="required" placeholder="请输入名称" autocomplete="off" class="layui-input">\n' +
            '\t\t\t</div>\n' +
            '\t\t</div>\n' +
            '\n' +
            '\t\t<div class="layui-form-item">\n' +
            '\t\t\t<div class="layui-input-block">\n' +
            '\t\t\t\t<button class="layui-btn layui-btn-normal" onclick="submit" >立即提交</button>\n' +
            '\t\t\t\t<button type="reset" class="layui-btn layui-btn-primary">重置</button>\n' +
            '\t\t\t</div>\n' +
            '\t\t</div>\n' +
            '\t</form>\n' +
            '</div>'
        });
    }

    // function update(id)
    // {
    //     window.location.href='/index.php/admin/category/update?id='+id;
    // }
    function is_delete(id){
        layer.confirm('确定要删除吗？', {
            btn: ['确定', '取消'] //可以无限个按钮
        }, function(index, layero){
            window.location.href='/index.php/admin/category/delete?id='+id;
        }, function(index){
            //按钮【按钮二】的回调
        });
    }
</script>