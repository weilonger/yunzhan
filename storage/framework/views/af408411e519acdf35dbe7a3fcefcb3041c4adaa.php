<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	
	<div class="jumbotron">
	 	<img src="/style/admin/img/4.jpg"height="310px" width="100%" alt="">
	 	<h2><?php echo e($data->name); ?>，你好，欢迎使用云站</h2>
	 	<p></p>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("home.teacher.muban", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>