<?php
    // +----------------------------------------------------------------------
    // | 登录页面
    // +----------------------------------------------------------------------


    //引入头部公共部分
    include('header-layout.php');
?>


<div class="container" style="margin-top: 10%;margin-bottom: 15%">
    <div class="row">
       
        <div class="col-md-4 col-md-offset-4">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-log-in"></span>&nbsp;用户登录</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <label for="input_contact"><span class="glyphicon glyphicon-phone"></span>&nbsp;用户名</label>
                                <input id="name" class="form-control input-lg" placeholder="请输入用户名" name="name" type="text" autofocus>
                            </div>
                            <div class="col-md-12" id="error_contact"></div>
                            <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;密码</label>
                                <input id="password" class="form-control input-lg" placeholder="请输入密码" name="password" type="password" value="">
                            </div>
                             <div class="form-group">
                                <label for="input_password"><span class="glyphicon glyphicon-lock"></span>&nbsp;角色</label>
                               	<input type="radio" name="role" checked="checked" value="1">用户 <input type="radio" name="role" value="2">管理员
                            </div>

            
                            <div class="col-md-12" id="error_password"></div>
                            <a href="javascript:void(0)" onclick="login()" class="btn btn-lg btn-success btn-block">登录</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	//登录的方法
	function login(){
		 var name = $('#name').val();
		 var password = $('#password').val();
		 var role = $('input:radio:checked').val();
		 //ajax提交登录方法
		 $.post("/dongmanguanli/app/home/handler/login.handler.php",{name:name,password:password,role:role}, function(data){
            if( data.result == 1 ){
                alert('恭喜你,登录成功');
                window.location.href="/dongmanguanli/"; 
            }else if(data.result == 2){
            	alert('恭喜你，管理员登录成功');
            	window.location.href="/dongmanguanli/app/admin/index.php"; 
            }
            else{
                alert(data.message);
            }
		},'json');
	}	
</script>

<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
