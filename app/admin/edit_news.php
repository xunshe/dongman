  <?php
    // +----------------------------------------------------------------------
    // | 后台修改网站公告
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,如果没有，那么回退到登录页面，validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');

    //获取要修改的公告
    $id = $_GET['id'];
    $sql = "SELECT * FROM news WHERE id='$id'";
    $new =  fetchOne($link,$sql);
?>

<link rel="stylesheet" href="/public/wangEditor/dist/css/wangEditor.min.css">  
<div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
            <h1>动漫手办公告添加页面</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 公告管理</a></li>
                <li class="active">公告添加</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">公告添加</h3>
                        </div>
                        <form role="form" action="/dongmanguanli/app/admin/handler/edit_news.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">公告标题</label>
                                    <input type="text" class="form-control" id="new_title" name="new_title" value="<?php echo $new['new_title'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="logo">公告封面图片</label>
                                    <input type="file" id="new_img" name="new_img" >   
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">公告详细信息</label>
                                    <textarea id="textarea1"  class="form-control"  style="height: 400px;max-height: 400px;" name="new_content"><?php echo $new['new_content'] ?> </textarea>
                                </div>
                                <input type="hidden" name="id" value="<?php  echo $new['id'] ?>">
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
     ];
  
    editor.create();    
  </script>

  <script>
    $('#guanggao').hide();
    //判断有没有选择广告，选择是的话，就显示选择广告图片
    $('input[type=radio][name=is_guanggao]').change(function() {
        if (this.value == '0') {
            $('#guanggao').hide();
        }
        else if (this.value == '1') {
            $('#guanggao').show();
        }
    });
  </script>
<?php include('footer-layout.php') ?>