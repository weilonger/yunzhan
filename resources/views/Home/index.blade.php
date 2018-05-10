@extends('muban.home');
{{--@section('title','云站');--}}
@section('link')
    <meta charset="UTF-8">
    <title>{{config('web.title')}}</title>
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<link href="https://cdn.bootcss.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script>--}}
    {{--<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">--}}
    {{--<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdn.bootcss.com/bootstrap/4.1.0/js/bootstrap.js"></script>--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/jquery.json.js"></script>
    <style>
        .page-header {
            padding-top: 5px;
            padding-bottom: 9px;
            margin: 40px 0 20px;
            border-bottom: 1px solid #eee;
        }
        pre {
            display: none;
        }

    </style>
@endsection
@section('main')
    <div class="page-header text-right"><h3>平台简介</h3></div>
@endsection
@section('slider')
    <div id="myCarousel" class="carousel slide" styl="">
        <div class="carousel-inner">
            @foreach($slider as $key=> $value)
                @if($key==0)
                    <div class="item active">
                        <img src="/Uploads/Slider/{{$value->img}}" width="100%" height="100%" alt="第{{$key+1}}张">
                    </div>
                @else
                    <div class="item">
                        <img src="/Uploads/Slider/{{$value->img}}" width="100%" height="100%" alt="第{{$key+1}}张">
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