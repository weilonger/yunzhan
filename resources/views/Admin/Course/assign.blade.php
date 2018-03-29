@extends('admin.public.admin')

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/assign">课程管理</a></li>
		<li class="active">课程分配</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> 批量删除</button>
			<a href="/admin/course/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加课程</a>
			
			<p class="pull-right tots" >共有条数据</p>
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
			<th>开始时间</th>
			<th>结束时间</th>
			<th>操作</th>
			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" id=""></td>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->info}}</td>
					<td>{{$value->tpname}}</td>
					<td>{{$value->starttime}}</td>
					<td>{{$value->endtime}}</td>
					<td><a href="javascript:;" onclick="" data-toggle="modal" data-target="#edit" class="glyphicon glyphicon-plus"></a></td>
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

</script>
@endsection