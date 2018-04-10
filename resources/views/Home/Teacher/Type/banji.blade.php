@extends("home.teacher.muban")

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/teacher/banji">学生管理</a></li>
		<li class="active">班级信息</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"> 班级列表</span></a>
			<a href="/teacher/course" class="btn btn-success"><span class="	glyphicon glyphicon-list-alt"> 课程列表</span></a>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
		{{--+"id": 11--}}
		{{--+"teacherid": 2--}}
		{{--+"classid": 11--}}
		{{--+"name": "计科一班"--}}
		{{--+"pid": 5--}}
		{{--+"path": "0-1-2-5-"--}}
		{{--+"sort": 25--}}
		{{--+"isLou": 0--}}
		{{--+"kind": 3--}}
		{{--+"description": "1班"--}}
		{{--+"createtime": "2018-03-08"--}}
		@if($data1 || $data2)
			<table class="table-bordered table table-hover">
				@if(!empty($data1->id))
					<tr>管理班级（班主任）</tr>
					<tr>
						<th>id</th>
						<th class="col-sm-2">名称</th>
						<th class="col-sm-5">描述</th>
						<th class="col-sm-3">创建时间</th>
						<th class="col-sm-1">查看学生</th>
					</tr>
					@foreach($data1 as $value)
						<tr>
							<td>{{$value->id}}</td>
							<td>{{$value->name}}</td>
							<td>{{$value->description}}</td>
							<td>{{$value->createtime}}</td>
							<td><a href="/teacher/check/{{$value->id}}" class="glyphicon glyphicon-eye-open"></a></td>
						</tr>
					@endforeach
				@endif
			</table>
			<table class="table-bordered table table-hover">
				@if(!empty($data2))
						<tr>授课老师</tr>
						<tr>
							<th>id</th>
							<th class="col-sm-2">名称</th>
							<th class="col-sm-5">描述</th>
							<th class="col-sm-3">创建时间</th>
							<th class="col-sm-1">查看学生</th>
						</tr>
						@foreach($data2 as $value)
							<tr>
								<td>{{$value->id}}</td>
								<td>{{$value->name}}</td>
								<td>{{$value->description}}</td>
								<td>{{$value->createtime}}</td>
								<td><a href="/teacher/check/{{$value->id}}" class="glyphicon glyphicon-eye-open"></a></td>
							</tr>
						@endforeach
				@endif
			</table>
			<div class="panel-footer">
				<nav style="text-align:center;">
				</nav>
			</div>
		@else
			<div>
				暂无班级
			</div>
		@endif
	</div>
</div>
@endsection