@extends("home.student.muban")

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/student/class">学生管理</a></li>
		<li class="active">班级信息</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"> 班级列表</span></a>
			<a href="/student/course" class="btn btn-success"><span class="	glyphicon glyphicon-list-alt"> 课程列表</span></a>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
			<table class="table-bordered table table-hover">
					<tr>所属班级</tr>
					<tr>
						<th>id</th>
						<th class="col-sm-2">名称</th>
						<th class="col-sm-5">描述</th>
						<th class="col-sm-3">创建时间</th>
					</tr>
					@foreach($data1 as $vv)
						<tr>
								<td>{{$vv->id}}</td>
								<td>{{$vv->name}}</td>
								<td>{{$vv->description}}</td>
								<td>{{$vv->createtime}}</td>
						</tr>
					@endforeach
			</table>
			<table class="table-bordered table table-hover">
				@if(count($data2))
						<tr>选修课班级</tr>
						<tr>
							<th>id</th>
							<th class="col-sm-2">名称</th>
							<th class="col-sm-5">描述</th>
							<th class="col-sm-3">创建时间</th>
						</tr>
						@foreach($data2 as $value)

							<tr>
								<td>{{$value->id}}</td>
								<td>{{$value->name}}</td>
								<td>{{$value->description}}</td>
								<td>{{$value->createtime}}</td>
							</tr>
						@endforeach
				@endif
			</table>
	</div>
</div>
@endsection