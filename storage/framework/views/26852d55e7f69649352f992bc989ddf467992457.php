<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>学生平台</title>
    <link rel="shortcut icon" href="/style/admin/img/1.png">
    <link rel="stylesheet" href="/style/admin/bs/css/bootstrap.min.css">
    <script src="/style/admin/bs/js/jquery.min.js"></script>
    <script src="/style/admin/bs/js/bootstrap.min.js"></script>
    <style>
        .navbar-blue{
            background-color: #ccc;
        }

        .navbar .navbar-brand{
            color:black;
        }

        .navbar .navbar-brand:hover{
            color:black;
        }

        .navbar-default .navbar-nav>li>a{
            color:black;
        }
        .navbar-default .navbar-nav>li>a:hover{
            color:black;

        }

        .body{
            margin-top:90px;
        }
        .list-group{
            display:none;
        }
        .panel-primary>.panel-heading{
            background-color: #ccc;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- 导航条 -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-blue" role="navigation">
        <div class="container-fluid">
            <!-- 导航logo -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/student"><img style="display:inline" width="30px" src="/style/admin/img/1.png" alt="">   学生管理平台</a>
            </div>

            <!-- 出logo以外 -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/flush"><span class="glyphicon glyphicon-refresh"></span>清除缓存</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">个人管理<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/info/<?php echo e(session('userInfo.id')); ?>/<?php echo e(session('userInfo.type')); ?>">
                                <?php echo e(session('userInfo.username')); ?>

                                </a>
                            </li>
                            <li><a href="#" data-toggle="modal" data-target="#editPass">修改密码</a></li>
                            <li><a href="/logout">退出</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <!-- 内容区域 -->
    <div class="row body">

        <!-- 菜单 -->
        <div class="col-md-2">

            <!-- 管理员管理-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="admin"><span class="glyphicon glyphicon-user"></span> 账户管理</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="/info/<?php echo e(session('userInfo.id')); ?>/<?php echo e(session('userInfo.type')); ?>">个人信息管理</a></li>
                </ul>
            </div>
            <!-- 会员管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="user"><span class="glyphicon glyphicon-user"></span>作业详情</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="">作业列表</a></li>
                    <li class="list-group-item"><a href="">作业上交</a></li>
                    <li class="list-group-item"><a href="">作业评论</a></li>
                </ul>
            </div>


            <!-- 分类管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title" id="type"><span class="glyphicon glyphicon-tasks"></span> 课程信息</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="">课程列表</a></li>
                    <li class="list-group-item"><a href="">选课列表</a></li>
                </ul>
            </div>
            <!-- 作业管理 -->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="panel-title"><span class="glyphicon glyphicon-gift"></span> 班级信息</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item"><a href="">班级列表</a></li>
                </ul>
            </div>
        </div>

        <!-- 占位 -->
        <?php echo $__env->yieldContent('main'); ?>
    </div>
</div>
<div class="modal fade" id="editPass">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">修改密码</h4>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group">
                        <label for="">原密码</label>
                        <input type="password" name="" class="form-control" placeholder="请输入原密码">
                    </div>
                    <div class="form-group">
                        <label for="">新密码</label>
                        <input type="password" name="" class="form-control" placeholder="请输入新密码">
                    </div>
                    <div class="form-group">
                        <label for="">确认密码</label>
                        <input type="password" name="" class="form-control" placeholder="请再次输入密码">
                    </div>
                    <div class="form-group pull-right">
                        <input type="submit" value="提交" class="btn btn-success">
                        <input type="reset" value="重置" class="btn btn-danger">
                    </div>

                    <div style="clear:both"></div>
                </form>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
<?php
    $path=$_SERVER['REDIRECT_URL'];
    // 分割字符串
    $arr=explode('/', $path);
    // 获取名
    $name=isset($arr[2])?$arr[2]:'';
?>
<script>
    // 菜单切换
    $(".panel-title").click(function(){
        $(".list-group").hide();
        $(this).parent().next().toggle(500);
    });

    $("#<?php echo e($name); ?>").click();
</script>
</html>