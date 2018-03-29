<?php $__env->startSection('main'); ?>
    <!-- 内容 -->
    <!-- 内容 -->
    <div class="col-md-10">

        <ol class="breadcrumb">
            <li><a href="/admin"><span class="glyphicon glyphicon-home"></span> 首页</a></li>
            <li><a href="/admin/user">用户管理</a></li>
            <li class="active">用户列表</li>

            <button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
        </ol>

        <!-- 面版 -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> </button>
                
                <a href="javascript:;" data-toggle="modal" data-target="#add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> </a>
                <p class="pull-right tots" >共有 10 条数据</p>
                <form action="" class="form-inline pull-right">
                    <div class="form-group">
                        <input type="text" name="" class="form-control" placeholder="请输入你要搜索的内容" id="">
                    </div>

                    <input type="submit" value="搜索" class="btn btn-success">
                </form>


            </div>
            <table class="table-bordered table table-hover">
                <th><input type="checkbox" name="" id=""></th>
                <th>ID</th>
                <th>NAME</th>
                <th>PASS</th>
                <th>上次登录时间</th>
                <th>状态</th>
                <tr>
                    <td><input type="checkbox" name="" id=""></td>
                    <td>1</td>
                    <td>name1</td>
                    <td>pass1</td>
                    <td>2016-10-10 10:10:10</td>
                    <td><span class="btn btn-success">开启</span></td>
                </tr>
            </table>
            <!-- 分页效果 -->
            <div class="panel-footer">
                <nav style="text-align:center;">
                    <ul class="pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
    
        
            
                
                    
                    
                
                
                    
                        
                            
                            
                        
                        
                            
                            
                        
                        
                            
                            
                        
                        
                            
                            
                            
                            
                        
                        
                            
                            
                        

                        
                    
                

            
        
    

    
        // 添加的处理操作

        
            

            

            

            

                

                    

                    

                

                
            
        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.public.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>