  <?php
    // +----------------------------------------------------------------------
    // | 后台添加网站资讯
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
            <h1>资讯添加页面</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 资讯管理</a></li>
                <li class="active">资讯添加</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">资讯添加</h3>
                        </div>
                        <form role="form" action="/dongmanguanli/app/admin/handler/add_news.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">资讯标题</label>
                                    <input type="text" class="form-control" id="new_title" name="new_title" placeholder="请输入资讯！">
                                </div>
                                <div class="form-group">
                                    <label for="logo">资讯封面图片</label>
                                    <input type="file" id="new_img" name="new_img">   
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">资讯详细信息</label>
                                    <textarea id="textarea1"  class="form-control"  style="height: 400px;max-height: 400px;" name="new_content"> </textarea>
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