<form action="" onsubmit="return false;" id="formAllocate">
	<div class="form-group">
		<input type="hidden" name="id" class="form-control" value="{{$id}}" id="">
	</div>

	<div class="form-group">
		<label for="">选择班级</label>
		<br>
		<select name="typeid" class="form-control">
			<option value="" >请选择班级</option>
			@foreach($data as $value)
			<option value="{{$value->id}}">{{$value->name}}</option>
			@endforeach
		</select>
	</div>
	<div class="form-group">
		<label for="">分配授课教师</label>
		<br>
		<select name="typeid" class="form-control">
			<option value="" >请选择教师</option>
			{{--@foreach($type as $value)--}}
			{{--<option value="{{$value->id}}">{{str_repeat("|---",$value->kind)}}{{$value->name}}</option>--}}
			{{--@endforeach--}}
		</select>
	</div>
	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="" class="btn btn-success">
		<input type="reset" id="reset" value="重置" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>