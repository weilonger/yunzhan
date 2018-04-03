<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/type">分类管理</a></li>
		<li class="active">班级管理</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"></span> 班级页面</a>

			<p class="pull-right tots" >共有<?php echo e($tot); ?>条数据</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>
				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		<table class="table-bordered table table-hover">
			<th class="col-sm-1">id</th>
			<th class="col-sm-3">名称</th>
			<th class="col-sm-4">简介</th>
			<th class="col-sm-2">创办时间</th>
			<th class="col-sm-1">学生人数</th>
			<th class="col-sm-1">查看</th>

			<?php $__currentLoopData = $class; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($value->id); ?></td>
					<td><?php echo e($value->name); ?></td>
					<td><?php echo e($value->description); ?></td>
					<td><?php echo e($value->createtime); ?></td>
					<td><?php echo e($value->count); ?></td>
					<td><a href="javascript:;" data-toggle="modal" data-target="#check" onclick="check('<?php echo e($value->id); ?>')" class="glyphicon glyphicon-eye-open"></a></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			<nav style="text-align:center;">
				<?php echo e($class->links()); ?>

			</nav>
		</div>
	</div>
</div>
<div class="modal fade" id="check">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">班级人员列表</h4>
			</div>
			<div class="modal-body" id="body">

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	function check(id) {
        $.get("/admin/type/check/"+id,{},function(data) {
            if (data) {
                $("#body").html(data);
            }else{
                $("#body").html();
			};
        })
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>