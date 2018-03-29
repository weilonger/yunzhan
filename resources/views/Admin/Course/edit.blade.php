<form action="" onsubmit="return false;" id="formEdit">
	<div class="form-group">
		<label for="">课程名称</label>
		<input type="text" name="name" value="{{$data->name}}" class="form-control" placeholder="课程名" id="">
		<input type="hidden" name="id" value="{{$data->id}}">
	</div>
	<div class="form-group">
		<label for="">简介</label>
		<input type="text" name="info" value="{{$data->info}}" class="form-control" placeholder="" id="">
	</div>
	<div class="form-group">
		<label for="">是否激活</label>
		<br>
		@if($data->isable)
			<input type="radio" name="isable" checked value="1" id="">正常
			<input type="radio" name="isable" value="0" id="">禁用
		@else
			<input type="radio" name="isable"  value="1" id="">正常
			<input type="radio" name="isable" checked value="0" id="">禁用
		@endif
	</div>
	<div class="form-group">
		<label for="">状态</label>
		{{--<input type="text" name="isselect" value="{{$data->isselect}}" class="form-control" placeholder="请再次输入密码" id="">--}}
		@if($data->isselect == '0')
			<input type="radio" name="isselect" checked value="0" id="">不可选课
			<input type="radio" name="isselect" value="1" id="">可以选课
			<input type="radio" name="isselect" value="2" id="">选课完毕
		@elseif($data->isselect == '1')
			<input type="radio" name="isselect"  value="0" id="">不可选课
			<input type="radio" name="isselect" checked value="1" id="">可以选课
			<input type="radio" name="isselect" value="2" id="">选课完毕
		@else
			<input type="radio" name="isselect"  value="0" id="">不可选课
			<input type="radio" name="isselect" value="1" id="">可以选课
			<input type="radio" name="isselect" checked value="2" id="">选课完毕
		@endif
	</div>
	<div class="form-group">
		<label for="">类型</label>
		<br>
		<select name="typeid" class="form-control">
			@foreach($type as $value)
				@if($value->id == $data->typeid)
					<option value="{{$value->id}}" selected = "selected">{{str_repeat("|---",$value->kind)}}{{$value->name}}</option>
				@else
					<option value="{{$value->id}}">{{str_repeat("|---",$value->kind)}}{{$value->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">开始时间</label>
		<input type="date" name="starttime" value="{{$data->starttime}}" class="form-control" placeholder="" id="">
	</div>
	<div class="form-group">
		<label for="">结束时间</label>
		<input type="date" name="endtime" value="{{$data->endtime}}" class="form-control" placeholder="" id="">
	</div>
	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="save({{$data->id}})" class="btn btn-success">
		<input type="reset" id="reset1" value="重置" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>