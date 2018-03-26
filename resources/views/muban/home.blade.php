<!DOCTYPE html>
<html>
<head>
	@yield('link')
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
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="carousel slide" id="carousel-751185">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-751185">
					</li>
					<li data-slide-to="1" data-target="#carousel-751185">
					</li>
					<li data-slide-to="2" data-target="#carousel-751185">
					</li>
				</ol>
			</div>
			<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="/">学生作业上传系统</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a id="modal-365839" href="#modal-container-365839" role="button" class="btn" data-toggle="modal">游客留言</a>
						</li>
						<li>
							<a class="btn" data-toggle="modal" href="#modal-container-login">登录</a>
						</li>
						<li>
							<a class="btn" data-toggle="modal" href="/register">注册</a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">系统相关<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="#">系统帮助</a>
								</li>
								<li class="divider">
								</li>
								<li>
									<a href="#">反馈</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	@yield('main')
	@yield('slider')
</div>
<div class="footer">
	<div class="container">
		<div class="row footer-top">
			<div class="col-md-6">
				<h4>学生作业上传系统</h4>
				<p>
					开发完成于2018.3.20, 项目开源代码见<a href="https://github.com/weilonger/yunzhan" target="_blank">github</a>
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
							<li><a href="http://swu.edu.cn" target="_blank">西南大学官方网站</a></li>
							<li><a href="http://www.weilonger.xin" target="_blank">我的博客</a></li>
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

