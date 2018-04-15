<?php $__env->startSection('link'); ?>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>找回密码</title>
    <link href="http://cdn.staticfile.org/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/sticky-footer-navbar.css" rel="stylesheet">
    <script type="text/javascript" src="http://cdn.staticfile.org/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jqueryui/1.10.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
    <script type="text/javascript" src="http://cdn.staticfile.org/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('main'); ?>
    <script type="text/javascript">
        var phone_en;
        var mail_en;
        var phone;
        var mail;
        var username;
        var group;

        function verify_phone(){
            $("#phoneResult").text("");
            if($("#username_1").val()==""){
                return;
            }
            var username = $("#username_1").val();

            var data = {};
            var group = $('#group_1 input[name="group_1"]:checked ').val();

            phone_en = false;
            data.username = username;
            data.group = group;
            console.log(data);
            url = "find_phone.php";
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        phone_en = true;
                        phone = data.phone;
                        $("#phoneResult").text("合法用户名");
                        $("#phoneResult").css("color", "color:#28FF28;");
                    }
                    else {
                        phone_en = false;
                        $("#phoneResult").text("不存在该用户名");
                        $("#phoneResult").css("color", "color:#FF0000;");
                    }
                },
                erro: function (data) {
                    phone_en = false;
                    alert("发送失败");
                }

            });
        }

        function verify_mail(){
            $("#mailResult").text("");
            if($("#username_2").val()==""){
                return;
            }

            var username = $("#username_2").val();
            var data = {};
            var group = $('#group_2 input[name="group_2"]:checked ').val();

            mail_en = false;
            data.username = username;
            data.group = group;
            console.log(data);
            url = "find_mail.php";
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        mail_en = true;
                        mail = data.mail;
                        $("#mailResult").text("合法用户名");
                        $("#mailResult").css("color", "color:#28FF28;");
                    }
                    else {
                        mail_en = false;
                        $("#mailResult").text("不存在该用户名");
                        $("#mailResult").css("color", "color:#FF0000;");
                    }
                },
                erro: function (data) {
                    mail_en = false;
                    alert("发送失败");
                }

            });
        }

        function phone_submit(){
            if(!phone_en){
                alert("您输入的用户名有误！");
                return;
            }

            var url="verified_phone";
            var data={};
            var code=$("#phoneCode").val();
            data.phone=phone;
            data.code=code;
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        group=$('#group_1 input[name="group_1"]:checked ').val();
                        username=$("#username_1").val();
                        $("#phonePanel").empty();
                        var $password=$("<p>"+
                            "<div class=\"form-group\">"+
                            "<label for=\"password_1\">输入新密码</label>"+
                            "<div>"+
                            "<input type=\"password\" style=\"width:200px;display:inline;\" id=\"password_1\" />"+
                            "</div>"+
                            "<label for=\"password_again_1\">重复密码</label>"+
                            "<div>"+
                            "<input type=\"password\" style=\"width:200px;display:inline;\" id=\"password_again_1\" />"+
                            "<p> &nbsp&nbsp<span id=\"passwordResult_1\"></span></p>"+
                            "</div>"+"<br>"+
                            "</div>"+
                            "<button type=\"button\" class=\"btn btn-default\" id=\"reset_1\">确定</button>"+
                            "</p>");
                        //将新的一行添加到<ul>中
                        var $parent=$("#phonePanel");
                        $parent.append($password);
                    }
                    else {
                        alert("您输入的验证码有误！");
                    }
                },
                erro: function (data) {
                    alert("发送失败");
                }
            });
        }

        function mail_submit(){
            if(!mail_en){
                alert("您输入的用户名有误！");
                return;
            }

            var url="verified_mail";
            var data={};
            var code=$("#mailCode").val();
            data.mail=mail;
            data.code=code;
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        username=$("#username_2").val();
                        group=$('#group_2 input[name="group_2"]:checked ').val();
                        $("#mailPanel").empty();
                        var $password=$("<p>"+
                            "<div class=\"form-group\">"+
                            "<label for=\"password_2\">输入新密码</label>"+
                            "<div>"+
                            "<input type=\"password\" style=\"width:200px;display:inline;\" id=\"password_2\" />"+
                            "</div>"+
                            "<label for=\"password_again_2\">重复密码</label>"+
                            "<div>"+
                            "<input type=\"password\" style=\"width:200px;display:inline;\" id=\"password_again_2\" />"+
                            "<p> &nbsp&nbsp<span id=\"mailResult\"></span></p>"+
                            "</div>"+"<br>"+
                            "</div>"+
                            "<button type=\"button\" class=\"btn btn-default\" id=\"reset_2\">确定</button>"+
                            "</p>");
                        //将新的一行添加到<ul>中
                        var $parent=$("#mailPanel");
                        $parent.append($password);
                    }
                    else {
                        alert("您输入的验证码有误！");
                    }
                },
                erro: function (data) {
                    alert("发送失败");
                }
            });
        }

        function password_verify_1(){
            if($("#password_1").val()==""||$("#password_again_1").val()==""){
                $("#passwordResult_1").text("");
                return;
            }
            var pwd = $("#password_1").val();
            var pwd_a = $("#password_again_1").val();

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

        function password_verify_2(){
            if($("#password_2").val()==""||$("#password_again_2").val()==""){
                $("#passwordResult_2").text("");
                return;
            }
            var pwd = $("#password_2").val();
            var pwd_a = $("#password_again_2").val();

            if (pwd == pwd_a) {
                password_en=true;
                $("#mailResult").text("重复密码正确");
                $("#mailResult").css("color", "color:#28FF28;");
            } else {
                password_en=false;
                $("#mailResult").text("输入不一致");
                $("#mailResult").css("color", "color:#FF0000;");
            }
        }

        function phone_reset(){
            if(!password_en){
                alert("密码输入有误！");
                return;
            }

            var data={};
            data.username=username;
            data.group=group;
            data.newPassword=$("#password_1").val();
            console.log(data);
            var url="reset_pwd.php";
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        alert("修改成功，确认返回登录界面！");
                    }
                    else {
                        alert("修改失败，确认返回登录界面！");
                    }
                    window.location.href="login.html";
                },
                erro: function (data) {
                    mail_en = false;
                    alert("发送失败");
                }

            });
        }

        function mail_reset(){
            if(!password_en){
                alert("密码输入有误！");
                return;
            }

            var data={};
            data.username=username;
            data.group=group;
            data.newPassword=$("#password_2").val();
            console.log(data);
            var url="reset_pwd.php";
            $.ajax({
                type: 'post',
                dataType: "json",
                data: JSON.stringify(data),
                url: url,
                contentType : "application/text",
                success: function (data) {
                    if (data.code == 200) {
                        alert("修改成功，确认返回登录界面！");
                    }
                    else {
                        alert("修改失败，确认返回登录界面！");
                    }
                    window.location.href="login.html";
                },
                erro: function (data) {
                    alert("发送失败");
                }

            });

        }

        $(document).ready(function(){
            $("#username_1").on("input propertychange",function() {
                verify_phone();
            });
        });

        $(document).ready(function() {
            $("#group_1").change(function() {
                verify_phone();
            })
        });

        $(document).ready(function(){
            $("#username_2").on("input propertychange",function() {
                verify_mail();
            });
        });

        $(document).ready(function() {
            $("#group_2").on("change",function() {
                verify_mail();
            })
        });

        $(document).ready(function() {
            $("#submit_1").on("click",function(){
                phone_submit();
            })
        });

        $(document).ready(function() {
            $("#submit_2").on("click",function(){
                mail_submit();
            })
        });


        $(document).ready(function() {
            $("#phonePanel").on("input propertychange","#password_again_1", function () {
                password_verify_1();
            });
        });

        $(document).ready(function() {
            $("#phonePanel").on("input propertychange","#password_1", function () {
                password_verify_1();
            });
        });

        $(document).ready(function() {
            $("#mailPanel").on("input propertychange","#password_again_2", function () {
                password_verify_2();
            });
        });

        $(document).ready(function() {
            $("#mailPanel").on("input propertychange","#password_2", function () {
                password_verify_2();
            });
        });

        $(document).ready(function() {
            $("#phonePanel").on("click","#reset_1",function(){
                phone_reset();
            })
        });

        $(document).ready(function() {
            $("#mailPanel").on("click","#reset_2",function(){
                mail_reset();
            })
        });


        $(function() {
            $("#sendMessage").on("click", function () {
                var InterValObj;
                var timeCounter;
                timeCounter = count;
                var buttonName = "#sendMessage";
                var phone = $("#phone").val();
                var url = "send_message.php";
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
                        $("#sendMessage").val(timeCounter + "秒后重新发送");
                        InterValObj = window.setInterval(function () {
                            if (timeCounter == 0) {
                                window.clearInterval(InterValObj);
                                $("#sendMessage").removeAttr("disabled");//启用按钮
                                $("#sendMessage").val("重新发送验证码");
                            }
                            else {
                                timeCounter--;
                                $("#sendMessage").val(timeCounter + "秒后重新发送");
                            }
                        }, 1000);
                    },
                    error: function (data) {
                        alert("发送失败")
                    }
                });
            })
        });

        $(function(){
            $("#sendMail").on("click",function(){
                var InterValObj;
                var timeCounter;
                var mailCode="";
                timeCounter = count;
                var mail = '<'+$("#mail").val()+'>';
                if ($("#mail").val() != "") {
                    for (var i = 0; i < codeLength; i++) {
                        mailCode += parseInt(Math.random() * 9).toString();
                    }
                }
                var url = "send_mail.php";
                var data = {};
                data.subject = "浙江大学软件工程课程网站邮件验证";
                data.body = mailCode;
                data.mail = mail;
                console.log(data);
                $.ajax({
                    type: 'post',
                    dataType: "json",
                    data: JSON.stringify(data),
                    url: url,
                    contentType : "application/text",
                    success: function (data) {
                        $("#sendMail").attr("disabled", true);
                        $("#sendMail").val(timeCounter + "秒后重新发送");
                        InterValObj = window.setInterval(function(){
                            if(timeCounter == 0){
                                window.clearInterval(InterValObj);
                                $("#sendMail").removeAttr("disabled");//启用按钮
                                $("#sendMail").val("重新发送邮件");
                            }
                            else {
                                timeCounter--;
                                $("#sendMail").val(timeCounter + "秒后重新发送");
                            }
                        }, 1000);
                    },
                    error: function (data) {
                        alert("发送失败")
                    }
                });
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider'); ?>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">
                    <h1>
                        密码管理
                    </h1>
                    </p>
                </div>
                <div class="tabbable" id="tabs-317129">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#phonePanel" data-toggle="tab">手机身份验证</a>
                        </li>
                        <li>
                            <a href="#mailPanel" data-toggle="tab">邮箱身份验证</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="phonePanel">
                            <p>
                                <div class="form-group">
                                    <label for="username_1">用户名</label>
                                    <div>
                                        <input type="text" class="form-control" style="width:200px;display:inline;" id="username_1" />
                                        <p> &nbsp&nbsp<span id="phoneResult"></span></p>
                                    </div>
                                    <label for="phoneCode">短信验证码</label>
                                    <div>
                                        <input type="text" class="form-control" style="width:200px;display:inline;" id="phoneCode" />
                                        <button type="button" id="sendMessage" class="btn btn-default">发送验证码</button><br>
                                    </div>
                                    <div class="radio" id="group_1">
                                        <input type="radio" id="group_11", name="group_1", value="teacher">我是老师<br>
                                        <input type="radio" id="group_12", name="group_1", value="student" checked>我是学生<br>
                                    </div>
                                </div>
                            </p>
                            <button type="button" class="btn btn-default" id="submit_1">确定</button>
                        </div>
                        <div class="tab-pane" id="mailPanel">
                            <p>
                                <div class="form-group">
                                    <label for="username_2">用户名</label>
                                    <div>
                                        <input type="text" class="form-control" style="width:200px;display:inline;" id="username_2" />
                                        <p> &nbsp&nbsp<span id="mailResult"></span></p>
                                    </div>
                                    <label for="mailCode">邮件验证码</label>
                                    <div>
                                        <input type="text" class="form-control" style="width:200px;display:inline;" id="mailCode" />
                                        <button type="button" id="sendMail" class="btn btn-default">发送验证码</button><br>
                                    </div>
                                    <div class="radio" id="group_2">
                                        <input type="radio" id="group_21", name="group_2", value="teacher" checked>我是老师<br>
                                        <input type="radio" id="group_22", name="group_2", value="student">我是学生<br>
                                    </div>
                                </div>
                            </p>
                            <button type="button" class="btn btn-default" id="submit_2">确定</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('muban.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>