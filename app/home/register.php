<?php
    // +----------------------------------------------------------------------
    // | 注册页面
    // +----------------------------------------------------------------------


    //引入头部公共部分
    include('header-layout.php');
?>


<div class="container" style="margin-top: 10%;margin-bottom: 5%">
    <div class="row">
       
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-log-in"></span>&nbsp;用户注册</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="input_contact"><span class="glyphicon glyphicon-phone"></span>&nbsp;邮箱</label>
                                <input id="email" class="form-control input-lg" placeholder="请输入邮箱" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="input_contact"><span class="glyphicon glyphicon-phone"></span>&nbsp;用户名</label>
                                <input id="name" class="form-control input-lg" placeholder="请输入用户名" name="phone" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_contact"></div>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;密码</label>
                                <input id="password" class="form-control input-lg" placeholder="请输入密码" name="password" type="password" value="">
                            </div>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;重复密码</label>
                                <input id="password_o" class="form-control input-lg" placeholder="请输入密码" name="password_o" type="password" value="">
                            </div>
                          
                          
            
                            <div class="col-md-12" id="error_password"></div>
                            <a href="javascript:void(0)" onclick="register()" class="btn btn-lg btn-success btn-block">注册</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //注册的方法
    function register(){
         var name = $('#name').val();
         var email = $('#email').val();
         var password_o = $('#password_o').val();
         var password = $('#password').val();
         $.post("/dongmanguanli/app/home/handler/register.handler.php",{name:name,email:email,password_o:password_o,password:password}, function(data){
            if( data.result == 1 ){
                alert('注册成功');
                window.location.href="/dongmanguanli/app/home/login.php"; 
            }
            if(data.result == 0 ) {
                alert(data.message);
            }
        },'json');
    }   
</script>

<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
