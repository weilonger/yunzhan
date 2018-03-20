@extends('Admin.Public.admin')

@section('main')
<!-- 最新的 fileinput核心 css文件 -->
<link href="/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="/fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="/fileinput/js/locales/zh.js" type="text/javascript"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
{{--<script src="http://cdn.bootcss.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>--}}
<!-- 内容 -->
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/slider">轮播图管理</a></li>
		<li class="active">轮播图列表</li>
		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">轮播图展示</button>
			<!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a> -->
			<a href="javascript:;" data-toggle="modal" data-target="#add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 轮播图添加</a>
			
			<p class="pull-right tots">共有<span id="tot">{{$tot}}</span>条数据</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容">
				</div>
				
				<input type="submit" value="搜索" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th><input type="checkbox" name=""></th>
			<th>ID</th>
			<th>名称</th>
			<th>链接</th>
			<th>图片</th>
			<th>状态</th>
			<th>操作</th>
		@foreach($data as $value)
			<tr>
				<td><input type="checkbox" name=""></td>
				<td>{{$value->id}}</td>
				<td>{{$value->title}}</td>
				<td>{{$value->href}}</td>
				<td><img width="200px" src="/Uploads/Slider/{{$value->img}}" alt=""></td>
				@if($value->status)
					<td><span class="btn btn-success" onclick="status(this,{{$value->id}},1)">正常</span></td>
				@else
					<td><span class="btn btn-danger" onclick="status(this,{{$value->id}},0)">禁用</span></td>
				@endif
				<td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal" data-target="#edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="del(this,{{$value->id}})" class="glyphicon glyphicon-trash"></a></td>
			</tr>
			@endforeach
		</table>
		<div class="panel-footer">
			{{ $data->links() }}
		</div>
	</div>
</div>

<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">添加轮播图</h4>
			</div>
			<div class="modal-body">
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
					{{--/admin/slider--}}
				<form action="" method="post">
					{!! csrf_field() !!}
					<div class="form-group">
						<label for="">标题</label>
						<input type="text" name="title" class="form-control" placeholder="title">
					</div>
					<div class="form-group">
						<label for="">链接</label>
						<input type="text" name="href" class="form-control" placeholder="友情连接">
					</div>
					<div class="form-group">
						<label for="">权重</label>
						<input type="number" name="orders"  class="form-control" placeholder="数值越大越靠前">
					</div>
					<div class="form-group">
						<label for="">状态</label>
						<br>
						<input type="radio" name="status" checked value="1">正常
						<input type="radio" name="status" value="0">禁用
					</div>
					<div class="form-group">
						<label for="">图片</label>
						<input type="file" name="" id="uploads" multiple class="file-loading">
						<div id="pic">
						</div>
						<input type="hidden" name="img" id="imgs">
					</div>
					<div class="form-group pull-right">
						<input type="submit" value="提交" class="btn btn-success">
						<input type="reset" value="重置" class="btn btn-danger">
					</div>

					<div style="clear:both"></div>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    // 当所有HTML代码都加载完毕
    $(function() {
        // 声明字符串
        var imgs='';
        // 使用 fileinput 插件
        $('#uploads').fileinput({
            language: 'zh', //设置语言
            uploadUrl: '{{url('/admin/upload')}}', //上传的地址
            allowedFileExtensions: ['jpg', 'jpeg', 'gif', 'png'],//接收的文件后缀
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
            showPreview: true, //是否显示预览
            showCaption: false,//是否显示标题
            browseClass: "btn btn-primary", //按钮样式
            dropZoneEnabled: true,//是否显示拖拽区域
            //minImageWidth: 50, //图片的最小宽度
            //minImageHeight: 50,//图片的最小高度
            //maxImageWidth: 1000,//图片的最大宽度
            //maxImageHeight: 1000,//图片的最大高度
            maxFileSize: 2000,//单位为kb，如果为0表示不限制文件大小
            //minFileCount: 0,
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            enctype: 'multipart/form-data',
            validateInitialCount: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！"
        }).on("filebatchselected", function (event, files) {
            $(this).fileinput("upload");
        })
        //上传完成后的回调
        $('#uploads').on("fileuploaded", function (event, data, previewId, index) {
            //！！！我个人使用的时候！！！返回值必须为json格式
            //我在后台程序 单纯的返回了  json_encode('/storage/img/3142353534.jpg')
            //但是在这里仍然需要使用data.response获取图片地址
            $('#imgs').val(data.response);
        });
    });
</script>
<script>
    // obj,id 接收参数
    function del(obj,id){
        // 发送ajax请求
        // $.post(请求地址,传递参数,响应请求);
        // data可以随便命名 主要接收ajax返回的数据
        $.post('/admin/slider/'+id,{'id':id,'_method':'delete','_token':'{{ csrf_token() }}'},function(data){
            // 判断接收的数据如果1成功 0失败
            if (data) {
                // 移除对应删除的数据
                $(obj).parent().parent().remove();
                // 获取总数条数
                tot=Number($("#tot").html());
                // 修改总数据条数
                $("#tot").html(--tot);
            }else{
                alert('删除失败');
            }
        });
    }
    // 批量删除方法
    function delAll(){
        // 获取被选中数据的值
        var arr=[];
        // 获取所有的数据 并且是被选中的
        inputs=$(".inputs:checked");
        // 获取选中数据的value值
        for (var i = inputs.length - 1; i >= 0; i--) {
            // 把值压入到数组
            arr.push(inputs.eq(i).val());
        };
        // 把arr转换成字符串
        str=arr.join(',');
        // 发送ajax请求
        $.post('/admin/slider/delAll',{'str':str,'_token':'{{csrf_token()}}'},function(data){
            // 判断数据是否删除成功
            if (data==arr.length) {
                // 移除对应的数据
                for (var i = arr.length - 1; i >= 0; i--) {
                    $("#tr"+arr[i]).remove();
                };
                // 修改数据个数
                tot=Number($("#tot").html())-Number(data);
                $("#tot").html(tot);
            }else{
                alert('删除失败');
            }
        });
    }
    // 无刷新排序

    function change(obj,id){
        // 获取ID
        // 获取用户修改的值
        val=$(obj).val();
        // 发送ajax请求
        $.post('/admin/slider/sort',{'id':id,'val':val,'_token':'{{csrf_token()}}'},function(data){
            // 判断是否修改成功
            if (data==1) {
                // 页面自动刷新
                window.location.reload();
            }else{
                alert('修改失败');
            }
        });
    }
</script>
@endsection