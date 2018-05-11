@extends("home.student.muban")

@section('main')
    <!-- 内容 -->
    <div class="col-md-10">
        <ol class="breadcrumb">
            <li><a href="/student"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/student/course">课程管理</a></li>
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
            @if(count($course))
                <table class="table-bordered table table-hover">
                    <tr>可选修课</tr>
                    <tr>
                        <th>id</th>
                        <th class="col-sm-2">名称</th>
                        <th class="col-sm-2">描述</th>
                        <th class="col-sm-2">班级名称</th>
                        <th class="col-sm-2">开始时间</th>
                        <th class="col-sm-2">结束时间</th>
                        <th class="col-sm-1">选课</th>
                    </tr>
                    @foreach($course as $value)
                    <tr>
                    <td>{{$value->id}}</td>
                    <td>{{$value->name}}</td>
                    <td>{{$value->info}}</td>
                    <td>{{$value->tname}}</td>
                    <td>{{$value->starttime}}</td>
                    <td>{{$value->endtime}}</td>
                    <td>
                        <a href="javascript:;" onclick="add({{$value->id}})" data-toggle="modal" data-target="#add" class="glyphicon glyphicon-plus"></a>&nbsp&nbsp
                    </td>
                    </tr>
                    @endforeach
                </table>
                <div class="panel-footer">
                    <nav style="text-align:center;">
                        {{--{{$data->links()}}--}}
                    </nav>
                </div>
                @if(count($selected))
                    <table class="table-bordered table table-hover">
                        <tr>修课确认中</tr>
                        <tr>
                            <th>id</th>
                            <th class="col-sm-2">名称</th>
                            <th class="col-sm-2">描述</th>
                            <th class="col-sm-2">班级名称</th>
                            <th class="col-sm-2">开始时间</th>
                            <th class="col-sm-2">结束时间</th>
                            <th class="col-sm-1">取消选课</th>
                        </tr>
                        @foreach($selected as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->info}}</td>
                                <td>{{$value->tname}}</td>
                                <td>{{$value->starttime}}</td>
                                <td>{{$value->endtime}}</td>
                                <td>
                                    <a href="javascript:;" onclick="remove(this,'{{$value->typeid}}')" class="glyphicon glyphicon-remove"></a>&nbsp&nbsp
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            @else
                @if(count($selected))
                    <table class="table-bordered table table-hover">
                        <tr>修课确认中</tr>
                        <tr>
                            <th>id</th>
                            <th class="col-sm-2">名称</th>
                            <th class="col-sm-2">描述</th>
                            <th class="col-sm-2">班级名称</th>
                            <th class="col-sm-2">开始时间</th>
                            <th class="col-sm-2">结束时间</th>
                            <th class="col-sm-1">取消选课</th>
                        </tr>
                        @foreach($selected as $value)
                            <tr>
                                <td>{{$value->id}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->info}}</td>
                                <td>{{$value->tname}}</td>
                                <td>{{$value->starttime}}</td>
                                <td>{{$value->endtime}}</td>
                                <td>
                                    <a href="javascript:;" onclick="remove(this,'{{$value->typeid}}')" class="glyphicon glyphicon-remove"></a>&nbsp&nbsp
                                </td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    没有更多的选课<br>
                    {{--<a href="" class="glyphicon glyphicon-plus">选课</a>--}}
                    <a href="/student/course">返回课程列表</a>
                @endif
            @endif

        </div>
    </div>

    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">完成选课</h4>
                </div>
                <div class="modal-body">
                    <form action="" onsubmit="return false;" id="formAdd">
                        <div id="info"></div>
                        <label for="">确认信息，点击确认完成选课</label>
                        <div class="form-group pull-right">
                            <input type="submit" value="确认" onclick="choose()" class="btn btn-success">
                        </div>

                        <div style="clear:both"></div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>

        function add(id){
            $.get('/student/showinfo/'+id,{},function(data){
                if (data) {
                    $("#info").html(data);
                };
            });
        }

        function remove(obj,id){
            $.get("/student/remove/"+id,{"_token":'{{csrf_token()}}'},function(data){
                // 判断是否成功
                if (data==1) {
                    // 移除数据
                    $(obj).parent().parent().remove();
                    // 数量计算
                }else{
                    alert('取消失败');
                }
            })
        }

        function choose(){
            str=$("#formAdd").serialize();
            // 提交到下一个页面
            $.post('/student/select',{str:str,'_token':'{{csrf_token()}}'},function(data){
                if (data==1) {
                    // 关闭弹框
                    $(".close").click();
                    // 重置表单内容
                    window.location.reload();
                } else{
                    alert('添加失败');
                }
            });
        }
    </script>
@endsection