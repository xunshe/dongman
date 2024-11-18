<?php
    // +----------------------------------------------------------------------
    // | 个人资料我的收藏
    // +----------------------------------------------------------------------
    include('../../config/config.php');
    //引入头部公共部分
    include('header-layout.php');

       //判断用户有没有登录，如果没有登录转跳到登录页面
    if (empty($_SESSION['user'])){
            echo "<script>alert('抱歉，请先登录后在查看')</script>";
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
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;我的收藏</h3>
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>作品</th>
                      <th>作者</th>
                      <th>收藏时间</th>
                      <th>操作</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $user_id = $_SESSION['user']['id'];
                    $sql = "SELECT  collects.*,zuopins.zuopin_name,zuopins.author_id FROM collects INNER JOIN zuopins on collects.zuopin_id=zuopins.id WHERE collects.user_id='$user_id' ";
                    $collects = fetchAll($link,$sql);
                    if(is_array($collects)) {
                        foreach($collects as $collect){
                  ?>
                    <tr>
                      <td><?php echo $collect['zuopin_name'] ?></td>
                      <td><?php 
                         $author_id = $collect['author_id'];
                         $sql4 = "SELECT * FROM authors WHERE id='$author_id'";
                         $result = fetchOne($link,$sql4);
                         echo $result['author_name'];
                      ?>
                      <td><?php echo $collect['addtime'] ?></td>
                      <td><a href="javascript:void(0)" onclick="del_collect(<?php echo $collect['id'] ?>,'collects')">删除</a><a href="/dongmanguanli/app/home/zhangjie.php?id=<?php echo $collect['zuopin_id'] ?>">查看</a></td>
                      <td></td>
                    </tr>
                    <?php }}?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    function del_collect(id,table) {
        $.post('/dongmanguanli/app/admin/handler/del.handler.php',{id:id,table:table},function(data){
                if(data.result == 1) {
                    alert(data.message);
                    window.location.reload();
                }
                if(data.result == 0){
                    alert(data.message);
                }
        },'json');      
    }
</script>

<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
