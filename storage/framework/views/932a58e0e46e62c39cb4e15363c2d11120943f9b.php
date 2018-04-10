<form action="" onsubmit="return false;" id="formEstablish">
	<div class="form-group">
		<input type="hidden" name="courseid" class="form-control" value="<?php echo e($id); ?>" id="">
	</div>
	<div class="form-group">
		<label for="">班级名称</label>
		<input type="text" name="name" class="form-control" placeholder="请输入班级名称">
		<input type="hidden" name="pid" value="<?php echo e($data->pid); ?>">
		<input type="hidden" name="path" value="<?php echo e($data->path); ?>">
	</div>
	<div id="nameInfo">

	</div>
	<div class="form-group">
		<label for="">权重</label>
		<input type="number" name="sort" class="form-control" placeholder="">
	</div>
	<div id="sortInfo">

	</div>
	<div class="form-group">
		<label for="">分配授课教师</label>
		<br>
		<select name="teacherid" class="form-control">
			<option value="" >请选择教师</option>
			<?php $__currentLoopData = $teacher; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</select>
		<input type="hidden" name="kind" value="3">
		<input type="hidden" name="isLou" value="1">
	</div>
	<div id="teacherInfo">

	</div>
	<div class="form-group">
		<label for="">简介</label>
		<input type="text" name="description" class="form-control" placeholder="">
	</div>
	<div id="breafInfo">

	</div>
	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="tianjia()" class="btn btn-success">
		<input type="reset" id="reset" value="重置" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>