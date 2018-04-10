<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/teacher/banji">课程管理</a></li>
		<li class="active">课程信息</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="/teacher/banji" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"> 班级列表</span></a>
			<a href="/teacher/course/add" class="btn btn-primary"><span class="	glyphicon glyphicon-plus"> 添加课程</span></a>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		<table class="table-bordered table table-hover">
			<tr>
				<th>id</th>
				<th class="col-sm-2">名称</th>
				<th class="col-sm-3">描述</th>
				<th class="col-sm-2">班级</th>
				<th class="col-sm-3">创建时间</th>
				<th class="col-sm-1">作业操作</th>
			</tr>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($value->id); ?></td>
					<td><?php echo e($value->name); ?></td>
					<td><?php echo e($value->info); ?></td>
					<td><?php echo e($value->name1); ?></td>
					<td><?php echo e($value->starttime); ?></td>
					<td><a href="/teacher/question" class="glyphicon glyphicon-eye-open"></a>&nbsp&nbsp&nbsp
					<a href="add(<?php echo e($value->classid); ?>,<?php echo e($value->courseid); ?>,<?php echo e($value->teacherid); ?>)" data-toggle="modal" data-target="#add" class="glyphicon glyphicon-plus"></a></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</table>

		<div class="panel-footer">
			<nav style="text-align:center;">
				<?php echo e($data->links()); ?>

			</nav>
		</div>
	</div>
</div>

<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">添加作业</h4>
			</div>
			<div class="modal-body">
				<form action="" onsubmit="return false;" id="formAdd">
					<div class="form-group">
						<label for="">作业名称</label>
						<input type="text" name="name" class="form-control" placeholder="请输入作业名" id="">
					</div>
					<div class="form-group">
						<label for="">简介</label>
						<input type=text" name="info" class="form-control" placeholder="请输入作业要求" id="">
					</div>

					<div class="form-group">
						<label for="">附件</label>
						<input type="file" name="extra" class="filess" style="opacity: 0"/>
						<input type="text" style="width: 350px" class="filetext"/>
						<button class="xiugaibtn">上传</button>
					</div>

					<div class="form-group pull-right">
						<input type="submit" value="提交" onclick="add()" class="btn btn-success">
						<input type="reset" id="reset" value="重置" class="btn btn-danger">
					</div>

					<div style="clear:both"></div>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(".xiugaibtn").click(function () {
        $(".filess").click();
    });

    function add(classid,courseid,teacherid){
        // 表单序列化
        str=$("#formAdd").serialize();
        // 提交到下一个页面
//		console.log(classid);
        $.post('/teacher/addquestion',{str:str,classid:classid,courseid:courseid,teacherid:teacherid,'_token':'<?php echo e(csrf_token()); ?>'},function(data){
            if (data==1) {
                // 关闭弹框
                $(".close").click();
                // 重置表单内容
                $("#reset").click();
                // 清空提示信息
                $("#passInfo").html('');
                $("#nameInfo").html('');
                window.location.reload();
            }else if(data){
                // 用户名提示信息
                var str='';
                if (data.name) {
                    str="<div class='alert alert-danger'>"+data.name+"</div>";
                }else{
                    str="<div class='alert alert-success'>√</div>";
                }
                $("#userInfo").html(str);
                // 密码提示信息
                if (data.info) {
                    str="<div class='alert alert-danger'>"+data.info+"</div>";
                }else{
                    str="<div class='alert alert-success'>√</div>";
                }
                $("#passInfo").html(str);
            }else{
                alert('添加失败');
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home.teacher.muban", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>