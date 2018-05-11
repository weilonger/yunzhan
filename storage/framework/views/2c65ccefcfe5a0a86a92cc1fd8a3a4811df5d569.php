<div class="form-group">
    <input type="hidden" name="typeid" class="form-control" placeholder="" value="<?php echo e($data->typeid); ?>">
</div>
<div class="form-group">
    <label for="">课程名称</label>
    <input type="text" name="name" class="form-control" placeholder=""  value="<?php echo e($data->name); ?>">
</div>

<div class="form-group">
    <label for="">课程简介</label>
    <input type=text" name="info" class="form-control" placeholder=""  value="<?php echo e($data->info); ?>">
</div>

<div class="form-group">
    <label for="">课程班级</label>
    <input type=text" name="class" class="form-control" placeholder=""  value="<?php echo e($data->tname); ?>">
</div>

<div class="form-group">
    <label for="">开课时间</label>
    <input type=text" name="starttime" class="form-control" placeholder=""  value="<?php echo e($data->starttime); ?>">
</div>

<div class="form-group">
    <label for="">结束时间</label>
    <input type=text" name="endtime" class="form-control" placeholder="" value="<?php echo e($data->endtime); ?>">
</div>