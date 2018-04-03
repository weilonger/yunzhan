<?php $__env->startSection('main'); ?>
    <!-- 内容 -->
    <!-- 内容 -->
    <div class="col-md-10">

        <ol class="breadcrumb">
            <li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/teacher/type">学生管理</a></li>
            <li class="active">学生列表</li>

            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/teacher/banji" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"></span>班级页面</a>
                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span>学生列表 </a>
                <p class="pull-right tots" >共有<?php echo e($tot); ?>条数据</p>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>
            </div>
            <table class="table-bordered table table-hover" id="tableCheck">
                <th>id</th>
                <th>名字</th>
                <th>学号</th>
                <th>性别</th>
                <th>手机号</th>
                <th class="col-sm-2">邮箱</th>
                <th>上次登录时间</th>
                <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                        <td><?php echo e($value->email); ?></td>
                        <td><?php echo e($value->lastlogin); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </table>
            <!-- 分页效果 -->
            <div class="panel-footer">
                <nav style="text-align:center;">
                    <?php echo e($info->links()); ?>

                </nav>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home.teacher.muban', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>