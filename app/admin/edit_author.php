  <?php
    // +----------------------------------------------------------------------
    // | 后台添加作者
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,如果没有，那么回退到登录页面，validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
    //获取要修改的公告
    $id = $_GET['id'];
    $sql = "SELECT * FROM authors WHERE id='$id'";
    $author =  fetchOne($link,$sql);
?>
  
<div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
            <h1>作者管理</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 作者管理</a></li>
                <li class="active">作者添加</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">作者添加</h3>
                        </div>
                        <form role="form" action="/dongmanguanli/app/admin/handler/edit_author.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">作者笔名</label>
                                    <input type="text" class="form-control" id="title" value="<?php echo $author['author_name'] ?>" name="author_name" placeholder="请输入作者笔名！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">真实姓名</label>
                                    <input type="text" class="form-control" id="size" value="<?php echo $author['author_relname'] ?>" name="author_relname" placeholder="请输入作者姓名">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">国籍</label>
                                    <input type="text" class="form-control" id="type" value="<?php echo $author['author_guoji'] ?>" name="author_guoji" placeholder="请输入作者国籍！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">居住地</label>
                                    <input type="text" class="form-control" id="price" value="<?php echo $author['author_city'] ?>" name="author_city" placeholder="请输入作者居住地！">
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">作者简介</label>
                                    <textarea class="form-control" rows="10" name="author_description" id="description"><?php echo $author['author_description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="logo">上传作者头像图片</label>
                                    <input type="file" id="img" name="author_avatar">   
                                </div>
                                <input type="hidden" name="id" value="<?php echo $id ?>"> 
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">修改</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>


<?php include('footer-layout.php') ?>