<?php
	// +----------------------------------------------------------------------
    // | 后台用户管理页面
    // +----------------------------------------------------------------------
	
	//引用常用的函数
	require_once('../../config/config.php');

	//判断判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
	validateAdmin();

	//引入头部
	include('header-layout.php');
?>
 




  <div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
            <h1>会员管理</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 会员管理</a></li>
                <li class="active">会员列表</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">会员列表</h3>
                            <div class="box-tools">
                               
                            </div>
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>编号</th>
                                    <th>昵称</th>
                                    <th>邮箱</th>
                                    <th>注册时间</th>
                                    <th>操作事项</th>
                                </tr>


                                <?php
                                	//写查询用户的sql语句,获取用户，除了管理员
                                	$sql = 'SELECT * FROM users where is_admin = 0';

                                	//查询所有用户
                                	$users = fetchAll($link,$sql);
                                	//判断users是否是个数组
                                	if(is_array($users)){
                                		//遍历每一个用户
                                		foreach($users as $user) {
                                ?>



                                <tr>
                                    <td><?php echo $user['id']?></td>
                                    <td><?php echo $user['name']?></td>
                                    <td><?php echo $user['email']?></td>
                                    <td><?php echo $user['addtime']?></td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="deluser(<?php echo $user['id'] ?>,'users')"  class="label label-danger">删除</a>
                                    </td>
                                </tr>
                                <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--内容-->
    </div>


<?php include('footer-layout.php'); ?>

<script>
    //删除用户的方法
    function deluser(id,table) {
        if(confirm('确定删除此用户包括此用户的心得和评论吗？')){
        $.post('/dongmanguanli/app/admin/handler/del_user.handler.php',{id:id,table:table},function(data){
            if(data.result == 1) {
                alert(data.message);
                window.location.reload();
            }

            if(data.result == 0) {
                alert(data.message);
            }
        },'json');
        }else{
            return false;
        }
    }
</script>
