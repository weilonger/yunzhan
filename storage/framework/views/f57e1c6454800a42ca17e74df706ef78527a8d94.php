<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/student/class">学生管理</a></li>
		<li class="active">班级信息</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"> 班级列表</span></a>
			<a href="/student/course" class="btn btn-success"><span class="	glyphicon glyphicon-list-alt"> 课程列表</span></a>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
			<table class="table-bordered table table-hover">
					<tr>所属班级</tr>
					<tr>
						<th>id</th>
						<th class="col-sm-2">名称</th>
						<th class="col-sm-5">描述</th>
						<th class="col-sm-3">创建时间</th>
					</tr>
					<?php $__currentLoopData = $data1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vv): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
								<td><?php echo e($vv->id); ?></td>
								<td><?php echo e($vv->name); ?></td>
								<td><?php echo e($vv->description); ?></td>
								<td><?php echo e($vv->createtime); ?></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			</table>
			<table class="table-bordered table table-hover">
				<?php if(count($data2)): ?>
						<tr>选修课班级</tr>
						<tr>
							<th>id</th>
							<th class="col-sm-2">名称</th>
							<th class="col-sm-5">描述</th>
							<th class="col-sm-3">创建时间</th>
						</tr>
						<?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

							<tr>
								<td><?php echo e($value->id); ?></td>
								<td><?php echo e($value->name); ?></td>
								<td><?php echo e($value->description); ?></td>
								<td><?php echo e($value->createtime); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				<?php endif; ?>
			</table>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home.student.muban", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>