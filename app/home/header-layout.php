<?php
	//这里是系统的共享头部区域
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/dongmanguanli/public/css/zui.min.css">
    <link  rel="stylesheet" href="/dongmanguanli/public/css/buttons.css">
    <link rel="stylesheet" href="/dongmanguanli/public/css/head.css">
    <link rel="stylesheet" href="/dongmanguanli/public/css/style.css">
    <link rel="stylesheet" href="/dongmanguanli/public/css/font-awesome.min.css">
    <script src="/dongmanguanli/public/js/jquery-1.12.4.js"></script>
</head>
<body>

    <div class="row" id="head">
    <nav class="navbar navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <!-- 导航头部 -->
        <div class="container">
        <div class="navbar-header">
          <!-- 移动设备上的导航切换按钮 -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-example">
            <span class="sr-only">切换导航</span>
            <i class="icon icon-align-justify"></i>
          </button>
          <!-- 品牌名称或logo -->
          <a class="navbar-brand" href="/dongmanguanli/">漫画管理系统</a>
        </div>
        <!-- 导航项目 -->
        <div class="collapse navbar-collapse navbar-collapse-example">
          <!-- 一般导航项目 -->
          <ul class="nav navbar-nav">
            <li class="active"><a href="/dongmanguanli/">主页</a></li>
            <li><a href="/dongmanguanli/app/home/news.php">漫画资讯</a></li>
          </ul>
          <form class="navbar-form navbar-left" action="/dongmanguanli/app/home/search.php" role="search">
            <div class="form-group">
              <div class="col-xs-10">
              <input type="text" id="search_name" name="keyword" class="form-control" placeholder="搜索漫画名称">
              </div>
            </div>
            <button type="submit" class="btn btn-default">搜索</button>
          </form>


         <?php
            //判断有没有开启session 
            if(!isset($_SESSION)) {
            //如果没有开启，那么开启  
                 @session_start();  
            }
            if(isset($_SESSION['user'])) {
         ?>
          <ul class="nav navbar-nav navbar-right">
            <li><img src="/dongmanguanli/<?php echo $_SESSION['user']['avatar'] ?>" width="30px" height="30px" class="img-circle"></li>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['user']['name'] ?> <b class="caret"></b></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="/dongmanguanli/app/home/profile.php">个人资料</a></li>
                <li><a href="javascript:void(0)" onclick="logout()">注销</a></li>
              </ul>
            </li>
          </ul>
        	<?php }else{ ?>
           <ul class="nav navbar-nav navbar-right">
             <li><a href="/dongmanguanli/app/home/login.php" class="button button-3d button-action button-pill">登录</a></li>
             <li><a href="/dongmanguanli/app/home/register.php" class="button button-3d button-primary button-pill">注册</a></li>
          </ul>
         <?php }?>
        </div><!-- END .navbar-collapse -->
      </div>
      </div>
    </nav>
    </div>


    <script>
        //退出登录的方法
        function logout(){
             //ajax提交退出登录方法
             $.get("/dongmanguanli/app/home/handler/logout.handler.php",{}, function(data){
                if( data.result == 1 ){
                    alert('退出成功！');
                    window.location.href="/dongmanguanli/"; 
                }
                if( data.result == 0 ){
                    alert('退出失败！');
                }
            },'json');
        }   

        //搜索功能的实现
        function search() {
            var search_name = $('#search_name').val();

                    $.post('/dongmanguanli/app/home/handler/search.handler.php',{search_name:search_name},function(data){
                        if(data.result == 1) {
                            window.location.href='/dongmanguanli/app/home/search.php?id='+data.message;
                        }
                        if(data.result == 0) {
                            alert('抱歉，没有找到搜索的信息！');
                        }
                    },'json');
        }
    </script>










