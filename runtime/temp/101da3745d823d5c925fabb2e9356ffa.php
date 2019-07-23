<?php /*a:4:{s:89:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\imgtext\banner-edit.html";i:1563870036;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\base.html";i:1563238307;s:81:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\meta.html";i:1563238307;s:83:"D:\work\xampp\htdocs\project\rx_robelease\application\admin\view\public\footer.html";i:1563330416;}*/ ?>
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

<title xmlns:><?php echo htmlentities($title); ?></title>

</head>
<body>

<!--定义头部模块 并且默认引入头部-->



<!--定义左侧菜单栏 并且默认引入菜单-->



<!--定义此页面需要展示的内容模块-->

<div class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<input type="hidden" id="imgUrl" name="imgUrl" value="<?php echo htmlentities($banner['banner_cover']); ?>"/>
		<input type="hidden" id="banner_describe" name="" value="<?php echo htmlentities($banner['banner_describe']); ?>"/>
		<input type="hidden" id="" name="bannerId" value="<?php echo htmlentities($banner['banner_id']); ?>"/>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>轮播名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($banner['banner_name']); ?>" placeholder="" id="" name="banner_name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">指向跳转的URL：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($banner['banner_url']); ?>" placeholder="轮播跳转内容页面URL" id="" name="banner_url">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序值：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?php echo htmlentities($banner['banner_order_sort']); ?>" placeholder="" id="" name="banner_order_sort">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">轮播图片：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-list-container">
					<div class="queueList">
						<div id="dndArea" class="placeholder">
							<div id="filePicker-2"></div>
							<p>轮播图，只能选择一张</p>
						</div>
					</div>
					<div class="statusBar" style="display:none;">
						<div class="progress"><span class="text">0%</span> <span class="percentage"></span></div>
						<div class="info"></div>
						<div class="btns">
							<div id="filePicker2"></div>
							<div class="uploadBtn">开始上传</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--轮播内容富文本-->
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">轮播内容：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script>
            </div>
        </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交修改轮播</button>
                </div>
		</div>
	</form>
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

    var ue = UE.getEditor('editor',{wordCount:false,maximumWords:100000000000});
    ue.ready(function() {
        ue.setContent(document.getElementById("banner_describe").value);
    });
    UE.Editor.prototype._bkGetActionUrl = UE.Editor.prototype.getActionUrl;
    UE.Editor.prototype.getActionUrl = function(action) {
        if (action == 'uploadimage' || action == 'uploadscrawl' || action == 'uploadimage') {
            return '<?php echo url("admin/UploadImg/addUeditorPictureQiNiu"); ?>';//自定义富文本图片上传地址(后端上传到七牛云)
        } else if (action == 'uploadvideo') {
            return '';
        } else {
            return this._bkGetActionUrl.call(this, action);
        }
    }

    //表单验证
    $("#form-article-add").validate({
        rules:{
            bannerName:{
                required:true,
            }
        },
        onkeyup:false,
        focusCleanup:true,
        success:"valid",
        submitHandler:function(form){
            $(form).ajaxSubmit({
                type: 'post',
                dataType: "json",
                url: "<?php echo url('admin/Imgtext/editBanner'); ?>",
                success: function(data){
					if(data.code == 2000){
                        layer.msg('修改轮播成功!', {icon:1,time:1500}, function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            parent.location.reload(); //刷新父页面
                            parent.layer.close(index);
                        });
					}
                    else{
                        layer.msg(data.msg,{icon:1,time:1000});
					}
                },
                error: function(XmlHttpRequest, textStatus, errorThrown){
                    layer.msg('修改轮播失败!',{icon:1,time:1000});
                }
            });
        }

    });






    function article_save() {
        alert("刷新父级的时候会自动关闭弹层。")
        window.parent.location.reload();
    }

    (function ($) {
        // 当domReady的时候开始初始化
        $(function () {
            var $wrap = $('.uploader-list-container'),

                // 图片容器
                $queue = $('<ul class="filelist"></ul>')
                    .appendTo($wrap.find('.queueList')),

                // 状态栏，包括进度和控制按钮
                $statusBar = $wrap.find('.statusBar'),

                // 文件总体选择信息。
                $info = $statusBar.find('.info'),

                // 上传按钮
                $upload = $wrap.find('.uploadBtn'),

                // 没选择文件之前的内容。
                $placeHolder = $wrap.find('.placeholder'),

                $progress = $statusBar.find('.progress').hide(),

                // 添加的文件数量
                fileCount = 0,

                // 添加的文件总大小
                fileSize = 0,

                // 优化retina, 在retina下这个值是2
                ratio = window.devicePixelRatio || 1,

                // 缩略图大小
                thumbnailWidth = 110 * ratio,
                thumbnailHeight = 110 * ratio,

                // 可能有pedding, ready, uploading, confirm, done.
                state = 'pedding',

                // 所有文件的进度信息，key为file id
                percentages = {},
                // 判断浏览器是否支持图片的base64
                isSupportBase64 = (function () {
                    var data = new Image();
                    var support = true;
                    data.onload = data.onerror = function () {
                        if (this.width != 1 || this.height != 1) {
                            support = false;
                        }
                    }
                    data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
                    return support;
                })(),

                supportTransition = (function () {
                    var s = document.createElement('p').style,
                        r = 'transition' in s ||
                            'WebkitTransition' in s ||
                            'MozTransition' in s ||
                            'msTransition' in s ||
                            'OTransition' in s;
                    s = null;
                    return r;
                })(),

                // WebUploader实例
                uploader;

            // 实例化
            uploader = WebUploader.create({
                pick: {
                    id: '#filePicker-2',
                    label: '点击选择图片'
                },
                formData: {
                    uid: 123
                },
                dnd: '#dndArea',
                paste: '#uploader',
                swf: '/public/static/admin/lib/webuploader/0.1.5/Uploader.swf',
                chunked: false,
                chunkSize: 512 * 1024,
                server: '<?php echo url("admin/UploadImg/ajaxUploadImg"); ?>',
                // runtimeOrder: 'flash',

                // accept: {
                //     title: 'Images',
                //     extensions: 'gif,jpg,jpeg,bmp,png',
                //     mimeTypes: 'image/*'
                // },

                // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
                disableGlobalDnd: true,
                fileNumLimit: 1,
                fileSizeLimit: 10000 * 1024 * 1024,    // 200 M
                fileSingleSizeLimit: 10000 * 1024 * 1024    // 50 M
            });

            uploader.on('dialogOpen', function () {
                console.log('here');
            });

            // uploader.on('filesQueued', function() {
            //     uploader.sort(function( a, b ) {
            //         if ( a.name < b.name )
            //           return -1;
            //         if ( a.name > b.name )
            //           return 1;
            //         return 0;
            //     });
            // });

            // 添加“添加文件”的按钮，
            uploader.addButton({
                id: '#filePicker2',
                label: '继续添加'
            });

            uploader.on('ready', function () {
                window.uploader = uploader;
            });

            // 当有文件添加进来时执行，负责view的创建
            function addFile(file) {
                var $li = $('<li id="' + file.id + '">' +
                    '<p class="title">' + file.name + '</p>' +
                    '<p class="imgWrap"></p>' +
                    '<p class="progress"><span></span></p>' +
                    '</li>'),

                    $btns = $('<div class="file-panel">' +
                        '<span class="cancel">删除</span>' +
                        '<span class="rotateRight">向右旋转</span>' +
                        '<span class="rotateLeft">向左旋转</span></div>').appendTo($li),
                    $prgress = $li.find('p.progress span'),
                    $wrap = $li.find('p.imgWrap'),
                    $info = $('<p class="error"></p>'),

                    showError = function (code) {
                        switch (code) {
                            case 'exceed_size':
                                text = '文件大小超出';
                                break;

                            case 'interrupt':
                                text = '上传暂停';
                                break;

                            default:
                                text = '上传失败，请重试';
                                break;
                        }

                        $info.text(text).appendTo($li);
                    };


                if (file.getStatus() === 'invalid') {
                    showError(file.statusText);
                } else {
                    // @todo lazyload
                    $wrap.text('预览中');
                    uploader.makeThumb(file, function (error, src) {
                        var img;
                        if (error) {
                            $wrap.text('不能预览');
                            return;
                        }
                        if (isSupportBase64) {
                            img = $('<img src="' + src + '">');
                            $wrap.empty().append(img);
                        } else {
                            $.ajax('/public/static/admin/lib/webuploader/0.1.5/server/preview.php', {
                                method: 'POST',
                                data: src,
                                dataType: 'json'
                            }).done(function (response) {
                                if (response.result) {
                                    img = $('<img src="' + response.result + '">');
                                    $wrap.empty().append(img);
                                } else {
                                    $wrap.text("预览出错");
                                }
                            });
                        }
                    }, thumbnailWidth, thumbnailHeight);

                    percentages[file.id] = [file.size, 0];
                    file.rotation = 0;
                }

                file.on('statuschange', function (cur, prev) {
                    if (prev === 'progress') {
                        $prgress.hide().width(0);
                    } else if (prev === 'queued') {
                        $li.off('mouseenter mouseleave');
                        $btns.remove();
                    }

                    // 成功
                    if (cur === 'error' || cur === 'invalid') {
                        console.log(file.statusText);
                        showError(file.statusText);
                        percentages[file.id][1] = 1;
                    } else if (cur === 'interrupt') {
                        showError('interrupt');
                    } else if (cur === 'queued') {
                        percentages[file.id][1] = 0;
                    } else if (cur === 'progress') {
                        $info.remove();
                        $prgress.css('display', 'block');
                    } else if (cur === 'complete') {
                        $li.append('<span class="success"></span>');
                    }

                    $li.removeClass('state-' + prev).addClass('state-' + cur);
                });

                $li.on('mouseenter', function () {
                    $btns.stop().animate({height: 30});
                });

                $li.on('mouseleave', function () {
                    $btns.stop().animate({height: 0});
                });

                $btns.on('click', 'span', function () {
                    var index = $(this).index(),
                        deg;

                    switch (index) {
                        case 0:
                            uploader.removeFile(file);
                            return;

                        case 1:
                            file.rotation += 90;
                            break;

                        case 2:
                            file.rotation -= 90;
                            break;
                    }

                    if (supportTransition) {
                        deg = 'rotate(' + file.rotation + 'deg)';
                        $wrap.css({
                            '-webkit-transform': deg,
                            '-mos-transform': deg,
                            '-o-transform': deg,
                            'transform': deg
                        });
                    } else {
                        $wrap.css('filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (~~((file.rotation / 90) % 4 + 4) % 4) + ')');
                    }
                });

                $li.appendTo($queue);
            }

            // 负责view的销毁
            function removeFile(file) {
                /*删除图片把隐藏域中的url地址移除*/
                var imageUrls = document.getElementById("imgUrl").value;
                delete percentages[file.id];
                var img = imageUrls.split(",");
                for (let i = 0; i < img.length; i++) {
                    if (img[i] == file.name) {
                        img.splice(i, 1);
                        break;//该行代码变成i--,则移除所有2
                    }
                }
                document.getElementById("imgUrl").value = img;
                var $li = $('#' + file.id);
                updateTotalProgress();
                $li.off().find('.file-panel').off().end().remove();
            }

            function updateTotalProgress() {
                var loaded = 0,
                    total = 0,
                    spans = $progress.children(),
                    percent;

                $.each(percentages, function (k, v) {
                    total += v[0];
                    loaded += v[0] * v[1];
                });

                percent = total ? loaded / total : 0;


                spans.eq(0).text(Math.round(percent * 100) + '%');
                spans.eq(1).css('width', Math.round(percent * 100) + '%');
                updateStatus();
            }

            function updateStatus() {
                var text = '', stats;

                if (state === 'ready') {
                    text = '选中' + fileCount + '张图片，共' +
                        WebUploader.formatSize(fileSize) + '。';
                } else if (state === 'confirm') {
                    stats = uploader.getStats();
                    if (stats.uploadFailNum) {
                        text = '已成功上传' + stats.successNum + '张照片至XX相册，' +
                            stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
                    }

                } else {
                    stats = uploader.getStats();
                    text = '共' + fileCount + '张（' +
                        WebUploader.formatSize(fileSize) +
                        '），已上传' + stats.successNum + '张';

                    if (stats.uploadFailNum) {
                        text += '，失败' + stats.uploadFailNum + '张';
                    }
                }

                $info.html(text);
            }

            // 文件上传成功，给item添加成功class, 用样式标记上传成功。
            uploader.on('uploadSuccess', function (file, data) {
                $('#' + file.id).addClass('upload-state-success').find(".state").text("已上传");
                document.getElementById("imgUrl").value = data.data;
            });

            function setState(val) {
                var file, stats;

                if (val === state) {
                    return;
                }

                $upload.removeClass('state-' + state);
                $upload.addClass('state-' + val);
                state = val;

                switch (state) {
                    case 'pedding':
                        $placeHolder.removeClass('element-invisible');
                        $queue.hide();
                        $statusBar.addClass('element-invisible');
                        uploader.refresh();
                        break;

                    case 'ready':
                        $placeHolder.addClass('element-invisible');
                        $('#filePicker2').removeClass('element-invisible');
                        $queue.show();
                        $statusBar.removeClass('element-invisible');
                        uploader.refresh();
                        break;

                    case 'uploading':
                        $('#filePicker2').addClass('element-invisible');
                        $progress.show();
                        $upload.text('暂停上传');
                        break;

                    case 'paused':
                        $progress.show();
                        $upload.text('继续上传');
                        break;

                    case 'confirm':
                        $progress.hide();
                        $('#filePicker2').removeClass('element-invisible');
                        $upload.text('开始上传');

                        stats = uploader.getStats();
                        if (stats.successNum && !stats.uploadFailNum) {
                            setState('finish');
                            return;
                        }
                        break;
                    case 'finish':
                        stats = uploader.getStats();
                        if (stats.successNum) {
                            alert('上传成功');
                        } else {
                            // 没有成功的图片，重设
                            state = 'done';
                            location.reload();
                        }
                        break;
                }

                updateStatus();
            }

            uploader.onUploadProgress = function (file, percentage) {
                var $li = $('#' + file.id),
                    $percent = $li.find('.progress span');

                $percent.css('width', percentage * 100 + '%');
                percentages[file.id][1] = percentage;
                updateTotalProgress();
            };

            uploader.onFileQueued = function (file) {
                fileCount++;
                fileSize += file.size;

                if (fileCount === 1) {
                    $placeHolder.addClass('element-invisible');
                    $statusBar.show();
                }

                addFile(file);
                setState('ready');
                updateTotalProgress();
            };

            uploader.onFileDequeued = function (file) {
                fileCount--;
                fileSize -= file.size;

                if (!fileCount) {
                    setState('pedding');
                }

                removeFile(file);
                updateTotalProgress();

            };

            uploader.on('all', function (type) {
                var stats;
                switch (type) {
                    case 'uploadFinished':
                        setState('confirm');
                        break;

                    case 'startUpload':
                        setState('uploading');
                        break;

                    case 'stopUpload':
                        setState('paused');
                        break;

                }
            });

            uploader.onError = function (code) {
                if (code == 'Q_EXCEED_NUM_LIMIT') {
                    alert("物品图最大上传数量1");
                    return;
                } else if (code == 'F_DUPLICATE') {
                    alert("物品图片重复");
                } else {
                    alert('Eroor: ' + code);
                }
            };

            $upload.on('click', function () {
                if ($(this).hasClass('disabled')) {
                    return false;
                }

                if (state === 'ready') {
                    uploader.upload();
                } else if (state === 'paused') {
                    uploader.upload();
                } else if (state === 'uploading') {
                    uploader.stop();
                }
            });

            $info.on('click', '.retry', function () {
                uploader.retry();
            });

            $info.on('click', '.ignore', function () {
                alert('todo');
            });

            $upload.addClass('state-' + state);
            updateTotalProgress();


            /*--------------------------回显图片-----------------------------------*/
            //请求的图片路径url
            var getFileBlob = function (url, cb) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", url);
                xhr.responseType = "blob";
                xhr.addEventListener('load', function () {
                    cb(xhr.response);
                });
                xhr.send();
            };
            var blobToFile = function (blob, name) {
                blob.lastModifiedDate = new Date();
                blob.name = name;
                blob.id = 1;
                return blob;
            };
            var getFileObject = function (filePathOrUrl, cb) {
                getFileBlob(filePathOrUrl, function (blob) {
                    cb(blobToFile(blob, filePathOrUrl));
                });
            };
            //需要编辑的图片列表
            var picList = JSON.parse(document.getElementById("imgUrl").value);
            document.getElementById("imgUrl").value = picList.join();
            $.each(picList, function (index, item) {
                getFileObject(item, function (fileObject) {
                    var wuFile = new WebUploader.Lib.File(WebUploader.guid('rt_'), fileObject);
                    var file = new WebUploader.File(wuFile);
                    file.setStatus('complete')
                    uploader.addFiles(file)
                })
            });
        });
    })(jQuery);

    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });


    });

</script>


</body>
</html>