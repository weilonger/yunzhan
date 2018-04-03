@extends('home.teacher.muban')

@section('main')
    <!-- 内容 -->
    <!-- 内容 -->
    <div class="col-md-10">

        <ol class="breadcrumb">
            <li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/teacher/type">学生管理</a></li>
            <li class="active">学生列表</li>

            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/teacher/banji" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"></span>班级页面</a>
                <a href="#" class="btn btn-success"><span class="glyphicon glyphicon-list-alt"></span>学生列表 </a>
                <p class="pull-right tots" >共有{{$tot}}条数据</p>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>
            </div>
            <table class="table-bordered table table-hover" id="tableCheck">
                <th>id</th>
                <th>名字</th>
                <th>学号</th>
                <th>性别</th>
                <th>手机号</th>
                <th class="col-sm-2">邮箱</th>
                <th>上次登录时间</th>
                @foreach($info as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->number}}</td>
                        <td>
                            @if($value->gender)
                                男
                            @else
                                女
                            @endif
                        </td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->lastlogin}}</td>
                    </tr>
                @endforeach
            </table>
            <!-- 分页效果 -->
            <div class="panel-footer">
                <nav style="text-align:center;">
                    {{$info->links()}}
                </nav>
            </div>
        </div>
    </div>
@endsection