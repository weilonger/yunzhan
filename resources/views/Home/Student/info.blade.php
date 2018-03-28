@extends('home.student.muban')

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/student"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li>账户管理</li>
		<li class="active"><a href="/info/{{session('userInfo.id')}}/{{session('userInfo.type')}}">个人信息</a></li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="">
				<div class="form-group">
					<label for="">名字</label>
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
					<input type="text" name="" disabled value="{{$info->tpname}}" class="form-control" placeholder="请输入描述" >
				</div>
				<div class="form-group">
					<label for="">是否可用</label>
					<br>
					@if($info->state)
						<input type="radio" name="" value="1" checked>是
						<input type="radio" name="" value="0">否
					@else
						<input type="radio" name="" value="1">是
						<input type="radio" name="" value="0" checked>否
					@endif
				</div>
			</form>
		</div>
	</div>
</div>
<!-- 添加页面模态框 -->


<script>
    function edit(id){
        $.get("/admin/admin/"+id+"/edit",{},function(data){
            if (data) {
                $("#body").html(data);
            };
        });
	}
	
	function save(id) {
        str=$("#formEdit").serialize();
        // 提交到下一个页面
        $.post("/admin/admin/"+id,{str:str,'_method':'put','_token':'{{csrf_token()}}'},function(data){
            // 判断data
            if (data==1) {
                window.location.reload();
            }else if(data){
                // 密码提示信息
                if (data.password) {
                    str="<div class='alert alert-danger'>"+data.password+"</div>";
                }else{
                    str="<div class='alert alert-success'>√</div>";
                }
                $("#passInfo1").html(str);
            }else{
                alert('添加失败');
            }
        });
    }
</script>
@endsection