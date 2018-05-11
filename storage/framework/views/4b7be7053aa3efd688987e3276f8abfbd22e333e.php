<?php $__env->startSection('main'); ?>
    <!-- 内容 -->
    <div class="col-md-10">
        <ol class="breadcrumb">
            <li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/teacher/course">课程管理</a></li>
            <li class="active">选课列表</li>
            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"> 选课列表</span></a>
                <a href="/student/course" class="btn btn-primary"><span class="glyphicon glyphicon-home"> 课程列表</span></a>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>
            </div>
        <?php if(isset($course1) && count($course1)): ?>
                <table class="table-bordered table table-hover">
                    <tr>确认选修课</tr>
                    <tr>
                        <th class="col-sm-1">学生id</th>
                        <th class="col-sm-2">姓名</th>
                        <th class="col-sm-2">性别</th>
                        <th class="col-sm-2">班级名称</th>
                        <th class="col-sm-2">课程名称</th>
                        <th class="col-sm-1">同意选课</th>
                    </tr>
                    <?php $__currentLoopData = $course1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td><?php echo e($value->id); ?></td>
                        <td><?php echo e($value->username); ?></td>
                        <td>
                            <?php if($value->gender): ?>
                                男
                            <?php else: ?>
                                女
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($value->tname); ?></td>
                        <td><?php echo e($value->cname); ?></td>
                        <td>
                            <a href="javascript:;" onclick="confirm(<?php echo e($value->id); ?>,<?php echo e($value->tid); ?>,<?php echo e($value->cid); ?>)" data-toggle="modal" data-target="#firm" class="glyphicon glyphicon-ok"></a>&nbsp&nbsp
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>
                <div class="panel-footer">
                    <nav style="text-align:center;">
                        
                    </nav>
                </div>
                <?php if(isset($course2) && count($course2)): ?>
                    <table class="table-bordered table table-hover">
                        <tr>选课已确认</tr>
                        <tr>
                            <th class="col-sm-1">学生id</th>
                            <th class="col-sm-2">姓名</th>
                            <th class="col-sm-2">性别</th>
                            <th class="col-sm-2">班级名称</th>
                            <th class="col-sm-2">课程名称</th>
                        </tr>
                        <?php $__currentLoopData = $course2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($value->id); ?></td>
                                <td><?php echo e($value->username); ?></td>
                                <td>
                                    <?php if($value->gender): ?>
                                        男
                                    <?php else: ?>
                                        女
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($value->tname); ?></td>
                                <td><?php echo e($value->cname); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                <?php endif; ?>
            <?php else: ?>
                <?php if(isset($course2) && count($course2)): ?>
                    <table class="table-bordered table table-hover">
                        <tr>选课已确认</tr>
                        <tr>
                            <th class="col-sm-1">学生id</th>
                            <th class="col-sm-2">姓名</th>
                            <th class="col-sm-2">性别</th>
                            <th class="col-sm-2">班级名称</th>
                            <th class="col-sm-2">课程名称</th>
                        </tr>
                        <?php $__currentLoopData = $course2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($value->id); ?></td>
                                <td><?php echo e($value->username); ?></td>
                                <td>
                                    <?php if($value->gender): ?>
                                        男
                                    <?php else: ?>
                                        女
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($value->tname); ?></td>
                                <td><?php echo e($value->cname); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </table>
                <?php else: ?>
                    没有更多的选课<br>
                    
                    <a href="/teacher/course">返回课程列表</a>
                <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>

    <div class="modal fade" id="firm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">同意选课</h4>
                </div>
                <div class="modal-body">
                    <form action="" onsubmit="return false;" id="formFirm">
                        <div id="firm1" class="form-group">

                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" value="确认" onclick="agree()" class="btn btn-success">
                        </div>

                        <div style="clear:both"></div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>

        function confirm(studentid,classid,courseid){
            $.get('/teacher/confirm/'+studentid+'/'+classid+'/'+courseid,{},function(data){
                if (data) {
                    $("#firm1").html(data);
                };
            });
        }

        function  agree() {
            str=$("#formFirm").serialize();
            // 提交到下一个页面
            $.post('/teacher/agree',{str:str,'_token':'<?php echo e(csrf_token()); ?>'},function(data){
                if (data==1) {
                    // 关闭弹框
                    $(".close").click();
                    window.location.reload();
                } else{
                    alert('确认失败');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home.teacher.muban", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>