@extends('admin.public.admin')

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/course">课程管理</a></li>
		<li class="active">课程列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<a href="/admin/course/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加课程</a>
			
			<p class="pull-right tots" >共有{{$tot}}条数据</p>
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
			<th>简介</th>
			<th>所属分类</th>
			<th>是否激活</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>操作</th>
			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" id=""></td>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->info}}</td>
					<td>{{$value->type}}</td>
					@if($value->isable)
						<td><span class="btn btn-success" onclick="status(this,{{$value->id}},1)">正常</span></td>
					@else
						<td><span class="btn btn-danger" onclick="status(this,{{$value->id}},0)">禁用</span></td>
					@endif
					<td>{{$value->starttime}}</td>
					<td>{{$value->endtime}}</td>
					<td><a href="javascript:;" onclick="edit({{$value->id}})" data-toggle="modal" data-target="#edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="del(this,{{$value->id}})" class="glyphicon glyphicon-trash"></a></td>
				</tr>
			@endforeach


		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			{{ $data->links() }}
		</div>
	</div>
</div>
<script>
	
	// 删除数据
	function del(id){
		if (confirm("您确认要删除？")) {
			// 发送post请求
			$.post("/admin/type/"+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function(data){
				if (data==1) {
					window.location.reload();
				};
			})
		};
	}
</script>
@endsection