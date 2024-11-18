<?php
    // +----------------------------------------------------------------------
    // | 个人显示资料 页面
    // +----------------------------------------------------------------------
    
    //引入配置和常用的函数
    include('../../config/config.php');
    
    //引入头部公共部分
    include('header-layout.php');

    //获取当前用户的个人信息
    $id = $_SESSION['user']['id'];  //获取用户id
    $sql = "SELECT * FROM users WHERE id='$id'"; //写获取用户的sql语句
    $user = fetchOne($link,$sql); //获取用户信息

     //判断用户有没有登录，如果没有登录转跳到登录页面
    if (empty($_SESSION['user'])){
            echo "<script>alert('抱歉，请先登录后再发布信息')</script>";
            redirect('/dongmanguanli/app/home/login.php');
    } 

  
?>
<div class="container" style="margin-top: 7%;margin-bottom: 20%">
    <?php 
      //引入个人资料菜单
        include('profile-layout.php');
    ?>
    <div class="col-md-9">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;我的信息</h3>
            </div>
            <div class="panel-body">
                <form role="form" action="/dongmanguanli/app/home/handler/profile.handler.php" method="post" enctype=multipart/form-data>
                    <fieldset>
                            <div class="form-group">
                                <label for="input_name"><span class="glyphicon glyphicon-user"></span>&nbsp;用户名</label>
                                <input id="input_name" class="form-control" disabled placeholder="昵称" value="<?php echo $user['name'] ?>" name="name" type="text" autofocus value="jinlong">
                            </div>
                            <div class="col-md-12" id="error_name"></div>
                            <div class="form-group">
                                <label for="input_email"><span class="glyphicon glyphicon-envelope"></span>&nbsp;邮箱</label>
                                <input id="input_email" class="form-control" disabled placeholder="邮箱" value="<?php echo $user['email'] ?>" name="email" type="email" autofocus value="1780316635@qq.com">
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-phone"></span>&nbsp;手机</label>
                                <input id="input_phone" class="form-control" placeholder="手机" name="phone" value="<?php echo $user['phone'] ?>" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_email"></div>
                            <div class="form-group">
                                <label for="input_phone"><span class="glyphicon glyphicon-flag"></span>&nbsp;住址</label>
                                <input id="input_phone" class="form-control" placeholder="住址" value="<?php echo $user['address'] ?>" name="address" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_phone"></div>
                            <div class="form-group">
                                <label for="input_face"><span class="glyphicon glyphicon-picture"></span>&nbsp;头像修改</label>
                                <input id="input_face" class="form-control" name="avatar" type="file" autofocus>
                            </div>
                            <div class="col-md-12" id="error_face"></div>
                            <div class="form-group">
                                <label for="input_info"><span class="glyphicon glyphicon-edit"></span>&nbsp;个人简介</label>
                                <textarea class="form-control" rows="10" name="info"><?php echo $user['info'] ?>
                                </textarea>
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
