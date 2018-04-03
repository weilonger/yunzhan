@extends('admin.public.admin')

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/type">分类管理</a></li>
		<li class="active">分类列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"></span> 分类页面</a>
			<a href="/admin/type/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加分类</a>
			
			<p class="pull-right tots" >共有{{$tot}}条数据</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>
				<input type="submit" value="搜索" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th>ID</th>
			<th class="col-sm-4">名称</th>
			<th class="col-sm-3">描述</th>
			<th class="col-sm-2">创办时间</th>
			<th class="col-sm-2">添加子类</th>
			<th class="col-sm-2">操作</th>
			@foreach($data as $value)
			<tr>
				<td>{{$value->id}}</td>
				<?php
                	$arr=explode('-',$value->p);
					$kind = count($arr)-2;
				 ?>
				<td>{{str_repeat("|---",$kind)}}{{$value->name}}</td>
				<td>{{$value->description}}</td>
				<td>{{$value->createtime}}</td>
			@if($kind>=3)
					<td>添加子类</td>

				@else
					<td><a href="/admin/type/create?pid={{$value->id}}&path={{$value->path}}{{$value->id}}-">添加子类</a></td>

				@endif
				
				{{--@if($value->isLou)--}}
					{{--<td><span class="btn btn-success">是</span></td>--}}

				{{--@else--}}
					{{--<td><span class="btn btn-danger">否</span></td>--}}
					{{----}}
				{{--@endif--}}
				<td><a href="/admin/user/admin/1/edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="del({{$value->id}})" class="glyphicon glyphicon-trash"></a></td>
			</tr>
			@endforeach
			

		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			<nav style="text-align:center;">
				{{ $data->links() }}
			</nav>
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