{{--+"id": 3--}}
{{--+"studentid": 3--}}
{{--+"classid": 11--}}
{{--+"username": "student1"--}}
{{--+"password": "eyJpdiI6IkZFUFRheHVmVGMrRzB0d1BOK1dcL2F3PT0iLCJ2YWx1ZSI6ImxhQk1PXC9HK3ZJbDk5MU1XNXlcL3d0Zz09IiwibWFjIjoiNjNmYjBmZmMxYjAxODczYThiMDBhNDMxNzExZTY2YWFkNjc4ODE1MzdmMWM5YmIwMTI1NGZmNDlmMTAwZWM4MiJ9"--}}
{{--+"phone": "13368090853"--}}
{{--+"gender": "1"--}}
{{--+"typeid": 11--}}
{{--+"name": "学生1"--}}
{{--+"number": "1120180003"--}}
{{--+"email": null--}}
{{--+"cid": null--}}
{{--+"starttime": "2018-03-28"--}}
{{--+"endtime": null--}}
{{--+"lastlogin": "2018-04-02 11:01:12"--}}
{{--+"state": "1"--}}
{{--+"photo": "male.jpg"--}}
<table class="table-bordered table table-hover" id="tableCheck">
    教师
    <th>id</th>
    <th>名字</th>
    <th>教工号</th>
    <th>性别</th>
    <th>手机号</th>
    <th>上次登录时间</th>
    @if(!empty($teacher))
        <tr>
            <td>{{$teacher->id}}</td>
            <td>{{$teacher->name}}</td>
            <td>{{$teacher->number}}</td>
            <td>
                @if($teacher->gender)
                    男
                @else
                    女
                @endif
            </td>
            <td>{{$teacher->phone}}</td>
            <td>{{$teacher->lastlogin}}</td>
        </tr>
    @else
         还未分配教师
    @endif
</table>
    @if(!empty($data))
        <table class="table-bordered table table-hover" id="tableCheck">
            学生
            <th>id</th>
            <th>名字</th>
            <th>学号</th>
            <th>性别</th>
            <th>手机号</th>
            <th>上次登录时间</th>
                @foreach($data as $value)
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
                        <td>{{$value->lastlogin}}</td>
                    </tr>
                @endforeach
        </table>
        <div class="panel-footer">
            <nav style="text-align:center;">
                {{ $data->links() }}
            </nav>
        </div>
    @else
        还没有学生
    @endif

