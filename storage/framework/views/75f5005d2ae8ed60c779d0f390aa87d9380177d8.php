<?php $__env->startSection('link'); ?>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>注册</title>
    <link href="http://cdn.staticfile.org/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/sticky-footer-navbar.css" rel="stylesheet">

    <style type="text/css">
        /*密码强度*/
        .pw-strength {clear: both;position: relative;top: 8px;width: 180px;}
        .pw-bar{background: url("homes/images/pwd-1.png") no-repeat;height: 14px;overflow: hidden;width: 179px;}
        .pw-bar-on{background:  url("homes/images/pwd-2.png") no-repeat; width:0px; height:14px;position: absolute;top: 1px;left: 2px;transition: width .5s ease-in;-moz-transition: width .5s ease-in;-webkit-transition: width .5s ease-in;-o-transition: width .5s ease-in;}
        .pw-weak .pw-defule{ width:0px;}
        .pw-weak .pw-bar-on {width: 60px;}
        .pw-medium .pw-bar-on {width: 120px;}
        .pw-strong .pw-bar-on {width: 179px;}
        .pw-txt {padding-top: 2px;width: 180px;overflow: hidden;}
        .pw-txt span {color: #707070;float: left;font-size: 12px;text-align: center;width: 58px;}
    </style>

    <!--[if lt IE 9]>
    <script src="http://apps.bdimg.com/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
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
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main'); ?>
    <script type="text/javascript">
        var count=120;
        var codeLength=6;
        var username_en=false;
        var password_en=false;
        var phone_en=false;
        function checkSubmitMobil() {
            if ($("#phone").val() == "") {
                phone_en=true;
                $("#PhoneCheck").text("手机号码不能为空");
                $("#PhoneCheck").css("color", "color:#FF0000;");
                alert("手机号码不能为空!");
                $("#phone").focus();
                return false;
            }
            if (!$("#phone").val().match(/^(((13[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/)) {
                $("#PhoneCheck").text("手机号码格式不正确");
                $("#PhoneCheck").css("color", "color:#FF0000;");
                alert("手机号码格式不正确！");
                $("#phone").focus();
                return false;
            }
            $("#PhoneCheck").text("手机号符合");
            $("#PhoneCheck").css("color", "color:#28FF28;");
            return true;
        }

        function sendSms(){
            if(!checkSubmitMobil()){
                return;
            }
            var InterValObj;
            var timeCounter;
            timeCounter = count;
            var buttonName = "#sendSms";
            var phone = $("#phone").val();
            var url = "sendsms";
            var data = {};
            
            data.phone = phone;
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
                success: function (data){
                    $("#sendSms").attr("disabled", true);
                    $("#sendSms").text(timeCounter + "秒后重新发送");
                    InterValObj = window.setInterval(function () {
                        if (timeCounter == 0) {
                            window.clearInterval(InterValObj);
                            $("#sendSms").removeAttr("disabled");//启用按钮
                            $("#sendSms").text("重新发送验证码");
                        }
                        else {
                            timeCounter--;
                            $("#sendSms").text(timeCounter + "秒后重新发送");
                        }
                    }, 1000);
                },
                error: function (data) {
                    alert("短信发送失败！");
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
            var url = "checksms";
            var data = {};
            data.phone = phone;
            data.phoneCode = phoneCode;
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
                        phone_en=true;
                        $("#PhoneResult").text("验证成功");
                        $("#PhoneResult").css("color", "color:#28FF28;");
                    } else {
                        phone_en=false;
                        $("#phoneResult").text("验证失败");
                        $("#phoneResult").css("color", "color:#FF0000;");
                    }
                },
                error: function (data) {
                    alert("短信验证失败！");
                }
            });
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
                        username_en=true;
                        $("#usernameResult").text("合法用户名");
                        $("#usernameResult").css("color", "color:#28FF28;");
                    } else {
                        username_en=false;
                        $("#usernameResult").text("用户名已存在");
                        $("#usernameResult").css("color", "color:#FF0000;");
                    }
                },
                error: function (data) {
                    $("#usernameResult").text("用户验证失败");
                    $("#usernameResult").css("color", "color:#FF0000;");
                }
            });
        }

        function submitInfo(){
            if(!username_en){
                alert("请输入合法的用户名！");
                return;
            }
            if($("#name").val()==""){
                alert("请输入您的姓名！");
                return;
            }
            if($("#typeid option:selected").val()==""){
                alert("请选择所属机构！");
                return;
            }
            if(!password_en){
                alert("请正确输入您密码！");
                return;
            }
            // if(!phone_en){
            //     alert("请正确输入手机验证码！");
            //     return;
            // }
            var data = {};
            data.username=$("#username").val();
            data.name=$("#name").val();
            data.gender= $('input[name="gender"]:checked').val();
            data.typeid=$('#typeid option:selected').val();
            data.password=$("#password").val();
            data.phone=$("#phone").val();
            data.type=$('input[name="type"]:checked').val();
            data._token = '<?php echo e(csrf_token()); ?>';
            var url="add";
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
                        window.location.href = "/";
                    } else {
                        alert("注册失败！");
                    }
                },
                error: function (data) {
                    alert("注册过程失败！");
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

        $(function(){
            $("#sendSms").on("click",function(){
                // alert('sendSms');
                sendSms();
            })

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
            $("#phone").on("change", function () {
                checkSubmitMobil();
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider'); ?>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="jumbotron">
                    <h1>
                        欢迎您注册使用教学辅助系统
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
                        <label for="name" class="col-sm-2 control-label">姓名</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" style="width:300px;" id="name" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">性别</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <input type="radio" name="gender" value="1" checked>男<br>
                                <input type="radio" name="gender" value="0">女
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="typeid" class="col-sm-2 control-label">分类</label>
                        <div class="col-sm-10">
                            <select name="typeid" id="typeid" class="form-control" style="width:300px;">
                                <option value="" >请选择课程分类</option>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    
                                        
                                    
                                        <option value="<?php echo e($value->id); ?>"><?php echo e(str_repeat("|---",$value->kind)); ?><?php echo e($value->name); ?></option>
                                    
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">密码</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" style="width:300px;" name="password" id="password" />
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
                            <input type="password" class="form-control" style="width:300px;" name="password_again" id="password_again" /><br>
                            <p> &nbsp&nbsp&nbsp&nbsp<span id="passwordResult"></span></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">手机号码</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" style="width:300px;" id="phone" />
                        </div>
                        <div class="col-sm-10">
                            <p style="padding-left: 180px"> &nbsp&nbsp<span id="PhoneCheck"></span></p>
                        </div>
                        
                        
                            
                            
                            
                        
                    </div>
                    <div class="form-group">
                        <label for="type" class="col-sm-2 control-label">用户类型</label>
                        <div class="col-sm-10">
                            <div class="radio">
                                <input type="radio" name="type" value="1" checked>学生<br>
                                <input type="radio" name="type" value="0">老师
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="button" class="btn btn-default" id="submitInfo">注册</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('muban.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>