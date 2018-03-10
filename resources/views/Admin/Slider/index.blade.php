@extends('Admin.Public.admin')

@section('main')
<!-- 内容 -->
<link rel="stylesheet" href="/up/uploadify.css">
<script src="/style/admin/bs/js/jquery.min.js"></script>
<!-- 引入文件上传插件 -->
<script src="/up/jquery.uploadify.min.js"></script>
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
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a> -->
			<a href="javascript:;" data-toggle="modal" data-target="#add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加轮播图</a>
			
			<p class="pull-right tots">共有<span id="tot">{{$tot}}</span>条数据</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>
				
				<input type="submit" value="搜索" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th><input type="checkbox" name="" id=""></th>
			<th>ID</th>
			<th>名称</th>
			<th>链接</th>
			<th>图片</th>
			<th>状态</th>
			<th>操作</th>
		@foreach($data as $value)
			<tr>
				<td><input type="checkbox" name="" id=""></td>
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
				<form action="/admin/slider" method="post">
					{{csrf_field()}}
					<div class="form-group">
						<label for="">Title</label>
						<input type="text" name="title" class="form-control" placeholder="title" id="">

					</div>
					<div class="form-group">
						<label for="">Href</label>
						<input type="text" name="href" class="form-control" placeholder="友情连接" id="">
					</div>
					<div class="form-group">
						<label for="">Orders</label>
						<input type="number" name="orders"  class="form-control" placeholder="数值越大越靠前" id="">
					</div>
					<div class="form-group">
						<label for="">Img</label>
						<input type="file" name="" id="uploads">
						<div id="main">
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
        // 使用 uploadify 插件
        $('#uploads').uploadify({
            // 设置文本
            'buttonText' : '图片上传',
            // 设置文件传输数据
            'formData'     : {
                '_token':'{{ csrf_token() }}',
                'files':'lun',

            },
            // 上传的flash动画
            'swf'      : "/up/uploadify.swf",
            // 文件上传的地址
            'uploader' : "/admin/shangchuan",
            // 当文件上传成功
            'onUploadSuccess' : function(file, data, response) {

                // 拼接图片
                imgs="<img width='200px'  src='/Uploads/Slider/"+data+"'>";
                // 展示图片
                $("#main").html(imgs);
                // 隐藏传递数据
                $("#imgs").val(data);

            }
        });
    });
</script>
@endsection