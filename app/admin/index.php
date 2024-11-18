<?php
	// +----------------------------------------------------------------------
    // | 后台首页
    // +----------------------------------------------------------------------
	
	//引用常用的函数
	require_once('../../config/config.php');

	//判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
	validateAdmin();

	//引入头部
	include('header-layout.php');
?>
<style type="text/css">
.content-wrapper .content-header .panel .col-md-6.col-md-offset-3 .box.box-solid .box-body h3 {
	color: #F00;
}
.content-wrapper .content-header .panel .col-md-6.col-md-offset-3 .box.box-solid .box-body h3 {
	color: #060;
}
</style>



 <div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
                <h2 style="margin-top: 50px" class="text-center">漫画管理系统后台</h2>
                <div class="panel">
                	<div class="col-md-6 col-md-offset-3">
			          <div class="box box-solid">
			            <div class="box-header with-border">
			              <h3 class="box-title">我的设计</h3>
			            </div>
			            <!-- /.box-header -->
			            <div class="box-body">
			              <h3 style="margin-left: 30%">指导老师：</h3>
			              <h3 style="margin-left: 30%">学生姓名：</h3>
			              <h3 style="margin-left: 30%; color: #060;">学号：</h3>
			              <h3 style="margin-left: 30%">专业：</h3>
			              <h3 style="margin-left: 30%">学院：</h3>
			            </div>
			            <!-- /.box-body -->
			          </div>
			          <!-- /.box -->
			        </div>



                </div>
        </section>
        <!--内容-->
    </div>


<?php include('footer-layout.php') ?>

