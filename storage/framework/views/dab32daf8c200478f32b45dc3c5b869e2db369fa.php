<?php $__env->startSection('main'); ?>
    <link href="/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="/fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="/fileinput/js/locales/zh.js" type="text/javascript"></script>
    <!-- 内容 -->
    <div class="col-md-10">
        <ol class="breadcrumb">
            <li><a href="/student"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/student/course">课程管理</a></li>
            <li class="active">作业列表</li>

            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/student/course" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"> 课程列表</span></a>
                <a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-home"> 作业列表</span></a>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>
            </div>

            <?php if(count($question)): ?>
                <table class="table-bordered table table-hover">
                    <tr>
                        <th>id</th>
                        <th class="col-sm-2">名称</th>
                        <th class="col-sm-3">描述</th>
                        <th class="col-sm-2">附件</th>
                        <th class="col-sm-3">创建时间</th>
                        <th class="col-sm-1">操作</th>
                    </tr>
                    <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                    <td><?php echo e($value->id); ?></td>
                    <td><?php echo e($value->name); ?></td>
                    <td><?php echo e($value->info); ?></td>
                    <td><?php echo e($value->extras); ?></td>
                    <td><?php echo e($value->createtime); ?></td>
                    <td>
                        <a href="" class="glyphicon glyphicon-eye-open"></a>&nbsp&nbsp
                        <a href="/download/<?php echo e($type = 'Question'); ?>/<?php echo e($value->extras); ?>" class="glyphicon glyphicon-download"></a>&nbsp
                        <a href="javascript:;" onclick="add(<?php echo e($value->id); ?>)" data-toggle="modal" data-target="#add" class="glyphicon glyphicon-upload"></a>
                    </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </table>
                <div class="panel-footer">
                    <nav style="text-align:center;">
                        
                    </nav>
                </div>
            <?php else: ?>
                没有相关作业<br>
                <a href="/student/course">返回课程列表</a>
            <?php endif; ?>

        </div>
    </div>

    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">提交作业</h4>
                </div>
                <div class="modal-body">
                    <form action="" onsubmit="return false;" id="formAdd">
                        <div id="body" class="form-group">

                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">作业名称</label>
                                <input type="text" name="tname" class="form-control" placeholder="请输入作业名" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">作业文件</label>
                            <input type="file" name="work" id="uploads" multiple class="file-loading">
                            <input type="hidden" name="works" id="works">
                        </div>

                        <div class="form-group pull-right">
                            <input type="submit" value="提交" onclick="addwork()" class="btn btn-success">
                            <input type="reset" value="重置" class="btn btn-danger">
                        </div>

                        <div style="clear:both"></div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        $(function() {
            // 声明字符串
            var extras='';
            $('#uploads').fileinput({
                language: 'zh', //设置语言
                uploadUrl: '<?php echo e(url('/upload')); ?>', //上传的地址
//            allowedFileExtensions: ['txt','doc','docx','xlsx','ppt','pdf','html','shtml'],//接收的文件后缀
                allowedFileExtensions: ['doc','txt','docx','ppt','html','zip'],//接收的文件后缀
                browseLabel: '选择文件',
                removeLabel: '删除文件',
                removeTitle: '删除选中文件',
                cancelLabel: '取消',
                cancelTitle: '取消上传',
                uploadLabel: '上传',
                uploadTitle: '上传选中文件',
//            dropZoneTitle: "请通过拖拽图片文件放到这里",
//            dropZoneClickTitle: "或者点击此区域添加图片",
                uploadAsync: true, //默认异步上传
                showUpload: true, //是否显示上传按钮
                showRemove: true, //显示移除按钮
                showPreview: false, //是否显示预览
                showCaption: true,//是否显示标题
                browseClass: "btn btn-primary", //按钮样式
                dropZoneEnabled: true,//是否显示拖拽区域
                //minImageWidth: 50, //图片的最小宽度
                //minImageHeight: 50,//图片的最小高度
                //maxImageWidth: 1000,//图片的最大宽度
                //maxImageHeight: 1000,//图片的最大高度
                maxFileSize: 0,//单位为kb，如果为0表示不限制文件大小
                //minFileCount: 0,
                maxFileCount: 1, //表示允许同时上传的最大文件个数
                enctype: 'multipart/form-data',
                validateInitialCount: true,
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                uploadExtraData: { '_token':'<?php echo e(csrf_token()); ?>','type':'work'},
                msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！"
            }).on("filebatchselected", function (event, files) {
                $(this).fileinput("upload");
            })
            //上传完成后的回调
            $('#uploads').on("fileuploaded", function (event, data, previewId, index) {
                //！！！我个人使用的时候！！！返回值必须为json格式
                //我在后台程序 单纯的返回了  json_encode('/storage/img/3142353534.jpg')
                console.log(data.response);
                $('#works').val(data.response);
            });
        });

        function add(id) {
            $.get('/student/questioninfo/'+id,{},function(data){
                if (data) {
                    $("#body").html(data);
                };
            });
        }

        function addwork(){
            str=$("#formAdd").serialize();
            // 提交到下一个页面
            $.post('/student/addwork',{str:str,'_token':'<?php echo e(csrf_token()); ?>'},function(data){
                if (data==1) {
                    // 关闭弹框
                    $(".close").click();
                    window.location.reload();
                }else{
                    alert('添加失败');
                }
            });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("home.student.muban", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>