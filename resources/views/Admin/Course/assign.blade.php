@extends('admin.public.admin')

@section('main')
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/assign">课程管理</a></li>
		<li class="active">课程分配</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="" class="btn btn-success">可分配课程</a>
			
			<p class="pull-right tots" >共有{{$tot}}条数据</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>
				<input type="submit" value="搜索" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th>ID</th>
			<th>名称</th>
			<th>简介</th>
			<th>所属分类</th>
			<th>选课性质</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>操作</th>
			@foreach($data as $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->info}}</td>
					<td>{{$value->tpname}}</td>
					@if($value->type)
						<td>通选课</td>
					@else
						<td>专业课</td>
					@endif
					<td>{{$value->starttime}}</td>
					<td>{{$value->endtime}}</td>
					<td>
						@if($value->type)
							<a href="javascript:;" onclick="establish({{$value->id}},{{$value->typeid}})" data-toggle="modal" data-target="#establish" class="glyphicon glyphicon-plus"></a>
						@else
							<a href="javascript:;" onclick="allocate({{$value->id}},{{$value->typeid}})" data-toggle="modal" data-target="#allocate" class="glyphicon glyphicon-arrow-right"></a>
						@endif
					</td>
				</tr>
			@endforeach
		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			<nav style="text-align: center;">
				{{ $data->links() }}
			</nav>
		</div>
	</div>
</div>

<div class="modal fade" id="establish">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">添加班级</h4>
			</div>
			<div class="modal-body" id="body2">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="allocate">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">课程分派</h4>
			</div>
			<div class="modal-body" id="body1">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
    function allocate(id,typeid){
        $.post("/admin/course/allocate",{'id':id,'typeid':typeid,'_token':'{{ csrf_token() }}'},function(data){
            if (data) {
                $("#body1").html(data);
            };
        });
    }

    function fenpei(){
        str=$("#formAllocate").serialize();
        $.post("/admin/course/fenpei",{str:str,'_token':'{{csrf_token()}}'},function(data){
            // 判断data
            if (data==1) {
                window.location.reload();
            }else if(data){
                if (data.classid) {
                    class_str="<div class='alert alert-danger'>"+data.classid+"</div>";
                    $("#classinfo").html(class_str);
                }else{
                    class_str="<div class='alert alert-success'>√</div>";
                    if(data.teacherid){
                        teacher_str="<div class='alert alert-danger'>"+data.teacherid+"</div>";
                    }
                    else{
                        teacher_str="<div class='alert alert-success'>√</div>";
                    }
                    $("#classinfo").html(class_str);
                    $("#teacherinfo").html(teacher_str);
                }
            }else{
                alert('添加失败');
            }
        });
    }

    function tianjia() {
        str=$("#formEstablish").serialize();
        $.post("/admin/course/tianjia",{str:str,'_token':'{{csrf_token()}}'},function(data){
            // 判断data
            if (data==1) {
                window.location.reload();
            }else if(data){
                if (data.name) {
                    name_str="<div class='alert alert-danger'>"+data.name+"</div>";
                    $("#nameInfo").html(name_str);
                }else{
                    name_str="<div class='alert alert-success'>√</div>";
                    if(data.sort){
                        sort_str="<div class='alert alert-danger'>"+data.sort+"</div>";
                    }
                    else{
                        sort_str="<div class='alert alert-success'>√</div>";
                        if(data.teacherid){
                            teacher_str="<div class='alert alert-danger'>"+data.teacherid+"</div>";
                        }
                        else{
                            teacher_str="<div class='alert alert-success'>√</div>";
                            if(data.description){
                                description_str="<div class='alert alert-danger'>"+data.description+"</div>";
                            }
                            else{
                                description_str="<div class='alert alert-success'>√</div>";
                            }
                        }
                    }
                    $("#nameInfo").html(name_str);
                    $("#sortInfo").html(sort_str);
                    $("#teacherInfo").html(teacher_str);
                    $("#breafInfo").html(description_str);
                }
            }else{
                alert('添加失败');
            }
        });
    }

    function establish(id,typeid){
        $.post("/admin/course/establish",{id:id,typeid:typeid,'_token':'{{ csrf_token() }}'},function(data){
            if (data) {
                $("#body2").html(data);
            };
        });
    }
</script>
@endsection