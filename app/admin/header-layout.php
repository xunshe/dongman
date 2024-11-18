<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/dongmanguanli/public/admin/base/images/logo.png">
    <link rel="stylesheet" href="/dongmanguanli/public/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dongmanguanli/public/admin/fonts/css/font-awesome.min.css">
    <link rel="stylesheet" href="/dongmanguanli/public/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/dongmanguanli/public/admin/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/dongmanguanli/public/admin/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="/dongmanguanli/public/admin/plugins/datepicker/datepicker3.css">
    <script src="/dongmanguanli/public/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <style>
        *{
            font-family:"Microsoft YaHei";
        }
        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
            vertical-align:middle;
            text-align:center;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini" style="margin-top: -25px">
<div class="wrapper">
    <header class="main-header">
        <a href="index.php" class="logo">
            <span class="logo-mini">后台管理</span>
            <span class="logo-lg">漫画管理后台</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">下拉菜单</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/dongmanguanli/<?php echo $_SESSION['admin']['avatar'] ?>"
                                 class="user-image" alt="User Image">
                            <?php if(isset($_SESSION['admin'])) ?>
                            <span class="hidden-xs"><?php echo $_SESSION['admin']['name']  ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="/dongmanguanli/<?php echo $_SESSION['admin']['avatar'] ?>"
                                     class="img-circle" alt="User Image">
                                <p>
                                    admin
                                    <small><?php echo date('Y-m-d',time()) ?></small>
                                </p>
                            </li>
                            <li class="user-footer">
                                
                                <div class="pull-right">
                                    <a href="javascript:void(0)" class="btn btn-default btn-flat" onclick="logout()">退出系统</a>
                                </div>
                            </li>
                             <script>
                                //退出登录的方法
                                function logout(){
                                     //ajax提交退出登录方法
                                     $.get("/dongmanguanli/app/admin/handler/logout.handler.php",{}, function(data){
                                        if( data.result == 1 ){
                                            alert('退出成功！');
                                            window.location.href="/dongmanguanli/app/home/login.php"; 
                                        }
                                        if( data.result == 0 ){
                                            alert('退出失败！');
                                        }
                                    },'json');
                                }   
                            </script>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/dongmanguanli/<?php echo $_SESSION['admin']['avatar'] ?>" class="img-circle"
                         alt="User Image">
                </div>
                <div class="pull-left info">
                     <?php if(isset($_SESSION['admin'])) ?>
                    <p><?php echo $_SESSION['admin']['name']  ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>
       
            <ul class="sidebar-menu">
                <li class="header">管理菜单</li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <span>漫画管理</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/category.php">
                                <i class="fa fa-circle-o"></i> 漫画类型管理
                            </a>
                        </li>
                        <li>
                            <a href="/dongmanguanli/app/admin/authors.php">
                                <i class="fa fa-circle-o"></i> 漫画作者管理 
                            </a>
                        </li>
                       
                    </ul>
                </li>
                 <li class="treeview">
                    <a href="/dongmanguanli/app/admin/zuopins.php">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        <span>漫画上传</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-send-o " aria-hidden="true"></i>
                        <span>资讯管理</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/news.php">
                                <i class="fa fa-circle-o"></i>资讯列表
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="/dongmanguanli/app/admin/comments.php">
                        <i class="fa fa-comments" aria-hidden="true"></i>
                        <span>评论管理</span>
                    </a>
                </li>
                
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>会员管理</span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/user.php">
                                <i class="fa fa-circle-o"></i> 会员列表
                            </a>
                        </li>
                    </ul>
                </li>
                   <li class="treeview">
                    <a href="#">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        <span>管理员管理</span>
                      
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="/dongmanguanli/app/admin/edit_password.php">
                                <i class="fa fa-circle-o"></i> 修改密码
                            </a>
                        </li>
                        <li>
                            <a href="/dongmanguanli/app/admin/admin.php">
                                <i class="fa fa-circle-o"></i> 信息查看
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>