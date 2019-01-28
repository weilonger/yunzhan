@extends('muban.login')

@section('main')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">登录</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/check" method="post">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">用户名</label>
                            <div class="col-md-5">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="请输入用户名" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">密码</label>
                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control" placeholder="请输入密码" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('yzm') ? ' has-error' : '' }}">
                            <label for="yzm" class="col-md-4 control-label">验证码</label>
                            <div class="col-md-3">
                                <input id="yzm" type="text" class="form-control" name="yzm" required placeholder="请输入验证码">
                                @if ($errors->has('yzm'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('yzm') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <a onclick="javascript:re_captcha();">
                                    <img src="{{ URL('admin/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0">
                                </a>
                                {{--<img src="/admin/yzm" onclick="this.src='/admin/yzm?'+Math.random()" alt="">--}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}>记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登录
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                    忘记密码?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function re_captcha() {
        $url = "{{ URL('admin/captcha') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
    }
</script>
@endsection
