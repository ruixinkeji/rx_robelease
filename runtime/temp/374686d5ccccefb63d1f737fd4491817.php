<?php /*a:4:{s:86:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\goods\goods-list.html";i:1563758202;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\base.html";i:1563238307;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\meta.html";i:1563238307;s:83:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\footer.html";i:1563330416;}*/ ?>
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

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 商品管理 <span class="c-gray en">&gt;</span> 商品列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="text-c"> 日期范围：
        <input type="text" onfocus="WdatePicker()" id="datemin" class="input-text Wdate" style="width:120px;">
        -
        <input type="text" onfocus="WdatePicker()" id="datemax" class="input-text Wdate" style="width:120px;">
        <input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜商品</button>
    </div>
    <div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除 </a> <a href="javascript:;" onclick="member_add('添加商品','<?php echo url("admin/Goods/add"); ?>','1200','600')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加商品 </a></span> <span class="r">共有数据：<strong><?php echo htmlentities(count($goods)); ?> </strong> 条</span> </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="25"><input type="checkbox" name="tag" value=""></th>
                <th width="40">ID</th>
                <th width="80">名称</th>
                <th width="">描述</th>
                <th width="30">现价</th>
                <th width="30">数量</th>
                <th width="50">租赁单位:(天)</th>
                <th width="80">封面</th>
                <th width="">图片</th>
                <th width="140">上架时间</th>
                <th width="100">分类</th>
                <th width="30">热门</th>
                <th width="30">状态</th>
                <th width="100">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($goods) || $goods instanceof \think\Collection || $goods instanceof \think\Paginator): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
            <tr class="text-c">
                <td><input type="checkbox" value="<?php echo htmlentities($item['goods_id']); ?>" name="tag"></td>
                <td><?php echo htmlentities($item['goods_id']); ?></td>
                <td><?php echo htmlentities($item['goods_name']); ?></td>
                <td>
                    <textarea readonly style="resize: none;"><?php echo htmlentities($item['goods_desc']); ?></textarea>
                </td>
                <td><?php echo htmlentities($item['goods_current_price']); ?></td>
                <td><?php echo htmlentities($item['goods_num']); ?></td>
                <td><?php echo htmlentities($item['goods_lease_time']); ?></td>
                <td>
                    <div class="picbox">
                        <a href="<?php echo htmlentities($item['goods_cover']); ?>" data-lightbox="gallery" data-title="图片">
                            <img width="50" height="50" src="<?php echo htmlentities($item['goods_cover']); ?>">
                        </a>
                    </div>
                </td>
                <td>
                    <div class="picbox">
                        <?php if(is_array($item['goods_img']) || $item['goods_img'] instanceof \think\Collection || $item['goods_img'] instanceof \think\Paginator): $i = 0; $__LIST__ = $item['goods_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$img): $mod = ($i % 2 );++$i;?>
                        <a href="<?php echo htmlentities($img); ?>" data-lightbox="gallery" data-title="图片">
                            <img width="50" height="50" src="<?php echo htmlentities($img); ?>">
                        </a>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </td>
                <td><?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($item['goods_create_time'])? strtotime($item['goods_create_time']) : $item['goods_create_time'])); ?></td>
                <td><?php echo htmlentities($item['category_name']); ?></td>
                <td>
                    <?php if(($item['goods_is_host'] == 1)): ?> <span style="color: red">是</span>
                        <?php else: ?> <span style="color: green">否</span>
                    <?php endif; ?>
                </td>
                    <?php if(($item['goods_status'] == 1)): ?>
                        <td class="td-status"><span class="label label-success radius">已上架</span></td>
                        <td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'<?php echo htmlentities($item["goods_id"]); ?>')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe631;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','<?php echo url("admin/Goods/edit"); ?>','<?php echo htmlentities($item["goods_id"]); ?>','1200','600')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo htmlentities($item["goods_id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    <?php elseif($item['goods_status'] == 0): ?>
                        <td class="td-status"><span class="label label-danger radius">已下架</span></td>
                        <td class="td-manage"><a style="text-decoration:none" onClick="member_start(this,'<?php echo htmlentities($item["goods_id"]); ?>')" href="javascript:;" title="上架"><i class="Hui-iconfont">&#xe6e1;</i></a> <a title="编辑" href="javascript:;" onclick="member_edit('编辑','<?php echo url("admin/Goods/edit"); ?>','<?php echo htmlentities($item["goods_id"]); ?>','1200','600')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'<?php echo htmlentities($item["goods_id"]); ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                    <?php else: ?>
                    <td class="td-status"><span class="label label-default radius">已删除</span></td>
                    <td class="td-manage"><a href="#">恢复</a></td>
                <?php endif; ?>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
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
    $(document).ready(function () {
        $(".table-sort").dataTable({
            // 这里写一些基本配置，例如：
            "paging": true,    // 是否开启分页功能(默认开启)
            "info": true,      // 是否显示分页的统计信息(默认开启)
            "searching": true,  // 是否开启搜索功能(默认开启)
            "ordering": true,  // 是否开启排序功能(默认开启)
            "order": [[1, 'asc']], // 设置默认排序的表格列[参数1是表格列的下标，从0开始]
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable":false,"aTargets":[0,2,3,4,6,7,8,10,12,13]}// 制定列不参与排序
            ]
        });
    });
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-查看*/
    function member_show(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*下架商品*/
    function member_stop(obj,id){
        layer.confirm('确认要下架商品吗？',function(index){
            $.ajax({
                type: 'GET',
                url: "<?php echo url('admin/Goods/stop'); ?>"+"?goodsId="+id,
                dataType: 'json',
                success: function(data){
                    if(data.code == 2000){
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="上架"><i class="Hui-iconfont">&#xe6e1;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">已下架</span>');
                        $(obj).remove();
                        layer.msg('已下架!',{icon: 5,time:1000});
                    }
                },
                error:function(data) {
                    layer.msg('下架失败!',{icon: 2,time:1000});
                },
            });
        });
    }

    /*用户-启用*/
    function member_start(obj,id){
        layer.confirm('确认要上架商品吗？',function(index){
            $.ajax({
                type: 'GET',
                url: "<?php echo url('admin/Goods/start'); ?>"+"?goodsId="+id,
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="上架"><i class="Hui-iconfont">&#xe631;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已上架</span>');
                    $(obj).remove();
                    layer.msg('已上架!',{icon: 6,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                },
            });
        });
    }
    /*用户-编辑*/
    function member_edit(title,url,id,w,h){
        url = url + "?goodsId="+id;
        layer_show(title,url,w,h);
    }
    /*密码-修改*/
    function change_password(title,url,id,w,h){
        layer_show(title,url,w,h);
    }
    /*用户-删除*/
    function member_del(obj,id){
        layer.confirm('确认要删除吗,删除后不可恢复？',function(index){
            $.ajax({
                type: 'GET',
                url: "<?php echo url('admin/Goods/del'); ?>"+"?goodsId="+id,
                dataType: 'json',
                success: function(data){
                    if(data.code == 2000){
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!',{icon:1,time:1000});
                    }else
                    {
                        layer.msg(data.msg,{icon:2,time:1000});
                    }

                },
                error:function(data) {
                    layer.msg('删除失败!',{icon:2,time:1000});
                },
            });
        });
    }

    /*批量删除*/
    function datadel(){
        var checkedbox = $("input[name='tag']:checked");
        if(checkedbox.length == 0){
            alert("请选择要删除的标签");
        }else{
            if(confirm("确认要批量删除吗,删除后不可恢复？")){
                var res = checkedbox.map(function(){
                    return this.value;
                });
                //window.location.href="${pageContext.request.contextPath}/deleteTags/ids="+res.toArray().join(",")+".action";
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('admin/Goods/batchDel'); ?>"+"?ids="+res.toArray().join(","),
                    dataType: 'json',
                    success: function(data){
                        window.location.reload();
                        layer.msg('已删除!',{icon:1,time:1000});
                    },
                    error:function(data) {
                        layer.msg('删除失败',{icon:2,time:1000});
                    },
                });

            }
        }
    }


</script>


</body>
</html>