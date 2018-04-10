<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/type">分类管理</a></li>
		<li class="active">分类列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"></span> 分类页面</a>
			<a href="/admin/type/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加分类</a>
			
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
			<th class="col-sm-4">名称</th>
			<th class="col-sm-3">描述</th>
			<th class="col-sm-2">创办时间</th>
			<th class="col-sm-2">添加子类</th>
			<th class="col-sm-2">操作</th>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<tr>
				<td><?php echo e($value->id); ?></td>
				<?php
                	$arr=explode('-',$value->p);
					$kind = count($arr)-2;
				 ?>
				<td><?php echo e(str_repeat("|---",$kind)); ?><?php echo e($value->name); ?></td>
				<td><?php echo e($value->description); ?></td>
				<td><?php echo e($value->createtime); ?></td>
			<?php if($kind>=3): ?>
					<td>添加子类</td>

				<?php else: ?>
					<td><a href="/admin/type/create?pid=<?php echo e($value->id); ?>&path=<?php echo e($value->path); ?><?php echo e($value->id); ?>-">添加子类</a></td>

				<?php endif; ?>
				
				
					

				
					
					
				
				<td><a href="/admin/user/admin/1/edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="del(<?php echo e($value->id); ?>)" class="glyphicon glyphicon-trash"></a></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
			

		</table>
		<!-- 分页效果 -->
		<div class="panel-footer">
			<nav style="text-align:center;">
				<?php echo e($data->links()); ?>

			</nav>
		</div>
	</div>
</div>
<script>
	
	// 删除数据
	function del(id){
		if (confirm("您确认要删除？")) {
			// 发送post请求
			$.post("/admin/type/"+id,{'_token':"<?php echo e(csrf_token()); ?>",'_method':'delete'},function(data){
				if (data==1) {
					window.location.reload();
				};
			})
		};
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>