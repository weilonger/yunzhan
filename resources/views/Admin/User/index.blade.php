@extends('admin.public.admin')

@section('main')
    <!-- 内容 -->
    <!-- 内容 -->
    <div class="col-md-10">

        <ol class="breadcrumb">
            <li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/admin/user/{{$info['type']}}">用户管理</a></li>
            <li class="active">{{$info['status']}}列表</li>

            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <a class="btn btn-info"><span class="glyphicon glyphicon-list-alt"></span>{{$info['status']}}页面</a>
                <a href="/admin/user/add/{{$info['type']}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span>添加页面 </a>
                <p class="pull-right tots" >共有{{$tot}}条数据</p>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>
            </div>
            <table class="table-bordered table table-hover">
                <th>id</th>
                <th>用户名</th>
                @if($info['type'])
                    <th>学号</th>
                @else
                    <th>职工号</th>
                @endif
                <th>名字</th>
                <th>上次登录时间</th>
                <th>状态</th>
                <th>头像</th>
                <th>详情</th>
                @foreach($data as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->username}}</td>
                        <td>{{$value->number}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->lastlogin}}</td>
                        @if($value->state)
                            <td><span class="btn btn-info" onclick="status(this,'{{$value->id}}',1,'{{$type=$info['type']}}')">正常</span></td>
                        @else
                            <td><span class="btn btn-default" onclick="status(this,'{{$value->id}}',0,'{{$type=$info['type']}}')">禁用</span></td>
                        @endif
                        
                        <td><img src="/Uploads/User/{{$value->photo}}"style="height: 40px;width: 40px;" alt=""></td>
                        <td><a href="javascript:;" data-toggle="modal" data-target="#detail" onclick="detail(this,'{{$value->id}}','{{$type}}')" class="glyphicon glyphicon-user"></a></td>
                    </tr>
                @endforeach
            </table>
            <!-- 分页效果 -->
            <div class="panel-footer">
                <nav style="text-align:center;">
                    {{$data->links()}}
                </nav>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">用户信息详情</h4>
                </div>
                <div class="modal-body" id="body">

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script>
        function status(obj,id,state,type){
            // 发送ajax请求
            if (state) {
                // 发送ajax请求
                $.post('/admin/user/ajaxStatu',{id:id,"_token":"{{csrf_token()}}","state":"0",type:type},function(data){
                    if (data==1) {
                        $(obj).parent().html('<td><span class="btn btn-default" onclick="status(this,'+id+',0,{{$type}})">禁用</span></td>')
                    }else{
                        alert('修改失败');
                    }
                })
            }else{
                $.post('/admin/user/ajaxStatu',{id:id,"_token":"{{csrf_token()}}","state":"1",type:type},function(data){
                    if (data==1) {
                        $(obj).parent().html('<td><span class="btn btn-info" onclick="status(this,'+id+',1,{{$type}})">正常</span></td>')
                    }else{
                        alert('修改失败');
                    }
                })
            }
        }

        function detail(obj,id,type) {
            $.get("/admin/user/detail/"+id+"/"+type,{},function(data) {
                if (data) {
                    $("#body").html(data);
                };
            })
        }
    </script>
@endsection