<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/user/<?php echo e($type=$info['type']); ?>">用户管理</a></li>
		<li class="active">添加<?php echo e($info['status']); ?></li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="/admin/user/<?php echo e($type); ?>" class="btn btn-info"><span class="glyphicon glyphicon-home"></span> 用户展示</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加<?php echo e($info['status']); ?></a>

		</div>
		<div class="panel-body">
			<form action="/admin/user/deposit/<?php echo e($type); ?>" method="post">
				<div class="form-group">
					<?php echo e(csrf_field()); ?>

					<label for="username">用户名</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label for="name">姓名</label>
					<input type="text" class="form-control" name="name" />
				</div>
				<div class="form-group">
					<label for="gender">性别</label>
					<input type="radio" name="gender" value="1" checked>男
					<input type="radio" name="gender" value="0">女
				</div>
				<div class="form-group">
					<label for="typeid">分类</label>
						<select name="typeid" class="form-control">
						<option value="" >请选择课程分类</option>
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<?php if($type): ?>
								<?php if($value->kind<=2): ?>
									<option disabled value="<?php echo e($value->id); ?>"><?php echo e(str_repeat("|---",$value->kind)); ?><?php echo e($value->name); ?></option>
								<?php else: ?>
									<option value="<?php echo e($value->id); ?>"><?php echo e(str_repeat("|---",$value->kind)); ?><?php echo e($value->name); ?></option>
								<?php endif; ?>
							<?php else: ?>
								<option value="<?php echo e($value->id); ?>"><?php echo e(str_repeat("|---",$value->kind)); ?><?php echo e($value->name); ?></option>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
					</select>
				</div>
				<div class="form-group">
					<label for="password">密码</label>
					<input type="password" class="form-control" name="password"/>
				</div>
				<div class="form-group">
					<label for="phone">手机号码</label>
					<input type="text" class="form-control" name="phone" />
				</div>
				<div class="form-group">
					<label for="email">邮箱</label>
					<input type="text" class="form-control" name="email" />
				</div>
				<div class="form-group">
					<input type="submit" value="添加" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>