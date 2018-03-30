@extends('admin.public.admin')

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/type">分类管理</a></li>
		<li class="active">分类添加</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="/admin/type" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> 分类页面</a>
			<a href="" class="btn btn-success">添加分类页面</a>
			
		</div>
		<div class="panel-body">
			<form action="/admin/type" method="post">
				<div class="form-group">
					<label for="">分类名</label>
					{{csrf_field()}}
					<input type="text" name="name" class="form-control" id="" placeholder="请输入分类名">
					<input type="hidden" name="pid" value="<?php echo isset($_GET['pid'])?$_GET['pid']:0;?>">
					<input type="hidden" name="path" value="<?php echo isset($_GET['path'])?$_GET['path']:'0-';?>">
				</div>
				<div class="form-group">
					<label for="">权重</label>
					<input type="text" name="sort" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">楼层</label>
					<br>
					<input type="radio" name="isLou" value="1"  id="">是
					<input type="radio" name="isLou" value="0" checked id="">否
				</div>
				<div class="form-group">
					<label for="">描述</label>
					<input type="text" name="description" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">创建时间</label>
					<input type="date" name="createtime" class="form-control" id="">
				</div>
				<div class="form-group">
					<input type="submit" value="提交" class="btn btn-success">
					<input type="reset" value="重置" class="btn btn-danger">
				</div>
			</form>
		</div>
		
	</div>
</div>

@endsection