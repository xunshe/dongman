<?php 
    // +----------------------------------------------------------------------
    // | 查看具体的某个作品
    // +----------------------------------------------------------------------
    include('../../config/config.php');
    include('header-layout.php'); 
    $id = $_GET['id'];
    //获取此所有评论
    $sql2 = "SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id WHERE zuopin_id='$id' AND status=1";
    $comments = fetchAll($link,$sql2);
    //获取此作品信息
    $sql3 = "SELECT authors.author_name,zuopins.* FROM zuopins INNER JOIN authors ON zuopins.author_id=authors.id WHERE zuopins.id='$id'";
    $zuopin = fetchOne($link,$sql3);

    //查看这个作品热度就加1
    $where = "id=".$id;
    $data = array(
      'view'=>$zuopin['view']+1
    );
    update($link,$data,'zuopins',$where);

?>
<div class="row">
<div class="col-sm-8 col-sm-offset-4" style="margin-top: 7%">
	<div class="row">
	<div class="col-sm-3">
		<img src="/dongmanguanli/<?php echo $zuopin['zuopin_img'] ?>" width="250px" height="250px">
	</div>
	<div class="col-sm-8">
		<h1><?php echo $zuopin['zuopin_name'] ?></h1> 
		<p style="margin-top:4%;font-size:14px"><i class="fa fa-clock"></i>发行时间：<?php echo $zuopin['addtime'] ?></p>
		<p style="margin-top:1%;font-size:14px"><i class="fa fa-tag"></i>标签：<?php 
        $category_id = $zuopin['category_id'];
        $sql4 = "SELECT * FROM categorys WHERE id='$category_id'";
        $category = fetchOne($link,$sql4);
        echo $category['category_name'];

    ?></p>
		<p style="margin-top:1%;font-size:14px"><i class="fa fa-user"></i>作者：<?php echo $zuopin['author_name'] ?></p>
		<div class="button-group">
        <button type="button" class="button  button-primary" onclick="shoucang(<?php echo $zuopin['id'] ?>)" ><i class="fa fa-heart"></i>收藏作品</button>
		 </div>
	</div>
	</div>

  <audio src="<?php echo $zuopin['zuopin_files'] ?>" id="zuopin1" controls="controls" loop="false" hidden="true">

  </audio>

	<div class="row" style="margin-top: 3%">
		<div class="col-sm-6">
		<h2 style="margin-bottom: 5%">章节</h2>
		<?php 
     //获取章节信息
     $sql5 = "SELECT * FROM zhangjies WHERE zuopin_id='$id'";
     $zhangjies = fetchAll($link,$sql5);
     if(is_array($zhangjies)){
         foreach($zhangjies as $zhangjie){
    ?>
     <div class="col-sm-4">
        <button class="btn" onclick="show(<?php echo $zhangjie['id'] ?>)"  type="button"><?php echo $zhangjie['zhangjie_num'] ?>&nbsp&nbsp<?php echo $zhangjie['zhangjie_title'] ?></button>
    </div>
    <?php }}else{
      echo "<h3 class='text-center'>抱歉，暂时没有章节信息！</h3>";
      } ?>
		</div>
	</div>
	<div class="row" style="margin-top: 5%">
				<div class="col-sm-8">
                 <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;留言</h3>
                    </div>
                      <div class="panel-body">
                             
                            <?php 
                                if(is_array($comments)){
                                    //遍历每一个评论
                                    foreach($comments as $comment) {
                            ?>
                                <div class="comment">
                                  <a href="###" class="avatar">
                                    <img src="/dongmanguanli/<?php echo $comment['avatar'] ?>" class="img-cricle">
                                  </a>
                                  <div class="content">
                                    <div class="pull-right text-muted"><?php echo $comment['addtime'] ?></div>
                                    <div><strong><?php echo $comment['name'] ?></strong>
                                    <div class="text" style="font-size: 18px"><?php echo $comment['comment_content']; ?></div>
                                  
                                  </div>
                                </div>
                            
                          </div>
                          <?php }}else{
                            echo '<h4>抱歉，目前还没有留言！</h4>';
                          } ?>
                        </div>
                </div>
            </div>
         </div>
                <div class="row">

                	<div class="col-sm-8">
                      <form role="form">
                        <div class="form-group">
                            <label for="name">留言</label>
                            <textarea id="comment_content" class="form-control"></textarea>
                            <input id="zuopin_id" value="<?php echo $zuopin['id']; ?>" type="hidden">
                        </div>
                        <button type="button" class="btn btn-default pull-right" onclick="commit()">发布留言</button>
                      </form>
                    </div>
                </div>
	</div>
</div>


<div class="modal fade" id="myModal2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
        <h4 class="modal-title" id="zhangjie_title"></h4>
      </div>
      <div class="modal-body" id="zhangjie_content">
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" id="zuopin_id2" value="<?php echo $zuopin['id'] ?>">

        <textarea class="form-control" rows="3" id="banquan_content"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-primary" onclick="banquan()">提交</button>
      </div>
    </div>
  </div>
</div>

<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
   <script>
    //用户发表留言
    function commit() {
        var comment_content = $("#comment_content").val();
        var zuopin_id = $("#zuopin_id").val();

        $.post('/dongmanguanli/app/home/handler/commit.handler.php',{comment_content:comment_content,zuopin_id:zuopin_id},function(data){
                if(data.result == 1) {
                    alert(data.message);
                    window.location.reload();
                }
                if(data.result == 0){
                    alert(data.message);
                }
        },'json');      
    } 
  

    function show(id) {
        $.post('/dongmanguanli/app/home/handler/show.handler.php',{id:id},function(data){
                if(data.result == 1) {
                    $('#zhangjie_content').html(data.des.zhangjie_content);
                    $('#zhangjie_title').html(data.des.zhangjie_num+'-'+data.des.zhangjie_title);
                }
                if(data.result == 0){
                    alert(data.message);
                }
        },'json');
        $('#myModal2').modal();
    }

    //用户点击收藏
    function shoucang(id) {
         $.post('/dongmanguanli/app/home/handler/collection.handler.php',{id:id},function(data){
                if(data.result == 1) {
                    alert(data.message);
                    window.location.reload();
                }
                if(data.result == 0){
                    alert(data.message);
                }
        },'json');      
    }

    //用户版权举报
    function banquan() {
        var zuopin_id = $('#zuopin_id2').val();
        var banquan_content = $('#banquan_content').val();
        $.post('/dongmanguanli/app/home/handler/baoquan.handler.php',{zuopin_id:zuopin_id,banquan_content:banquan_content},function(data){
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
