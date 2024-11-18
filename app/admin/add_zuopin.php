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
?>

<link rel="stylesheet" href="/public/wangEditor/dist/css/wangEditor.min.css">  
<div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
            <h1>作品管理</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 作品管理</a></li>
                <li class="active">作品添加</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">作品添加</h3>
                        </div>
                        <form role="form" action="/dongmanguanli/app/admin/handler/add_zuopin.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">作品名称</label>
                                    <input type="text" class="form-control" id="title" name="zuopin_name" placeholder="请输入作品名称！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">作者</label>
                                              <select class="form-control" name="author_id">
                                                <?php 
                                                    //获取所有的作者
                                                    $sql = "SELECT * FROM authors";
                                                    $authors = fetchAll($link,$sql);
                                                    if(is_array($authors)){
                                                        foreach ($authors as $author) {                                                           
                                                ?>
                                                <option value="<?php echo $author['id'] ?>"><?php echo $author['author_relname'] ?></option>
                                                  <?php }}?>
                                              </select>
                                </div>
                                <div class="form-group">
                                    <label for="input_title">作品分类选择</label>
                                        
                                              <select class="form-control" name="category_id">
                                                <?php 
                                                    //获取所有的分类
                                                    $sql = "SELECT * FROM categorys";
                                                    $categorys = fetchAll($link,$sql);
                                                    if(is_array($categorys)){
                                                        foreach ($categorys as $category) {                                                           
                                                ?>
                                                <option value="<?php echo $category['id'] ?>"><?php echo $category['category_name'] ?></option>
                                                  <?php }}?>
                                              </select>
                                       
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">作品简介</label>
                                    <textarea class="form-control" rows="10" name="zuopin_description" id="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="logo">作品封面</label>
                                    <input type="file" id="img" name="zuopin_img">   
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">添加</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>

<script src="/public/wangEditor/dist/js/wangEditor.min.js"></script>
<script>
      var editor = new wangEditor('textarea1');
      editor.config.menus = [
        'fontsize',
        'bold',
        'italic',
        'eraser',
        'forecolor',
        'fontfamily',
        'head',
        'orderlist',
        'alignleft',
        'aligncenter',
        'alignright',
        'emotion',
        'undo',
        'redo',
        'img'
       ];
        editor.config.uploadImgFileName = 'myFileName',
        editor.config.uploadImgUrl = '/admin/handler/uploadImg.handler.php';   
        editor.create(); 

  </script>
<?php include('footer-layout.php') ?>