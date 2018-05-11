<?php $__env->startSection('main'); ?>
    <!-- 内容 -->
    <div class="col-md-10">
        <ol class="breadcrumb">
            <li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="javascript:history.back(-1)">作业列表</a></li>
            <li class="active">提交列表</li>

            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="javascript:history.back(-1)" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"> 作业列表</span></a>
                <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-home"> 提交列表</span></a>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>
            </div>

            
            
            
            
            
            
            
            <?php if(count($work)): ?>
                <table class="table-bordered table table-hover">
                    <tr>
                        <th>id</th>
                        <th class="col-sm-2">学生</th>
                        <th class="col-sm-2">名称</th>
                        <th class="col-sm-2">问题</th>
                        <th class="col-sm-2">作业名</th>
                        <th class="col-sm-2">上传时间</th>
                        <th class="col-sm-2">操作</th>
                    </tr>
                    <?php $__currentLoopData = $work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                    <td><?php echo e($value->id); ?></td>
                    <td><?php echo e($value->sname); ?></td>
                    <td><?php echo e($value->name); ?></td>
                    <td><?php echo e($value->qname); ?></td>
                    <td><?php echo e($value->tname); ?></td>
                    <td><?php echo e($value->committime); ?></td>
                    <td><a href="/download/work/<?php echo e($value->name); ?>" class="glyphicon glyphicon-download"></a>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>
                <div class="panel-footer">
                    <nav style="text-align:center;">
                        
                    </nav>
                </div>
            <?php else: ?>
                无学生提交作业<br>
                <a href="javascript:history.back(-1)">返回课程列表</a>
            <?php endif; ?>

        </div>
    </div>

    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">添加作业</h4>
                </div>
                <div class="modal-body">
                    <form action="" onsubmit="return false;" id="formAdd">
                        <div id="body" class="form-group">

                        </div>
                        <div class="form-group">
                            <label for="">附件</label>
                            <input type="file" name="extra" id="uploads" multiple class="file-loading">
                            <input type="hidden" name="extras" id="extras">
                        </div>

                        <div class="form-group pull-right">
                            <input type="submit" value="提交" onclick="addquestion()" class="btn btn-success">
                            <input type="reset" value="重置" class="btn btn-danger">
                        </div>

                        <div style="clear:both"></div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home.teacher.muban", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>