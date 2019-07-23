<?php /*a:4:{s:86:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\admin\admin-list.html";i:1563436549;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\base.html";i:1563238307;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\meta.html";i:1563238307;s:83:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\footer.html";i:1563330416;}*/ ?>
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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker()" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker()" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" id="" name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜管理员用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="admin_add('添加管理员','<?php echo url("admin/admin/addAdmin"); ?>','1200','600')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong><?php echo htmlentities(count($adminUsers)); ?></strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg table-sort">
		<thead>
			<tr>
				<th scope="col" colspan="12">管理员列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="100">姓名</th>
				<th width="90">手机</th>
				<th width="100">登录次数</th>
				<th width="100">最后登录IP</th>
				<th width="150">最后登录时间</th>
				<th width="100">身份</th>
				<th width="200">角色</th>
				<th width="130">加入时间</th>
				<th width="100">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($adminUsers) || $adminUsers instanceof \think\Collection || $adminUsers instanceof \think\Paginator): $i = 0; $__LIST__ = $adminUsers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo htmlentities($user['admin_id']); ?>" name=""></td>
				<td><?php echo htmlentities($user['admin_id']); ?></td>
				<td><?php echo htmlentities($user['admin_user_name']); ?></td>
				<td><?php echo htmlentities($user['admin_phone']); ?></td>
				<td><?php echo htmlentities($user['admin_login_count']); ?></td>
				<td><?php echo htmlentities($user['admin_last_ip']); ?></td>
				<td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($user['admin_last_time'])? strtotime($user['admin_last_time']) : $user['admin_last_time'])); ?></td>
				<td>
					<?php if($user['admin_module'] == 'superadmin'): ?>超级管理员
						<?php else: ?>管理员
					<?php endif; ?>
				</td>
				<td>
					<?php if(is_array($user['roles']) || $user['roles'] instanceof \think\Collection || $user['roles'] instanceof \think\Paginator): $i = 0; $__LIST__ = $user['roles'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$role): $mod = ($i % 2 );++$i;?>
						<?php echo htmlentities($role['name']); ?>&nbsp;&nbsp;
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</td>
				<td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($user['admin_create_time'])? strtotime($user['admin_create_time']) : $user['admin_create_time'])); ?></td>
				<?php if($user['admin_status'] == 1): ?>
					<td class="td-status"><span class="label label-success radius">已启用</span></td>
					<td class="td-manage"><a style="text-decoration:none" onClick="admin_stop(this,<?php echo htmlentities($user["admin_id"]); ?>)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo url("admin/admin/editAdmin"); ?>','<?php echo htmlentities($user["admin_id"]); ?>','1200','600')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','<?php echo url("admin/admin/changepw"); ?>','<?php echo htmlentities($user["admin_id"]); ?>','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>  <a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo htmlentities($user["admin_id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				<?php endif; if($user['admin_status'] == 0): ?>
					<td class="td-status"><span class="label label-default radius">已停用</span></td>
					<td class="td-manage"><a style="text-decoration:none" onClick="admin_start(this,<?php echo htmlentities($user["admin_id"]); ?>)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a> <a title="编辑" href="javascript:;" onclick="admin_edit('管理员编辑','<?php echo url("admin/admin/editAdmin"); ?>','<?php echo htmlentities($user["admin_id"]); ?>','1200','600')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a><a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','<?php echo url("admin/admin/changepw"); ?>','<?php echo htmlentities($user["admin_id"]); ?>','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>  <a title="删除" href="javascript:;" onclick="admin_del(this,'<?php echo htmlentities($user["admin_id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				<?php endif; ?>
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
    /*分页*/
        $(".table-sort").dataTable({
            // 这里写一些基本配置，例如：
            "paging": true,    // 是否开启分页功能(默认开启)
            "info": true,      // 是否显示分页的统计信息(默认开启)
            "searching": true,  // 是否开启搜索功能(默认开启)
            "ordering": true,  // 是否开启排序功能(默认开启)
            "order": [[1, 'asc']], // 设置默认排序的表格列[参数1是表格列的下标，从0开始]
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[0,2,3,4,5,6,7,8,9,10,11]}// 制定列不参与排序
            ]
        });
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}

/*密码-修改*/
function change_password(title,url,id,w,h){
    url = url +"?adminId="+id;
    layer_show(title,url,w,h);
}

/*管理员-删除*/
function admin_del(obj,id){
	layer.confirm('确认要删除吗？提醒：删除后将会无法登陆后台管理,并销毁所有权限！',function(index){
		$.ajax({
			type: 'GET',
			url: "<?php echo url('admin/admin/delAdmin'); ?>"+"?adminId="+id,
			dataType: 'json',
			success: function(data){
                $(obj).parents("tr").remove();
                layer.msg('已删除!', {icon: 1, time: 1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
    url = url+"?adminId="+id;
    layer_show(title,url,w,h);
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？提醒：停用会造成管理员下次登录不上,并且会立即终止他的一切权限',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
        $.ajax({
            type: 'GET',
            url: "<?php echo url('admin/admin/stopAdmin'); ?>"+"?adminId="+id,
            dataType: 'json',
            success: function (data) {
                if(data.code == 2000){
                    $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已停用</span>');
                    $(obj).remove();
                    layer.msg('已停用!',{icon: 5,time:1000});
                }else {
                    layer.msg('停用失败!', {icon: 2, time: 1000});
                }

            },
        });
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？提醒：会立即启用他的一切权限',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
        $.ajax({
            type: 'GET',
            url: "<?php echo url('admin/Admin/startAdmin'); ?>"+"?adminId="+id,
            dataType: 'json',
            success: function (data) {
                $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                $(obj).remove();
                layer.msg('已启用!', {icon: 6,time:1000});
            },
            error: function (data) {
                layer.msg('启用失败!', {icon: 2, time: 1000});
            },
        });
	});
}

/*管理员删除的恢复*/
function admin_huifu(obj,id){
    layer.confirm('确认要恢复吗？提醒：恢复管理员登陆，并且会立即恢复他的一切权限！',function(index){
        //此处请求后台程序，下方是成功后的前台处理……
        $.ajax({
            type: 'GET',
            url: "<?php echo url('admin/admin/recoverAdmin'); ?>"+"?adminId="+id,
            dataType: 'json',
            success: function (data) {
                if(data.code == 2000){
                    layer.msg('已恢复!',{icon: 6,time:1000});
                    location.reload(); //刷新页面
                }else {
                    layer.msg('恢复失败!', {icon: 2, time: 1000});
                }

            },
        });
    });
}


</script>


</body>
</html>