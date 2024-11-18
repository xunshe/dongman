  <?php
    // +----------------------------------------------------------------------
    // | 上传作品的章节
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断判断管理员有没有访问的权限,如果没有，那么回退到登录页面，validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>

<link rel="stylesheet" href="/dongmanguanli/public/wangEditor/dist/css/wangEditor.min.css">  
<div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
            <h1>作品章节上传</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 章节管理</a></li>
                <li class="active">章节添加</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">章节添加</h3>
                        </div>
                        <form role="form" action="/dongmanguanli/app/admin/handler/add_zhangjie.handler.php" method="post" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="input_title">第几章</label>
                                    <input type="text" class="form-control" name="zhangjie_num" placeholder="请输入作品章节序号，如第五章！">
                                </div>
                                <div class="form-group">
                                    <label for="input_title">章节标题</label>
                                    <input type="text" class="form-control"  name="zhangjie_title" placeholder="请输入章节标题">
                                </div>
                                <div class="form-group">
                                    <label for="movieinfo">作品内容</label>
                                    <textarea id="textarea1"  class="form-control"  style="height: 400px;max-height: 400px;" name="zhangjie_content"> </textarea>
                                </div>
                                <input type="hidden" name="zuopin_id" value="<?php echo $_GET['zuopin_id'] ?>">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">上传</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>

<script src="/dongmanguanli/public/wangEditor/dist/js/wangEditor.min.js"></script>
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
        editor.config.uploadImgUrl = '/dongmanguanli/app/admin/handler/uploadImg.handler.php';   
        editor.create(); 
  </script>
<?php include('footer-layout.php') ?>