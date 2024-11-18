 <?php
    // +----------------------------------------------------------------------
    // | 后台管理作品
    // +----------------------------------------------------------------------
    
    //引用常用的函数
    require_once('../../config/config.php');

    //判断管理员有没有访问的权限,validateAdmin(),在common/helpers.php
    validateAdmin();

    //引入头部
    include('header-layout.php');
?>
 <div class="content-wrapper">
        <!--内容-->
        <section class="content-header">
            <h1>作品列表</h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> 作品管理</a></li>
                <li class="active">作品列表</li>
            </ol>
        </section>
        <section class="content" id="showcontent">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">作品信息列表</h3>
                            <div class="box-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <a href="/dongmanguanli/app/admin/add_zuopin.php"><button class="btn btn-success">添加作品</button></a>
                                </div>
                            </div>
                            
                        </div>
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>编号</th>
                                    <th>作品封面</th>
                                    <th>作品名称</th>
                                    <th>作者</th>
                                    <th>分类</th>
                                    <th>操作事项</th>
                                </tr>
                                <?php
                                    //写查询产品的sql语句
                                    $sql = "SELECT zuopins.*,authors.author_relname,categorys.category_name FROM zuopins INNER JOIN authors ON zuopins.author_id = authors.id INNER JOIN categorys ON categorys.id=zuopins.category_id ORDER BY zuopins.id DESC";
                                    //查询所有产品
                                    $zuopins = fetchAll($link,$sql);
                                    //判断是否是个数组
                                    if(is_array($zuopins)){
                                        //遍历每一个管理员
                                        foreach($zuopins as $zuopin) {
                                ?>
                                <tr>
                                    <td><?php echo $zuopin['id'] ?></td>
                                    <td><img src="/dongmanguanli/<?php echo $zuopin['zuopin_img'] ?>" width="120px" height="100px"></td>
                                    <td><?php echo $zuopin['zuopin_name'] ?></td>
                                    <td><?php echo $zuopin['author_relname'] ?></td>
                                    <td><?php echo $zuopin['category_name'] ?></td>
                                    <td>
                                         <a class="label label-info" href="/dongmanguanli/app/admin/zhangjie.php?id=<?php echo $zuopin['id']?>">上传章节</a>
                                        <a class="label label-danger" onclick="del(<?php echo $zuopin['id'] ?>,'zuopins')">删除</a>
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

    </div>



<?php include('footer-layout.php'); ?>


<script>
    //删除产品的方法
    function del(id,table) {
        if(confirm('确定删除吗？')){
        $.post('/dongmanguanli/app/admin/handler/del_zuopin.handler.php',{id:id,table:table},function(data){
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