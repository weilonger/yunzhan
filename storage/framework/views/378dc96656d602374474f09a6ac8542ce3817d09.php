<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/teacher/banji">学生管理</a></li>
		<li class="active">班级信息</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加管理员</a> -->
			<a href="" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"> 班级列表</span></a>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
		
		
		
		
		
		
		
		
		
		
		
		<?php if(!empty($data)): ?>
			<table class="table-bordered table table-hover">
				<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<?php if($value->kind1 == $value->kind): ?>
						<tr>管理班级（班主任）</tr>
					<?php else: ?>
						<tr>授课班级（代课老师）</tr>
					<?php endif; ?>
					<tr>
						<th>id</th>
						<th class="col-sm-2">名称</th>
						<th class="col-sm-5">描述</th>
						<th class="col-sm-3">创建时间</th>
						<th class="col-sm-1">查看班级</th>
					</tr>
					<tr>
						<td><?php echo e($value->id); ?></td>
						<td><?php echo e($value->name); ?></td>
						<td><?php echo e($value->description); ?></td>
						<td><?php echo e($value->createtime); ?></td>
						<td><a href="/teacher/check/<?php echo e($value->id); ?>" class="glyphicon glyphicon-eye-open"></a></td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
			<div class="panel-footer">
				<nav style="text-align:center;">
				</nav>
			</div>
		<?php else: ?>
			<div>
				暂无班级
			</div>
		<?php endif; ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home.teacher.muban", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>