@extends("home.teacher.muban")

@section('main')
<!-- 内容 -->
<link href="/fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
<script src="/fileinput/js/fileinput.js" type="text/javascript"></script>
<script src="/fileinput/js/locales/zh.js" type="text/javascript"></script>
<div class="col-md-10">
	<ol class="breadcrumb">
		<li><a href="/student"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
		<li><a href="/student/banji">课程管理</a></li>
		<li class="active">课程信息</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>
	<!-- 面版 -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="#" class="btn btn-info"><span class="	glyphicon glyphicon-list-alt"> 课程列表</span></a>
			<a href="" class="btn btn-primary"><span class="	glyphicon glyphicon-plus"> 班级列表</span></a>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
				</div>

				<input type="submit" value="搜索" class="btn btn-success">
			</form>
		</div>
		<table class="table-bordered table table-hover">
			<tr>
				<th>id</th>
				<th class="col-sm-2">名称</th>
				<th class="col-sm-3">描述</th>
				<th class="col-sm-2">班级</th>
				<th class="col-sm-3">创建时间</th>
				<th class="col-sm-1">作业操作</th>
			</tr>
			@foreach($data as $value)
				<tr>
					<td>{{$value->id}}</td>
					<td>{{$value->name}}</td>
					<td>{{$value->info}}</td>
					<td>{{$value->name1}}</td>
					<td>{{$value->starttime}}</td>
					<td><a href="/teacher/question/{{$value->id}}" class="glyphicon glyphicon-eye-open"></a>&nbsp&nbsp&nbsp
					<a href="javascript:;" onclick="add({{$value->id}})" data-toggle="modal" data-target="#add" class="glyphicon glyphicon-plus"></a></td>
				</tr>
			@endforeach
		</table>

		<div class="panel-footer">
			<nav style="text-align:center;">
				{{$data->links()}}
			</nav>
		</div>
	</div>
</div>

<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">添加作业</h4>
			</div>
			<div class="modal-body">
				<form action="" onsubmit="return false;" id="formAdd">
					<div id="body" class="form-group">

					</div>
					<div class="form-group">
						<label for="">附件</label>
						<input type="file" name="extra" id="uploads" multiple class="file-loading">
						<input type="hidden" name="extras" id="extras">
					</div>

					<div class="form-group pull-right">
						<input type="submit" value="提交" onclick="addquestion()" class="btn btn-success">
						<input type="reset" value="重置" class="btn btn-danger">
					</div>

					<div style="clear:both"></div>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    // 当所有HTML代码都加载完毕
    $(function() {
        // 声明字符串
        var extras='';
        $('#uploads').fileinput({
            language: 'zh', //设置语言
            uploadUrl: '{{url('/upload')}}', //上传的地址
//            allowedFileExtensions: ['txt','doc','docx','xlsx','ppt','pdf','html','shtml'],//接收的文件后缀
            allowedFileExtensions: ['doc','txt','docx','ppt','html','zip'],//接收的文件后缀
            browseLabel: '选择文件',
            removeLabel: '删除文件',
            removeTitle: '删除选中文件',
            cancelLabel: '取消',
            cancelTitle: '取消上传',
            uploadLabel: '上传',
            uploadTitle: '上传选中文件',
//            dropZoneTitle: "请通过拖拽图片文件放到这里",
//            dropZoneClickTitle: "或者点击此区域添加图片",
            uploadAsync: true, //默认异步上传
            showUpload: true, //是否显示上传按钮
            showRemove: true, //显示移除按钮
            showPreview: false, //是否显示预览
            showCaption: true,//是否显示标题
            browseClass: "btn btn-primary", //按钮样式
            dropZoneEnabled: true,//是否显示拖拽区域
            //minImageWidth: 50, //图片的最小宽度
            //minImageHeight: 50,//图片的最小高度
            //maxImageWidth: 1000,//图片的最大宽度
            //maxImageHeight: 1000,//图片的最大高度
            maxFileSize: 0,//单位为kb，如果为0表示不限制文件大小
            //minFileCount: 0,
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            enctype: 'multipart/form-data',
            validateInitialCount: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            uploadExtraData: { '_token':'{{csrf_token()}}','type':'Question'},
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！"
        }).on("filebatchselected", function (event, files) {
            $(this).fileinput("upload");
        })
        //上传完成后的回调
        $('#uploads').on("fileuploaded", function (event, data, previewId, index) {
            //！！！我个人使用的时候！！！返回值必须为json格式
            //我在后台程序 单纯的返回了  json_encode('/storage/img/3142353534.jpg')
            console.log(data.response);
            $('#extras').val(data.response);
        });
    });

    function add(id){
        $.get('/teacher/addinfo/'+id,{},function(data){
            if (data) {
                $("#body").html(data);
            };
        });
    }

    function addquestion(){
        str=$("#formAdd").serialize();
        // 提交到下一个页面
        $.post('/teacher/addquestion',{str:str,'_token':'{{csrf_token()}}'},function(data){
            if (data==1) {
                // 关闭弹框
                $(".close").click();
                // 重置表单内容
                $("#reset").click();
                // 清空提示信息
                $("#passInfo").html('');
                $("#nameInfo").html('');
                window.location.reload();
            }else if(data){
                // 用户名提示信息
                var str='';
                if (data.name) {
                    str="<div class='alert alert-danger'>"+data.name+"</div>";
                }else{
                    str="<div class='alert alert-success'>√</div>";
                    if(data.info){
                        str1="<div class='alert alert-danger'>"+data.info+"</div>";
                    }else{
                        str1 = str;
                    }
                }
                $("#homename").html(str);
                $("#homeinfo").html(str1);
            }else{
                alert('添加失败');
            }
        });
	}
</script>
@endsection