<?php $__env->startSection('main'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">登录</div>
                <div class="panel-body">
                    <form class="form-horizontal" action="/admin/check" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label">用户名</label>
                            <div class="col-md-5">
                                <input id="name" type="name" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="请输入用户名" required autofocus>
                                <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">密码</label>
                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control" placeholder="请输入密码" name="password" required>
                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('yzm') ? ' has-error' : ''); ?>">
                            <label for="yzm" class="col-md-4 control-label">验证码</label>
                            <div class="col-md-3">
                                <input id="yzm" type="text" class="form-control" name="yzm" required placeholder="请输入验证码">
                                <?php if($errors->has('yzm')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('yzm')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-3">
                                <a onclick="javascript:re_captcha();">
                                    <img src="<?php echo e(URL('admin/captcha/1')); ?>"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0">
                                </a>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>记住我
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    登录
                                </button>

                                <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">
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
        $url = "<?php echo e(URL('admin/captcha')); ?>";
        $url = $url + "/" + Math.random();
        document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
    }

    
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('muban.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>