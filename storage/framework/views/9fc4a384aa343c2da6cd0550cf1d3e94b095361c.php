<?php $__env->startSection('main'); ?>
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
			
			<p class="pull-right tots" >共有<?php echo e($tot); ?>条数据</p>
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
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($value->id); ?></td>
					<td><?php echo e($value->name); ?></td>
					<td><?php echo e($value->info); ?></td>
					<td><?php echo e($value->tpname); ?></td>
					<?php if($value->type): ?>
						<td>通选课</td>
					<?php else: ?>
						<td>专业课</td>
					<?php endif; ?>
					<td><?php echo e($value->starttime); ?></td>
					<td><?php echo e($value->endtime); ?></td>
					<td>
						<?php if($value->type): ?>
							<a href="javascript:;" onclick="establish(<?php echo e($value->id); ?>)" data-toggle="modal" data-target="#establish" class="glyphicon glyphicon-plus"></a>
						<?php else: ?>
							<a href="javascript:;" onclick="allocate(<?php echo e($value->id); ?>,<?php echo e($value->typeid); ?>)" data-toggle="modal" data-target="#allocate" class="glyphicon glyphicon-arrow-right"></a>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			<nav style="text-align: center;">
				<?php echo e($data->links()); ?>

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
        $.post("/admin/course/allocate",{'id':id,'typeid':typeid,'_token':'<?php echo e(csrf_token()); ?>'},function(data){
            if (data) {
                $("#body1").html(data);
            };
        });
    }
    function establish(){
        $.post("/admin/course/establish",{id:id},function(data){
            if (data) {
                $("#body2").html(data);
            };
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>