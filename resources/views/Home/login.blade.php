@extends('muban.home')

@section('link')
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>登陆</title>
    <link href="http://cdn.staticfile.org/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/sticky-footer-navbar.css" rel="stylesheet">
    <script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

@endsection


@section('main')
    <script type="text/javascript">
        var count=120;
        var codeLength=6;
        var username_en=false;
        var password_en=false;
        var phone_en=false;
        function checkSubmitMobil() {
            if ($("#phone").val() == "") {
                alert("手机号码不能为空!");
                $("#phone").focus();
                return false;
            }
            if (!$("#phone").val().match(/^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/)) {
                alert("手机号码格式不正确！");
                $("#phone").focus();
                return false;
            }
            return true;
        }

        function verifyUsername(){
            $("#usernameResult").text("");
            var username = $("#username").val();
            if(username==""){
                return;
            }
            var url = "checkname";
            var data = {};
            data.username = username;
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        username_en=false;
                        $("#usernameResult").text("用户名不存在");
                        $("#usernameResult").css("color", "color:#FF0000;");
                    } else {
                        username_en=true;
                        $("#usernameResult").text("用户名存在");
                        $("#usernameResult").css("color", "color:#28FF28;");
                    }
                },
                error: function (data) {
                    $("#usernameResult").text("验证失败");
                    $("#usernameResult").css("color", "color:#FF0000;");
                }
            });
        }

        function submitInfo(){
            if(!username_en){
                alert("请输入合法的用户名！");
                return;
            }

            var data = {};
            data.username=$("#username").val();
            data.password=$("#password").val();
            data.type=$('input[name="type"]:checked').val();
            data._token = '{{csrf_token()}}';
            var url="checklogin";
            console.log(data);
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        alert("登录成功！");
                        window.location.href = data.href;
                    } else {
                        alert("登录失败！");
                    }
                },
                error: function (data) {
                    alert("登录过程失败！");
                }
            });
        }

        $(document).ready(function() {
            $("#username").on("input propertychange", function () {
                verifyUsername();
            });
        });

        $(function(){
            $("#submitInfo").on("click",function(){
                submitInfo();
            });
        });
    </script>
@endsection

@section('slider')
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">
                    <h1>
                        欢迎您登录使用教学辅助系统
                    </h1>
                </div>
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">用户名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" style="width:300px;" id="username" />
                            <p> &nbsp&nbsp&nbsp&nbsp<span id="usernameResult"></span></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" style="width:300px;" name="password" id="password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">用户类型</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <input type="radio" name="type" value="1" checked>学生 <br>
                                <input type="radio" name="type" value="0">老师
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" id="submitInfo">登录</button>
                        </div>
                    </div>
                </form>
                <div class="form-group" style="padding-left: 200px">
                    <a type="button" class="btn btn-danger" href="findpass">忘记密码</a>
                    <a type="button" class="btn btn-primary" href="register" >注册</a>
                </div>
            </div>
        </div>
    </div>

@endsection