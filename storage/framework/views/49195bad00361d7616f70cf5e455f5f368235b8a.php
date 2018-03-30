<form action="" onsubmit="return false;" id="formAllocate">
	<div class="form-group">
		<input type="hidden" name="id" class="form-control" value="<?php echo e($id); ?>" id="">
	</div>

	<div class="form-group">
		<label for="">选择班级</label>
		<br>
		<select name="typeid" class="form-control">
			<option value="" >请选择班级</option>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
			<option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">分配授课教师</label>
		<br>
		<select name="typeid" class="form-control">
			<option value="" >请选择教师</option>
			
			
			
		</select>
	</div>
	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="" class="btn btn-success">
		<input type="reset" id="reset" value="重置" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>