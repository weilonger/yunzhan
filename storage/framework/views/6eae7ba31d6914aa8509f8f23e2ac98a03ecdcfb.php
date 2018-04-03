<?php $__env->startSection('main'); ?>
	<div class="col-md-10">

		<ol class="breadcrumb">
			<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
			<li><a href="/admin/info/<?php echo e(session('adminUserInfo.id')); ?>">管理员管理</a></li>
			<li class="active">个人信息</li>

			<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
		</ol>
		<div class="panel panel-default">
			<div class="panel-body">
					<div class="form-group">
						<label for="">用户名</label>
						<input type="text" name="" disabled value="<?php echo e($info->name); ?>" class="form-control" placeholder="请输入标题" >
					</div>
					<div class="form-group">
						<label for="">密码</label>
						<input type="text" name="" disabled value="<?php echo e($info->password); ?>" class="form-control" placeholder="请输入关键词" >
					</div>
					<div class="form-group">
						<label for="">创建时间</label>
						<input type="text" name="" disabled value="<?php echo e($info->starttime); ?>" class="form-control" placeholder="请输入描述" >
					</div>
					<div id="passInfo"></div>
					<div class="form-group">
						<label for="">上次登录时间</label>
						<input type="text" name="" disabled value="<?php echo e($info->lastlogin); ?>" class="form-control" placeholder="请输入描述" >
					</div>
					<div class="form-group">
						<label for="">所属机构</label>
						<input type="text" name="" disabled value="<?php echo e($info->type); ?>" class="form-control" placeholder="请输入描述" >
					</div>
					<div class="form-group">
						<label for="">是否可用</label>
						<br>
						<?php if($info->status): ?>
							<input type="radio" name="status" value="1" checked>是
							<input type="radio" name="status" value="0">否
						<?php else: ?>
							<input type="radio" name="status" value="1">是
							<input type="radio" name="status" value="0" checked>否
						<?php endif; ?>
					</div>
			</div>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>