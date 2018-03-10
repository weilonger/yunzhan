<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="/admins/bs/css/bootstrap.min.css">
    <script src="/admins/bs/js/jquery.min.js"></script>
    <script src="/admins/bs/js/bootstrap.min.js"></script>
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
                <a class="navbar-brand" href="#"><img style="display:inline" width="30px" src="/admins/img/1.png" alt="">   后台管理系统</a>
            </div>

            <!-- 出logo以外 -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-refresh"></span>清除缓存</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">后台管理<span class="caret"></span></a>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>


    <!-- 内容区域 -->
    <div class="row body">
        @yield('main')
    </div>
</div>

</body>
</html>