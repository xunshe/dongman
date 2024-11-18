<?php 
    // +----------------------------------------------------------------------
    // | 音乐资讯详情页面
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php');

    //获取当前新闻
    $id = $_GET['id'];
    $sql  = "SELECT * FROM news WHERE id='$id'";
    $new = fetchOne($link,$sql);

?>
<div class="row" style="margin-top: 5%;margin-bottom: 25%">
	<div class="col-sm-6 col-sm-offset-3">
		<article class="article">
		  <!-- 文章头部 -->
		  <header>
		    <h1><?php echo $new['new_title'] ?></h1>
		    <!-- 文章属性列表 -->
	
	
		  </header>
		  <!-- 文章正文部分 -->
		  <section class="content">
		    <?php echo $new['new_content'] ?>
		  </section>
		  <!-- 文章底部 -->
		</article>
	</div>
</div>

<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>