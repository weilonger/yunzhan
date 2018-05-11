@extends("home.teacher.muban")

@section('main')
    <!-- 内容 -->
    <div class="col-md-10">
        <ol class="breadcrumb">
            <li><a href="/teacher"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/teacher/course">课程管理</a></li>
            <li class="active">选课列表</li>
            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="#" class="btn btn-info"><span class="glyphicon glyphicon-list-alt"> 选课列表</span></a>
                <a href="/student/course" class="btn btn-primary"><span class="glyphicon glyphicon-home"> 课程列表</span></a>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>
            </div>
        @if(isset($course1) && count($course1))
                <table class="table-bordered table table-hover">
                    <tr>确认选修课</tr>
                    <tr>
                        <th class="col-sm-1">学生id</th>
                        <th class="col-sm-2">姓名</th>
                        <th class="col-sm-2">性别</th>
                        <th class="col-sm-2">班级名称</th>
                        <th class="col-sm-2">课程名称</th>
                        <th class="col-sm-1">同意选课</th>
                    </tr>
                    @foreach($course1 as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->username}}</td>
                        <td>
                            @if($value->gender)
                                男
                            @else
                                女
                            @endif
                        </td>
                        <td>{{$value->tname}}</td>
                        <td>{{$value->cname}}</td>
                        <td>
                            <a href="javascript:;" onclick="confirm({{$value->id}},{{$value->tid}},{{$value->cid}})" data-toggle="modal" data-target="#firm" class="glyphicon glyphicon-ok"></a>&nbsp&nbsp
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="panel-footer">
                    <nav style="text-align:center;">
                        {{--{{$data->links()}}--}}
                    </nav>
                </div>
                @if(isset($course2) && count($course2))
                    <table class="table-bordered table table-hover">
                        <tr>选课已确认</tr>
                        <tr>
                            <th class="col-sm-1">学生id</th>
                            <th class="col-sm-2">姓名</th>
                            <th class="col-sm-2">性别</th>
                            <th class="col-sm-2">班级名称</th>
                            <th class="col-sm-2">课程名称</th>
                        </tr>
                        @foreach($course2 as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->username}}</td>
                                <td>
                                    @if($value->gender)
                                        男
                                    @else
                                        女
                                    @endif
                                </td>
                                <td>{{$value->tname}}</td>
                                <td>{{$value->cname}}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            @else
                @if(isset($course2) && count($course2))
                    <table class="table-bordered table table-hover">
                        <tr>选课已确认</tr>
                        <tr>
                            <th class="col-sm-1">学生id</th>
                            <th class="col-sm-2">姓名</th>
                            <th class="col-sm-2">性别</th>
                            <th class="col-sm-2">班级名称</th>
                            <th class="col-sm-2">课程名称</th>
                        </tr>
                        @foreach($course2 as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->username}}</td>
                                <td>
                                    @if($value->gender)
                                        男
                                    @else
                                        女
                                    @endif
                                </td>
                                <td>{{$value->tname}}</td>
                                <td>{{$value->cname}}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    没有更多的选课<br>
                    {{--<a href="" class="glyphicon glyphicon-plus">选课</a>--}}
                    <a href="/teacher/course">返回课程列表</a>
                @endif
            @endif

        </div>
    </div>

    <div class="modal fade" id="firm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">同意选课</h4>
                </div>
                <div class="modal-body">
                    <form action="" onsubmit="return false;" id="formFirm">
                        <div id="firm1" class="form-group">

                        </div>
                        <div class="form-group pull-right">
                            <input type="submit" value="确认" onclick="agree()" class="btn btn-success">
                        </div>

                        <div style="clear:both"></div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>

        function confirm(studentid,classid,courseid){
            $.get('/teacher/confirm/'+studentid+'/'+classid+'/'+courseid,{},function(data){
                if (data) {
                    $("#firm1").html(data);
                };
            });
        }

        function  agree() {
            str=$("#formFirm").serialize();
            // 提交到下一个页面
            $.post('/teacher/agree',{str:str,'_token':'{{csrf_token()}}'},function(data){
                if (data==1) {
                    // 关闭弹框
                    $(".close").click();
                    window.location.reload();
                } else{
                    alert('确认失败');
                }
            });
        }
    </script>
@endsection