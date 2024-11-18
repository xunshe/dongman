<?php 
    // +----------------------------------------------------------------------
    // | 新闻资讯列表页面
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php');

    //获取全部新闻
    $sql  = "SELECT * FROM news ORDER BY id DESC";
    $news_count = fetchAll($link,$sql);

?>
<div class="row" style="margin-top: 5%;margin-bottom: 25%">
	<div class="col-sm-6 col-sm-offset-3">
			<div class="list">
		  <header>
		    <h3><i class="fa fa-navicon"></i> 漫画最新资讯 <small>共有<?php echo count($news_count) ?>条</small></h3>
		  </header>
			<div class="items">
			<?php
   			    $limit = 5;	

			    //写查询的sql语句,获取分类下的所有信息
			    $sql = "SELECT * FROM news ORDER BY id DESC ";

			    $num_max = mysqli_num_rows(mysqli_query($link, $sql)); //记录总条数

			    if(isset($_REQUEST['start'])) { 
			    	$start = $_REQUEST['start']; 
			    }else { 
			    	$start = 0; 
			    } 
			    $sql2 = "SELECT * FROM news ORDER BY id DESC limit $start,$limit"; 
		
			    $pre = $start-$limit;

			    $next = $start + $limit;
			    //查询所有信息
			    $news = fetchAll($link,$sql2);
			    //判断是否是个数组
			        if(is_array($news)){
			            //遍历每一个标签
			                foreach($news as $new) {
			   
			?>
			    <div class="item">
			      <div class="item-heading">
			        <div class="pull-right label label-success"><?php echo $new['addtime'] ?></div>
			        <h4><a href="/dongmanguanli/app/home/news_content.php?id=<?php echo $new['id'] ?>"><?php echo $new['new_title'] ?></a></h4>
			      </div>
			      <div class="item-content">
			        <div class="media pull-left"><img src="<?php echo $new['new_img'] ?>" alt=""></div>
			        <div class="text"><?php echo mb_substr($new['new_title'],0,50) ?></div>
			      </div>
			      
			    </div>
				<?php }}else{
					echo "<h2>抱歉，暂时还没有资讯</h2>";
				} ?>
			  </div>
		</div>
		<ul class="pager pull-right">
	   <?php
	     if($pre >= 0 ){
	   ?>
		  <li class="previous"><a href="/dongmanguanli/app/home/news.php?id=<?php echo $id ?>&start=<?php echo $pre ?>">上一页</a></li>
		  <?php }else{ ?>
		  <li class="previous disabled"><a href="#">上一页</a></li>
		  <?php } ?>
		
		  <?php 
		  	if($next < $num_max) { ?>

		  	<li class="next"><a href="/dongmanguanli/app/home/news.php?id=<?php echo $id ?>&start=<?php echo $next ?>">下一页</a></li>
		  <?php  }else{ ?>
		  	<li class="next disabled"><a href="#">下一页</a></li>
		  <?php } ?>
	</ul>
</div>
</div>

<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>