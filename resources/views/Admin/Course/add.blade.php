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
			<a href="/admin/course" class="btn btn-danger"> 课程页面</a>
			<a href="" class="btn btn-success">添加课程</a>
		</div>
		<div class="panel-body">
			<form action="" onsubmit="return false;" id="formAdd">
			{{--<form action="/admin/course" method="post">--}}
				{{--{{csrf_field()}}--}}
				<div class="form-group">
					<label for="">课程名</label>
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
					<input type="radio" name="isselect" value="1">是
					<input type="radio" name="isselect" value="0" checked>否
				</div>
				<div class="form-group">
					<label for="">开始时间</label>
					<input type="date" name="starttime" class="form-control" placeholder="请选择课程开始时间">
				</div>
				<div class="form-group">
					<label for="">结束时间</label>
					<input type="date" name="endtime" class="form-control" placeholder="请选择课程结束时间">
				</div>
				<div class="form-group">
					<input type="submit" value="提交" onclick="add()" class="btn btn-success">
					<input type="reset" value="重置" class="btn btn-danger">
				</div>
			</form>
		</div>
		
	</div>
</div>
<script>
    function add(){
        // 表单序列化
        str=$("#formAdd").serialize();
        // 提交到下一个页面
        $.post('/admin/course',{str:str,'_token':'{{csrf_token()}}'},function(data){
            if (data == 1) {
                console.log('成功');
                location.href = "/admin/course";
            }else if(data){
                if (data.name) {
                    console.log('名称');
                }
                if (data.info) {
                    console.log('简介');
                }
                if (data.typeid) {
                    console.log('类型');
                }
                if (data.isselect) {
                    console.log('是否可选');
                }
                if (data.starttime) {
                    console.log('开始时间');
                }
                if (data.endtime) {
                    console.log('结束时间');
                }
            }else{
                alert('添加失败');
            }
        });
    }
</script>

@endsection