  <?php
    // +----------------------------------------------------------------------
    // | 后台添加分类
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>



  <div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
            <h1>分类添加</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 分类管理</a></li>
                <li class="active">添加标签</li>
            </ol>
        </section>
        <div class="col-md-6 col-md-offset-3">
            <section class="content" id="showcontent">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">添加分类</h3>
                            </div>
                        
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="input_name">分类名称</label>
                                        <input type="text" class="form-control" id="category_name" placeholder="请输入分类名称！">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <button type="button" class="btn btn-primary" onclick="addcate()">添加</button>
                                </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--内容-->
    </div>
    <script>
        //保存分类方法
        function addcate() {
            var category_name = $('#category_name').val();

            $.post('/dongmanguanli/app/admin/handler/add_category.handler.php',{category_name:category_name},function(data){
                if(data.result == 1){
                    alert(data.message);
                    window.location.reload();
                }
                if(data.result == 0){
                    alert(data.message);
                }
            },'json')
        }



    </script>


    <?php include('footer-layout.php') ?>