<form action="" onsubmit="return false;" id="formDetail">
	<div class="form-group">
		<label for="" class="col-sm-2">用户名:</label>
		<div class="col-sm-4">
			<input type="text" name="name" value="{{$data->username}}" class="form-control" placeholder="用户名" id="">
			<input type="hidden" name="id" value="{{$data->id}}">
		</div>

	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">姓名:</label>
		<div class="col-sm-4">
			<input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="姓名" id="">
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">所属分类:</label>
		<div class="col-sm-4">
			<input type="text" name="tpname" value="{{$data->tpname}}" class="form-control" placeholder="所属分类" id="">
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">学号:</label>
		<div class="col-sm-4">
			<input type="text" name="number" value="{{$data->number}}" class="form-control" placeholder="学号" id="">
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">电话:</label>
		<div class="col-sm-4">
			<input type="text" name="phone" value="{{$data->phone}}" class="form-control" placeholder="电话" id="">
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">邮箱:</label>
		<div class="col-sm-4">
			<input type="text" name="email" value="{{$data->email}}" class="form-control" placeholder="邮箱" id="">
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">起始时间:</label>
		<div class="col-sm-4">
			<input type="text" name="starttime" value="{{$data->starttime}}" class="form-control" placeholder="起始时间" id="">
		</div>
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">结束时间:</label>
		<div class="col-sm-4">
			<input type="text" name="endtime" value="{{$data->endtime}}" class="form-control" placeholder="结束时间" id="">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2">状态:</label>
		<div class="col-sm-4">
			@if($data->state)
				<input type="radio" name="state" checked value="1" id="">正常
				<input type="radio" name="state" value="0" id="">禁用
			@else
				<input type="radio" name="state"  value="1" id="">正常
				<input type="radio" name="state" checked value="0" id="">禁用
			@endif
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-2">性别:</label>
		<div class="col-sm-4">
			@if($data->gender)
				<input type="radio" name="gender" checked value="1" id="">男
				<input type="radio" name="gender" value="0" id="">女
			@else
				<input type="radio" name="gender"  value="1" id="">男
				<input type="radio" name="gender" checked value="0" id="">女
			@endif
		</div>
	</div>

	<div class="col-sm-4">
		&nbsp
	</div>

	<div class="form-group">
		<label for="" class="col-sm-2">头像:</label>
		<div class="col-sm-4">
			<img src="/Uploads/User/{{$data->photo}}" style="width: 60px;height: 60px;" alt="">
		</div>
	</div>

	<div style="clear:both"></div>
</form>