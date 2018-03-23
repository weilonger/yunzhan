@extends('muban.home');
{{--@section('title','云站');--}}
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
@section('slider')
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            @foreach($slider as $key=> $value)
                @if($key==0)
                    <div class="item active">
                        <img src="/Uploads/Slider/{{$value->img}}" width="500px" height="300px" alt="第{{$key+1}}张">
                    </div>
                @else
                    <div class="item">
                        <img src="/Uploads/Slider/{{$value->img}}" width="500px" height="300px" alt="第{{$key+1}}张">
                    </div>
                @endif
            @endforeach
        </div>
        <!-- 轮播（Carousel）导航 -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">上一个</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">下一个</span>
        </a>
    </div>
    <script type="text/javascript">
        //自动播放
        $("#myCarousel").carousel({
            interval :1500,
        });
    </script>

@endsection