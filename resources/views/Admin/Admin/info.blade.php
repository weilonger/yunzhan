@extends('admin.public.admin')

@section('main')
	<div class="col-md-10">

		<ol class="breadcrumb">
			<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li>管理员管理</li>
			<li class="active"><a href="/admin/info/{{session('adminUserInfo.id')}}">个人信息</a></li>

			<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
		</ol>
		<div class="panel panel-default">
			<div class="panel-body">
					<div class="form-group">
						<label for="">用户名</label>
						<input type="text" name="" disabled value="{{$info->name}}" class="form-control" placeholder="请输入标题" >
					</div>
					<div class="form-group">
						<label for="">密码</label>
						<input type="text" name="" disabled value="{{$info->password}}" class="form-control" placeholder="请输入关键词" >
					</div>
					<div class="form-group">
						<label for="">创建时间</label>
						<input type="text" name="" disabled value="{{$info->starttime}}" class="form-control" placeholder="请输入描述" >
					</div>
					<div id="passInfo"></div>
					<div class="form-group">
						<label for="">上次登录时间</label>
						<input type="text" name="" disabled value="{{$info->lastlogin}}" class="form-control" placeholder="请输入描述" >
					</div>
					<div class="form-group">
						<label for="">所属机构</label>
						<input type="text" name="" disabled value="{{$info->type}}" class="form-control" placeholder="请输入描述" >
					</div>
					<div class="form-group">
						<label for="">是否可用</label>
						<br>
						@if($info->status)
							<input type="radio" name="" value="1" checked>是
							<input type="radio" name="" value="0">否
						@else
							<input type="radio" name="" value="1">是
							<input type="radio" name="" value="0" checked>否
						@endif
					</div>
			</div>
		</div>
	</div>
	@endsection