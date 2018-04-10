
















<?php if($state): ?>
    <table class="table-bordered table table-hover" id="tableCheck">
        <?php if(!empty($teacher1)): ?>
            班主任
            <th>id</th>
            <th>名字</th>
            <th>教工号</th>
            <th>性别</th>
            <th>手机号</th>
            <th>上次登录时间</th>
            <tr>
                <td><?php echo e($teacher1->id); ?></td>
                <td><?php echo e($teacher1->name); ?></td>
                <td><?php echo e($teacher1->number); ?></td>
                <td>
                    <?php if($teacher1->gender): ?>
                        男
                    <?php else: ?>
                        女
                    <?php endif; ?>
                </td>
                <td><?php echo e($teacher1->phone); ?></td>
                <td><?php echo e($teacher1->lastlogin); ?></td>
            </tr>
        <?php else: ?>
             还未分配教师
        <?php endif; ?>
    </table>
<?php else: ?>
    <table class="table-bordered table table-hover" id="tableCheck">
        <?php if(!empty($teacher2)): ?>
            授课教师
            <th>id</th>
            <th>名字</th>
            <th>教工号</th>
            <th>性别</th>
            <th>手机号</th>
            <th>上次登录时间</th>
            <tr>
                <td><?php echo e($teacher2->id); ?></td>
                <td><?php echo e($teacher2->name); ?></td>
                <td><?php echo e($teacher2->number); ?></td>
                <td>
                    <?php if($teacher2->gender): ?>
                        男
                    <?php else: ?>
                        女
                    <?php endif; ?>
                </td>
                <td><?php echo e($teacher2->phone); ?></td>
                <td><?php echo e($teacher2->lastlogin); ?></td>
            </tr>
        <?php else: ?>
            还未分配教师
        <?php endif; ?>
    </table>
<?php endif; ?>

    <?php if(count($data)): ?>
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
        暂未分配学生
    <?php endif; ?>

