@extends('home.student.muban')

@section('main')
<!-- 内容 -->
<link href="/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="/fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="/fileinput/js/locales/zh.js" type="text/javascript"></script>
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/student"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li>账户管理</li>
		<li class="active"><a href="/info/{{session('userInfo.id')}}/{{session('userInfo.type')}}">个人信息</a></li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="">
				<div class="form-group">
					<label for="name">名字:</label>
					<input type="text" name="name" value="{{$info->name}}" class="form-control" placeholder="请输入标题" >
				</div>
				<div class="form-group">
					<label for="">头像:</label>
					<img src="/Uploads/User/{{$info->photo}}" alt="">
					<input type="file" name="imgs" id="uploads">
					<input type="hidden" name="type" value="User">
					<input type="hidden" name="img" id="imgs">

				</div>
				<div class="form-group">
					<label for="password">密码</label>
					<input type="password" name="password" value="{{$info->password}}" class="form-control" placeholder="密码" >
						{{--<a href="javascript:;"  class="	glyphicon glyphicon-eye-open"></a>--}}
				</div>
				<div class="form-group">
					<label for="">创建时间</label>
					<input type="date" name="" value="{{$info->starttime}}" class="form-control" placeholder="" >
				</div>
				<div class="form-group">
					<label for="">结束时间</label>
					<input type="date" name="" value="{{$info->endtime}}" class="form-control" placeholder="" >
				</div>
				<div class="form-group">
					<label for="">上次登录时间</label>
					<input type="text" name="" value="{{$info->lastlogin}}" class="form-control" placeholder="" >
				</div>
				<div class="form-group">
					<label for="">所在班级</label>
					<input type="text" name="" value="{{$info->tpname}}" class="form-control" placeholder="" >
				</div>
				<div class="form-group">
					<label for="">学号</label>
					<input type="text" name="" value="{{$info->number}}" class="form-control" placeholder="" >
				</div>
				<div class="form-group">
					<label for="">邮箱</label>
					<input type="text" name="" value="{{$info->email}}" class="form-control" placeholder="请输入邮箱" >
				</div>
				<div class="form-group">
					<label for="">电话</label>
					<input type="text" name="" value="{{$info->phone}}" class="form-control" placeholder="请输入电话" >
				</div>

				<div class="form-group">
					<label for="">性别</label>
					<br>
					@if($info->gender)
						<input type="radio" name="gender" value="1" checked>男
						<input type="radio" name="gender" value="0">女
					@else
						<input type="radio" name="gender" value="1">男
						<input type="radio" name="gender" value="0" checked>女
					@endif
				</div>

				<div class="form-group">
					<label for="">状态</label>
					<br>
					@if($info->state)
						<input type="radio" name="status" value="1" checked>已激活
						<input type="radio" name="status" value="0">未激活
					@else
						<input type="radio" name="status" value="1">已激活
						<input type="radio" name="status" value="0" checked>未激活
					@endif
				</div>


			</form>
		</div>
	</div>
</div>
<!-- 添加页面模态框 -->


<script>
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
            uploadExtraData: { '_token':'{{csrf_token()}}','type':'Sys'},
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