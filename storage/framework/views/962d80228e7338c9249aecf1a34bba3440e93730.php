;

<?php $__env->startSection('link'); ?>
    <meta charset="UTF-8">
    <title><?php echo e(config('web.title')); ?></title>
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap-theme.min.css"></script>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main'); ?>
    <div class="page-header text-right"><h3>平台简介</h3></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slider'); ?>
    <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if($key==0): ?>
                    <div class="item active">
                        <img src="/Uploads/Slider/<?php echo e($value->img); ?>" width="500px" height="300px" alt="第<?php echo e($key+1); ?>张">
                    </div>
                <?php else: ?>
                    <div class="item">
                        <img src="/Uploads/Slider/<?php echo e($value->img); ?>" width="500px" height="300px" alt="第<?php echo e($key+1); ?>张">
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('muban.home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>