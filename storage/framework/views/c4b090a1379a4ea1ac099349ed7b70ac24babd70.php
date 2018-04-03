
















<table class="table-bordered table table-hover" id="tableCheck">
    教师
    <th>id</th>
    <th>名字</th>
    <th>教工号</th>
    <th>性别</th>
    <th>手机号</th>
    <th>上次登录时间</th>
    <?php if(!empty($teacher)): ?>
        <tr>
            <td><?php echo e($teacher->id); ?></td>
            <td><?php echo e($teacher->name); ?></td>
            <td><?php echo e($teacher->number); ?></td>
            <td>
                <?php if($teacher->gender): ?>
                    男
                <?php else: ?>
                    女
                <?php endif; ?>
            </td>
            <td><?php echo e($teacher->phone); ?></td>
            <td><?php echo e($teacher->lastlogin); ?></td>
        </tr>
    <?php else: ?>
         还未分配教师
    <?php endif; ?>
</table>
    <?php if(!empty($data)): ?>
        <table class="table-bordered table table-hover" id="tableCheck">
            学生
            <th>id</th>
            <th>名字</th>
            <th>学号</th>
            <th>性别</th>
            <th>手机号</th>
            <th>上次登录时间</th>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->name); ?></td>
                        <td><?php echo e($value->number); ?></td>
                        <td>
                            <?php if($value->gender): ?>
                                男
                            <?php else: ?>
                                女
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($value->phone); ?></td>
                        <td><?php echo e($value->lastlogin); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </table>
        <div class="panel-footer">
            <nav style="text-align:center;">
                <?php echo e($data->links()); ?>

            </nav>
        </div>
    <?php else: ?>
        还没有学生
    <?php endif; ?>

