@extends('admin.public.admin')

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/class">课程管理</a></li>
		<li class="active">课程添加</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="/admin/class" class="btn btn-danger"> 课程页面</a>
			<a href="" class="btn btn-success">添加课程</a>
		</div>
		<div class="panel-body">
			<form action="/admin/class" method="post">
				<div class="form-group">
					<label for="">课程名</label>
					{{csrf_field()}}
					<input type="text" name="name" class="form-control" placeholder="请输入课程名">
				</div>
				<div class="form-group">
					<label for="">课程简介</label>
					<textarea name="info" class="form-control" placeholder="请输入课程简介"></textarea>
				</div>
				<div class="form-group">
					<label for="">所属分类</label>
					<br>
					<select name="typeid" class="form-control">
						<option value="" >请选择课程分类</option>
						@foreach($data as $value)
							<option value="{{$value->id}}">{{str_repeat("|---",$value->kind)}}{{$value->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">是否可选</label>
					<br>
					<input type="radio" name="isLou" value="1"  checked>是
					<input type="radio" name="isLou" value="0">否
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