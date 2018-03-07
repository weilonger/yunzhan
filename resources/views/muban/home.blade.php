<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link href="/css/sticky-footer-navbar.css" rel="stylesheet">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery.json.js"></script>
	@yield('link')
	<script type="text/javascript">
        function postJSON(url, jsonStr, successFunction) {
            async=true,
                dataType="json",
                contentType="application/text"
            $.ajax({
                url : url,
                type : 'POST',
                async : async,
                data : jsonStr,
                processData : false,
                dataType : dataType,
                contentType : contentType,
                success : function(response, status, xhr) {
                    var response;
                    if (dataType != "json")
                        response = $.parseJSON(response);
                    if (status != "success")
                        alert("未知错误");
                    else successFunction(response);
                },
                error : function(xhr, error, exception) {
                    // handle the error.
                    alert(exception.toString());
                }
            });
        }

        function lgn_btn() {
            var req = {
                username: $("#lgn-username").val(),
                password: $("#lgn-password").val()
            };
            if ($("#lgn-type-stu").prop("checked"))
                req.group = "student";
            else if ($("#lgn-type-tea").prop("checked"))
                req.group = "teacher";
            else
                req.group = "ta_assist";
            var jsonStr = $.toJSON(req);
            postJSON("common/login/login.php", jsonStr, function showResponse(response) {
                if (response.code == 200) {
                    if (req.group == "student")
                        window.location.href="student/Course_list.html";
                    else
                        window.location.href="teacher/teacher-center.html";
                } else if (response.code == 1) {
                    $("#lgn-ret").text("账号或密码错误");
                    $("#lgn-ret").css("color", "color:#FF0000;");
                } else {
                    $("#lgn-ret").text("不存在的账号");
                    $("#lgn-ret").css("color", "color:#FF0000;");
                }
            });
        }
        $(document).ready(function(){
            $("#sendMessage").click(function(){
                $('#leaveMessage').submit();
                return false;
            });
        });
	</script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="modal fade" id="modal-container-365839" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
							<h4 class="modal-title" id="myModalLabel">
								请留下你的建议吧！
							</h4>
						</div>
						<div class="modal-body">
							<form id="leaveMessage" role="form" method="POST" action="leaveMessage.php">
								<div class="form-group">
									<label for="message_text">留言内容</label>
									<textarea name="message_text" id="message_text" class="form-control" rows="7" style="resize: none;overflow-y: visible;"></textarea>
								</div>
								<div class="form-group">
									<label for="email">邮箱</label>
									<input class="form-control" type="email" name="email" id="email" placeholder="留下你的邮箱，方便我们联系你~">
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button> <button type="button" class="btn btn-primary" id="sendMessage">保存</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	@yield('main')
</div>







<div class="footer">
	<div class="container">
		<div class="row footer-top">
			<div class="col-md-6">
				<h4>学生作业提交系统</h4>
				<p>
					开发完成于2018.3.20, 项目开源代码见<a href="#">github</a>
					<br/>
				</p>
			</div>
			<div class="col-md-6">
				<div class="row about">
					<div class="col-md-6">
						<h4>课外学习</h4>
						<ul class="list-unstyled">
							<li><a href="http://www.softwareengineerinsider.com/">Software Engineer Insider</a></li>
							<li><a href="http://www.tutorialspoint.com/cmmi/">SEI CMMI Tutorial</a></li>
						</ul>
					</div>
					<div class="col-md-6">
						<h4>友情链接</h4>
						<ul class="list-unstyled">
							<li><a href="swu.edu.cn/">西南大学官方网站</a></li>
							<li><a href="#">空</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="row footer-bottom">
			<ul class="list-inline text-center">
				<li>西南大学计科一班 贺卫龙</li>
			</ul>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-container-login" role="dialog" aria-labelledby="modify-block" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="modify-block">用户登录</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label class="col-sm-2 control-label">账号</label>
						<div class="col-sm-8"><input type="text" class="form-control" id="lgn-username" /></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">密码</label>
						<div class="col-sm-8"><input type="password" class="form-control" id="lgn-password"/></div>
					</div>
					<div class="form-group" id="lgn-type">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<label><input type="radio" name="hwtype" id="lgn-type-stu" checked/>学生</label>&nbsp;&nbsp;&nbsp;
							<label><input type="radio" name="hwtype" id="lgn-type-tea"/>教师</label>&nbsp;&nbsp;&nbsp;
						</div>
					</div>
					<div class="form-group" id="lgn-type">
						<label class="col-sm-10 pull-right" id="lgn-ret"></label>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a type="button" class="btn btn-danger" href="common/passwordModify/find_pwd.html">忘记密码</a>
				<button type="button" class="btn btn-primary" id="delete_btn" onclick="lgn_btn()">登录</button>
			</div>
		</div>
	</div>
</div>
</body>

</html>

