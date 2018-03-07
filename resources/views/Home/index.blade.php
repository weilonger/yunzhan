@extends('muban.home');

@section('title','云站');

@section('main')
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
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">学生作业上传系统</a>
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




@endsection