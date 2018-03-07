@extends('muban.home')

@section('title','注册')

@section('main')
    <link href="v3/layoutit.css" rel="stylesheet">
    <style type="text/css">
        /*密码强度*/
        .pw-strength {clear: both;position: relative;top: 8px;width: 180px;}
        .pw-bar{background: url("images/pwd-1.png") no-repeat;height: 14px;overflow: hidden;width: 179px;}
        .pw-bar-on{background:  url("images/pwd-2.png") no-repeat; width:0px; height:14px;position: absolute;top: 1px;left: 2px;transition: width .5s ease-in;-moz-transition: width .5s ease-in;-webkit-transition: width .5s ease-in;-o-transition: width .5s ease-in;}
        .pw-weak .pw-defule{ width:0px;}
        .pw-weak .pw-bar-on {width: 60px;}
        .pw-medium .pw-bar-on {width: 120px;}
        .pw-strong .pw-bar-on {width: 179px;}
        .pw-txt {padding-top: 2px;width: 180px;overflow: hidden;}
        .pw-txt span {color: #707070;float: left;font-size: 12px;text-align: center;width: 58px;}
    </style>
    <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="v3/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="v3/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="v3/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="v3/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="http://www.runoob.com/favicon.ico">

    <script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="v3/jquery.htmlClean.js"></script>
    <script type="text/javascript" src="v3/scripts.min.js"></script>
    <script type="text/javascript">
        var count=120;
        var codeLength=6;
        var username_en=false;
        var password_en=false;
        var phone_en=false;

        function checkSubmitMobil() {
            if ($("#phone").val() == "") {
                alert("手机号码不能为空！");
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

        function sendMessage(){
            if(!checkSubmitMobil()){
                return;
            }
            var InterValObj;
            var timeCounter;
            timeCounter = count;
            var buttonName = "#sendMessage";
            var phone = $("#phone").val();
            var url = "/send";
            var data = {};
            data.phone = phone;
            console.log(data);
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data){
                    $("#sendMessage").attr("disabled", true);
                    $("#sendMessage").text(timeCounter + "秒后重新发送");
                    InterValObj = window.setInterval(function () {
                        if (timeCounter == 0) {
                            window.clearInterval(InterValObj);
                            $("#sendMessage").removeAttr("disabled");//启用按钮
                            $("#sendMessage").text("重新发送验证码");
                        }
                        else {
                            timeCounter--;
                            $("#sendMessage").text(timeCounter + "秒后重新发送");
                        }
                    }, 1000);
                },
                error: function (data) {
                    alert("ajax传输失败！");
                }
            });
        }

        function verifyPhone(){
            if($("#phone").val()==""||$("#phoneCode").val()==""){
                $("#phoneResult").text("");
                return;
            }
            var phoneCode = $("#phoneCode").val();
            var phone = $("#phone").val();
            if (phoneCode.length < 4) {
                $("#phoneResult").text("");
                return;
            }
            var url = "/verify";
            var data = {};
            data.phone = phone;
            data.phoneCode = phoneCode;
            console.log(data);
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        phone_en=true;
                        $("#phoneResult").text("验证成功");
                        $("#phoneResult").css("color", "color:#28FF28;");
                    } else {
                        phone_en=false;
                        $("#phoneResult").text("验证失败");
                        $("#phoneResult").css("color", "color:#FF0000;");
                    }
                },
                error: function (data) {
                    alert("ajax传输失败！");
                }
            });
        }

        function verifyUsername(){
            $("#usernameResult").text("");
            var username = $("#username").val();
            if(username=""){
                return;
            }
            var url = "verify_username.php";
            var data = {};
            data.username = username;
            console.log(data);
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        username_en=true;
                        $("#usernameResult").text("合法用户名");
                        $("#usernameResult").css("color", "color:#28FF28;");
                    } else {
                        username_en=false;
                        $("#usernameResult").text("不存在该用户名");
                        $("#usernameResult").css("color", "color:#FF0000;");
                    }
                },
                error: function (data) {
                    alert("ajax传输失败！");
                }
            });
        }

        function submitInfo(){
            if(!username_en){
                alert("请输入合法的用户名！");
                return;
            }
            if(!password_en){
                alert("请正确输入您密码！");
                return;
            }
            if(!phone_en){
                alert("请正确输入手机验证码！");
                return;
            }
            if($.cookie('phone')!=$("#phone").val){
                alert("请正确输入您的手机号码！");
                return;
            }
            if(!$("#contact").attr("checked")){
                alert("若要注册必须同意相关条款！");
                return;
            }
            var data = {};
            data.username=$("#username").val();
            data.type= $('input[name="type"]:checked').val();
            data.password=$("#password").val();
            data.phone=$("#phone").val();
            var url="register.php";
            console.log(data);
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        alert("注册成功！");
                        window.location.href = "login.html";
                    } else {
                        alert("注册失败！");
                    }
                },
                error: function (data) {
                    alert("ajax传输失败！");
                }
            });
        }

        function verifyPassword(){
            if($("#password").val()==""||$("#password_again").val()==""){
                $("#passwordResult").text("");
                return;
            }
            var pwd = $("#password").val();
            var pwd_a = $("#password_again").val();
            if (pwd == pwd_a) {
                password_en=true;
                $("#passwordResult").text("重复密码正确");
                $("#passwordResult").css("color", "color:#28FF28;");
            } else {
                password_en=false;
                $("#passwordResult").text("输入不一致");
                $("#passwordResult").css("color", "color:#FF0000;");
            }
        }

        $(function() {
            $("#sendMessage").on("click", function () {
                sendMessage();
            });
        });

        $(document).ready(function() {
            $("#phoneCode").on("input propertychange", function () {
                verifyPhone();
            });
        });

        $(document).ready(function() {
            $("#username").on("input propertychange", function () {
                verifyUsername();
            });
        });

        $(document).ready(function() {
            $("#password_again").on("input propertychange", function () {
                verifyPassword();
            });
        });

        $(document).ready(function() {
            $("#password").on("input propertychange", function () {
                verifyPassword();
            });
        });

        $(function(){
            $('#password').keyup(function () {
                var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
                var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                var enoughRegex = new RegExp("(?=.{6,}).*", "g");
                if (false == enoughRegex.test($(this).val())) {
                    $('#level').removeClass('pw-weak');
                    $('#level').removeClass('pw-medium');
                    $('#level').removeClass('pw-strong');
                    $('#level').addClass(' pw-defule');
                    //密码小于六位的时候，密码强度图片都为灰色
                }
                else if (strongRegex.test($(this).val())) {
                    $('#level').removeClass('pw-weak');
                    $('#level').removeClass('pw-medium');
                    $('#level').removeClass('pw-strong');
                    $('#level').addClass(' pw-strong');
                    //密码为八位及以上并且字母数字特殊字符三项都包括,强度最强
                }
                else if (mediumRegex.test($(this).val())) {
                    $('#level').removeClass('pw-weak');
                    $('#level').removeClass('pw-medium');
                    $('#level').removeClass('pw-strong');
                    $('#level').addClass(' pw-medium');
                    //密码为七位及以上并且字母、数字、特殊字符三项中有两项，强度是中等
                }
                else {
                    $('#level').removeClass('pw-weak');
                    $('#level').removeClass('pw-medium');
                    $('#level').removeClass('pw-strong');
                    $('#level').addClass('pw-weak');
                    //如果密码为6为及以下，就算字母、数字、特殊字符三项都包括，强度也是弱的
                }
                return true;
            });
        })

        $(function(){
            $("#submitInfo").on("click",function(){
                submitInfo();
            });
        });
    </script>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="jumbotron">
                <h1>
                    欢迎您注册使用学生作业提交系统
                </h1>
            </div>
            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">用户名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" style="width:200px;" id="username" />
                        <p> &nbsp&nbsp&nbsp&nbsp<span id="usernameResult"></span></p>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="radio">
                            <input type="radio" name="type" value="teacher" checked>教师<br>
                            <input type="radio" name="type" value="student">学生
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" style="width:200px;" name="password" id="password" />
                        <div id="level" class="pw-strength">
                            <div class="pw-bar"></div>
                            <div class="pw-bar-on"></div>
                            <div class="pw-txt">
                                <span>弱</span>
                                <span>中</span>
                                <span>强</span>
                            </div>
                        </div><br>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_again" class="col-sm-2 control-label">重复密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" style="width:200px;" name="password_again" id="password_again" /><br>
                        <p> &nbsp&nbsp&nbsp&nbsp<span id="passwordResult"></span></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-2 control-label">手机号码</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" style="width:200px;" id="phone" />
                    </div>
                    <label for="phoneCode" class="col-sm-2 control-label">短信验证码</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" style="width:200px;display:inline;" id="phoneCode" />
                        <button type="button" id="sendMessage" class="btn btn-default">发送短信验证码</button><br>
                        <p> &nbsp&nbsp<span id="phoneResult"></span></p>
                    </div><br>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="radio">
                            <input type="radio" name="agree" id="contact" value="是否同意我们的条款">同意我们的条款
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" class="btn btn-default" id="submitInfo">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection