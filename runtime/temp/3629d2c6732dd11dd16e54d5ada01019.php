<?php /*a:4:{s:91:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\admin\admin-role-list.html";i:1563520906;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\base.html";i:1563238307;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\meta.html";i:1563238307;s:83:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\footer.html";i:1563330416;}*/ ?>
<!--引入html顶部meta和引用的css...-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--<link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />-->
    <link rel="icon" href="/public/xiaofuwu.ico" type="img/x-ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/public/static/admin/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/public/static/admin/lib/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/public/static/admin/static/h-ui.admin/css/style.css" />
    <link href="/public/static/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
    <link href="/public/static/admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
    <link href="/public/static/admin/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />
    <link href="/public/static/admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/public/static/admin/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
    <link href="/public/static/admin/lib/lightbox2/2.8.1/css/lightbox.css" rel="stylesheet" type="text/css" >

    <!--layui的样式-->
    <!--<link rel="stylesheet" type="text/css" href="/public/static/admin/layui-admin/static/admin/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="/public/static/admin/layui-admin/static/admin/css/admin.css" />-->

    <style>
        /*分页*/
        .paginations {}
        .paginations li {display: inline-block;margin-right: -1px;padding: 5px;border: 1px solid #e2e2e2;min-width: 20px;text-align: center;}
        .paginations li.active {background: #009688;color: #fff;border: 1px solid #009688;}
        .paginations li a {display: block;text-align: center;}
    </style>

    <!--[if IE 6]>
    <script type="text/javascript" src="/public/static/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->


<!--设置title-->

<title><?php echo htmlentities((isset($title) && ($title !== '')?$title:'页面标题')); ?></title>

</head>
<body>

<!--定义头部模块 并且默认引入头部-->



<!--定义左侧菜单栏 并且默认引入菜单-->



<!--定义此页面需要展示的内容模块-->

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_role_add('添加角色','<?php echo url("admin/Admin/addRole"); ?>','1200','600')"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> <span class="r">共有数据：<strong><?php echo htmlentities(count($roles)); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">角色管理</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th width="200">角色名</th>
				<th>管理列表</th>
				<th width="300">描述</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($roles) || $roles instanceof \think\Collection || $roles instanceof \think\Paginator): $i = 0; $__LIST__ = $roles;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="" name=""></td>
				<td><?php echo htmlentities($item['id']); ?></td>
				<td><?php echo htmlentities($item['name']); ?></td>
				<td>
					<?php if(!(empty($item['admins']) || (($item['admins'] instanceof \think\Collection || $item['admins'] instanceof \think\Paginator ) && $item['admins']->isEmpty()))): if(is_array($item['admins']) || $item['admins'] instanceof \think\Collection || $item['admins'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['admins'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admin): $mod = ($i % 2 );++$i;?>
							<?php echo htmlentities($admin['admin_user_name']); ?>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					<?php endif; ?>
				</td>
				<td><?php echo htmlentities($item['description']); ?></td>
				<td class="f-14"><a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','<?php echo url("admin/Admin/editRole"); ?>','<?php echo htmlentities($item["id"]); ?>')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_role_del(this,'<?php echo htmlentities($item["id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
</div>


<!--引入底部js的引用-->
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/public/static/admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/public/static/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/public/static/admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/public/static/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<script type="text/javascript" src="/public/static/admin/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>


<script type="text/javascript" src="/public/static/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/public/static/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/public/static/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/public/static/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>


<script type="text/javascript" src="/public/static/admin/lib/webuploader/0.1.5/webuploader.min.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="/public/static/admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/lightbox2/2.8.1/js/lightbox.min.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="/public/static/admin/lib/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>

<script type="text/javascript" src="/public/static/admin/lib/hcharts/Highcharts/5.0.6/js/highcharts-3d.js"></script>


<!--&lt;!&ndash;layUI的js&ndash;&gt;-->
<!--<script src="/public/static/admin/layui-admin/static/admin/layui/layui.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script src="/public/static/admin/layui-admin/static/admin/js/common.js" type="text/javascript" charset="utf-8"></script>-->



<!--禁用分页插件-->
<script type="text/javascript" src="/public/static/admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/public/static/admin/lib/laypage/1.2/laypage.js"></script>

<!--定义页面js模块代码-->

<script type="text/javascript">
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
    w = 1200;
    url = url + "?roleId="+id;
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
    if(id == 1){
        alert("超级管理员角色禁止删除！");
        return;
	}
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
			type: 'GET',
			url: "<?php echo url('admin/Admin/delRole'); ?>"+"?roleId="+id,
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>


</body>
</html>