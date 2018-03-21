@extends('admin.public.admin')

@section('main')
<!-- 引入JQ -->
<script src="/style/admin/bs/js/jquery.min.js"></script>
<!-- 引入文件上传插件 -->
<link href="/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="/fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="/fileinput/js/locales/zh.js" type="text/javascript"></script>
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/config">系统管理</a></li>
		<li class="active">修改系统信息</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="/admin/config" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">标题</label>
					<input type="text" name="title" value="{{config('web.title')}}" class="form-control" placeholder="请输入标题" >
				</div>
				<div class="form-group">
					<label for="">关键词</label>
					<input type="text" name="keywords" value="{{config('web.keywords')}}" class="form-control" placeholder="请输入关键词" >
				</div>
				<div class="form-group">
					<label for="">描述</label>
					<input type="password" name="description" value="{{config('web.description')}}" class="form-control" placeholder="请输入描述" >
				</div>
				<div id="passInfo"></div>
				<div class="form-group">
					<label for="">统计</label>
					<textarea name="baidu"  cols="30" class="form-control" rows="4">{{config('web.baidu')}}</textarea>
				</div>
				<div class="form-group">
					<label for="">logo</label>
					<input type="file" name="imgs" id="uploads">
					<div id="main">
						<img src="/Uploads/Sys/{{config('web.img')}}" alt="">
					</div>
					<input type="hidden" name="type" value="Sys">
					<input type="hidden" name="img" id="imgs">
				</div>
				<div class="form-group pull-right">
					<input type="submit" value="提交" onclick="add()" class="btn btn-success">
					<input type="reset" id="reset" value="重置" class="btn btn-danger">
				</div>

				<div style="clear:both"></div>
			</form>
		</div>
	</div>
</div>
<script>
    // 当所有HTML代码都加载完毕
    $(function() {
        // 声明字符串
        var imgs='';
        // 使用 uploadify 插件
        $('#uploads').fileinput({
            language: 'zh', //设置语言
            uploadUrl: '{{url('/admin/upload')}}', //上传的地址
            allowedFileExtensions: ['jpg', 'jpeg', 'gif', 'png','gpeg'],//接收的文件后缀
            browseLabel: '选择文件',
            removeLabel: '删除文件',
            removeTitle: '删除选中文件',
            cancelLabel: '取消',
            cancelTitle: '取消上传',
            uploadLabel: '上传',
            uploadTitle: '上传选中文件',
            dropZoneTitle: "请通过拖拽图片文件放到这里",
            dropZoneClickTitle: "或者点击此区域添加图片",
            uploadAsync: true, //默认异步上传
            showUpload: true, //是否显示上传按钮
            showRemove: true, //显示移除按钮
            showPreview: false, //是否显示预览
            showCaption: false,//是否显示标题
            browseClass: "btn btn-primary", //按钮样式
            dropZoneEnabled: true,//是否显示拖拽区域
            //minImageWidth: 50, //图片的最小宽度
            //minImageHeight: 50,//图片的最小高度
            //maxImageWidth: 1000,//图片的最大宽度
            //maxImageHeight: 1000,//图片的最大高度
            maxFileSize: 0,//单位为kb，如果为0表示不限制文件大小
            //minFileCount: 0,
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            enctype: 'multipart/form-data',
            validateInitialCount: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            uploadExtraData: { '_token':'{{csrf_token()}}' },
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！"
        }).on("filebatchselected", function (event, files) {
            $(this).fileinput("upload");
        })
        //上传完成后的回调
        $('#uploads').on("fileuploaded", function (event, data, previewId, index) {
            //！！！我个人使用的时候！！！返回值必须为json格式
            //我在后台程序 单纯的返回了  json_encode('/storage/img/3142353534.jpg')
            console.log(data.response);
            $('#imgs').val(data.response);
        });
    });
</script>
@endsection