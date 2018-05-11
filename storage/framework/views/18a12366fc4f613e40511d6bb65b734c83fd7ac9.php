<div class="form-group">
    <input type="hidden" name="classid" class="form-control" value="<?php echo e($data->tid); ?>">
    <input	type="hidden" name="courseid" class="form-control" value="<?php echo e($data->cid); ?>">
</div>
<div class="form-group">
    <label for="">学生id</label>
    <input type="text" name="studentid" class="form-control" value="<?php echo e($data->id); ?>">
</div>
<div class="form-group">
    <label for="">姓名</label>
    <input type="text" name="username" class="form-control"  value="<?php echo e($data->username); ?>">
</div>
<div class="form-group">
    <label for="">性别</label>
    <input type="text" name="gender" class="form-control" value="<?php echo e($data->gender); ?>">
</div>
<div class="form-group">
    <label for="">班级名称</label>
    <input type="text" name="classname" class="form-control" value="<?php echo e($data->tname); ?>">
</div>
<div class="form-group">
    <label for="">课程名称</label>
    <input type=text" name="coursename" class="form-control" value="<?php echo e($data->cname); ?>">
</div>