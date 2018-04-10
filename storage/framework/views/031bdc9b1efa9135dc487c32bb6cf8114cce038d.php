<form action="" onsubmit="return false;" id="formEdit">
	<div class="form-group">
		<label for="">课程名称</label>
		<input type="text" name="name" value="<?php echo e($data->name); ?>" class="form-control" placeholder="课程名" id="">
		<input type="hidden" name="id" value="<?php echo e($data->id); ?>">
	</div>
	<div class="form-group">
		<label for="">简介</label>
		<input type="text" name="info" value="<?php echo e($data->info); ?>" class="form-control" placeholder="" id="">
	</div>
	<div class="form-group">
		<label for="">是否激活</label>
		<br>
		<?php if($data->isable): ?>
			<input type="radio" name="isable" checked value="1" id="">正常
			<input type="radio" name="isable" value="0" id="">禁用
		<?php else: ?>
			<input type="radio" name="isable"  value="1" id="">正常
			<input type="radio" name="isable" checked value="0" id="">禁用
		<?php endif; ?>
	</div>
	<div class="form-group">
		<label for="">状态</label>
		
		<?php if($data->isselect == '0'): ?>
			<input type="radio" name="isselect" checked value="0" id="">不可选课
			<input type="radio" name="isselect" value="1" id="">可以选课
			<input type="radio" name="isselect" value="2" id="">选课完毕
		<?php elseif($data->isselect == '1'): ?>
			<input type="radio" name="isselect"  value="0" id="">不可选课
			<input type="radio" name="isselect" checked value="1" id="">可以选课
			<input type="radio" name="isselect" value="2" id="">选课完毕
		<?php else: ?>
			<input type="radio" name="isselect"  value="0" id="">不可选课
			<input type="radio" name="isselect" value="1" id="">可以选课
			<input type="radio" name="isselect" checked value="2" id="">选课完毕
		<?php endif; ?>
	</div>
	<div class="form-group">
		<label for="">类型</label>
		<br>
		<select name="typeid" class="form-control">
			<?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
				<?php if($value->id == $data->typeid): ?>
					<option value="<?php echo e($value->id); ?>" selected = "selected"><?php echo e(str_repeat("|---",$value->kind)); ?><?php echo e($value->name); ?></option>
				<?php else: ?>
					<option value="<?php echo e($value->id); ?>"><?php echo e(str_repeat("|---",$value->kind)); ?><?php echo e($value->name); ?></option>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">开始时间</label>
		<input type="date" name="starttime" value="<?php echo e($data->starttime); ?>" class="form-control" placeholder="" id="">
	</div>
	<div class="form-group">
		<label for="">结束时间</label>
		<input type="date" name="endtime" value="<?php echo e($data->endtime); ?>" class="form-control" placeholder="" id="">
	</div>
	<div class="form-group pull-right">
		<input type="submit" value="提交" onclick="save(<?php echo e($data->id); ?>)" class="btn btn-success">
		<input type="reset" id="reset1" value="重置" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>