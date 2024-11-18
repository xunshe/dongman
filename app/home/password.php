<?php
    // +----------------------------------------------------------------------
    // | 个人修改密码 页面
    // +----------------------------------------------------------------------
     include('../../config/config.php');
    //引入头部公共部分
    include('header-layout.php');
  
?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
      //引入个人文档菜单
        include('profile-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;密码修改</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="/dongmanguanli/app/home/handler/changePassword.handler.php" method="post" enctype=multipart/form-data>
                    <fieldset>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;输入旧密码</label>
                                <input id="input_name" class="form-control"  placeholder="请输入旧密码"  name="oldpassword" type="text">
                            </div>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;输入新密码</label>
                                <input id="input_name" class="form-control"  placeholder="请输入新密码"  name="password" type="password">
                            </div>
                            <div class="col-md-12" id="error_name"></div>
                            <div class="form-group">
                                <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;重复新输入密码</label>
                                <input id="input_email" class="form-control" placeholder="请再次输入密码" value="" name="repassword" type="password" >
                            </div>
                            <div class="col-md-12" id="error_info"></div>
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>&nbsp;保存修改</button>
                        </fieldset>
            
                </form>
            </div>
        </div>
    </div>

</div>
<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
