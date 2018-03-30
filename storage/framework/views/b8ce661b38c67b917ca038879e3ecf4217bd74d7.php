<?php $__env->startSection('main'); ?>
<!-- 内容 -->
<div class="col-md-10">
	
	<ol class="breadcrumb">
		<li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/admin/course">课程管理</a></li>
		<li class="active">课程列表</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"></span> 课程页面</a>
			<a href="/admin/course/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> 添加课程</a>
			
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
			<th>是否激活</th>
			<th>状态</th>
			<th>开始时间</th>
			<th>结束时间</th>
			<th>操作</th>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<tr>
					<td><?php echo e($value->id); ?></td>
					<td><?php echo e($value->name); ?></td>
					<td><?php echo e($value->info); ?></td>
					<td><?php echo e($value->type); ?></td>
					<?php if($value->isable): ?>
						<td><span class="btn btn-success" onclick="status(this,<?php echo e($value->id); ?>,1)">正常</span></td>
					<?php else: ?>
						<td><span class="btn btn-danger" onclick="status(this,<?php echo e($value->id); ?>,0)">禁用</span></td>
					<?php endif; ?>
					<?php if($value->isselect == '0'): ?>
						<td><span class="btn btn-default">不能选课</span></td>
					<?php elseif($value->isselect == '1'): ?>
						<td><span class="btn btn-info">可以选课</span></td>
					<?php else: ?>
						<td><span class="btn btn-primary">完成选课</span></td>
					<?php endif; ?>
					<td><?php echo e($value->starttime); ?></td>
					<td><?php echo e($value->endtime); ?></td>
					<td><a href="javascript:;" onclick="edit(<?php echo e($value->id); ?>)" data-toggle="modal" data-target="#edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="del(this,<?php echo e($value->id); ?>)" class="glyphicon glyphicon-trash"></a></td>
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

<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">修改课程信息</h4>
			</div>
			<div class="modal-body" id="body">

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
	// 删除数据
    function del(obj,id){
        $.post("/admin/course/"+id,{"_token":'<?php echo e(csrf_token()); ?>',"_method":"delete"},function(data){
            // 判断是否成功
            if (data==1) {
                // 移除数据
                $(obj).parent().parent().remove();
                // 数量计算
                tot=Number($("#tot").html());
                $("#tot").html(--tot);
            }else{
                alert('删除失败');
            }
        })
    }

	//修改课程状态
    function status(obj,id,isable){
        // 发送ajax请求
        if (isable) {
            // 发送ajax请求
            $.post('/admin/course/ajaxStatu',{id:id,"_token":"<?php echo e(csrf_token()); ?>","isable":"0"},function(data){
                if (data==1) {
                    $(obj).parent().html('<td><span class="btn btn-danger" onclick="status(this,'+id+',0)">禁用</span></td>')
                }else{
                    alert('修改失败');
                }
            })
        }else{
            $.post('/admin/course/ajaxStatu',{id:id,"_token":"<?php echo e(csrf_token()); ?>","isable":"1"},function(data){
                if (data==1) {
                    $(obj).parent().html('<td><span class="btn btn-success" onclick="status(this,'+id+',1)">正常</span></td>')
                }else{
                    alert('修改失败');
                }
            })
        }
    }

	//修改数据
    function edit(id){
        $.get("/admin/course/"+id+"/edit",{},function(data){
            if (data) {
                $("#body").html(data);
            };
        });
    }

    function save(id) {
        str=$("#formEdit").serialize();
        // 提交到下一个页面
        $.post("/admin/course/"+id,{str:str,'_method':'put','_token':'<?php echo e(csrf_token()); ?>'},function(data){
            // 判断data
            if (data==1) {
                window.location.reload();
            }else{
                alert('修改失败');
            }
        });
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>