<?php 
    // +----------------------------------------------------------------------
    // | 系统主页
    // +----------------------------------------------------------------------
    include('config/config.php');

    include('header-layout.php'); 
?>

<div class="container" style="margin-top: 7%">
	 <div class="row"> 
	 	<h1 class="text-center" style="margin-top: -10px"> 漫画在线推荐 </h1>
	 </div>
	<!--歌单推荐 -->
	 <div class="row">
	 	
		<ul class="nav nav-pills center-block" style="margin-top: 2%;margin-bottom: 2%;width: 800px">
		   <?php
			   $sql3 = "SELECT * FROM categorys ORDER BY id asc";
			   $categorys = fetchAll($link,$sql3);
			   if(is_array($categorys)){
				   foreach ($categorys as $val) {

		   ?>
		  <li><a href="/dongmanguanli/app/home/list.php?id=<?php echo $val['id'] ?>"><?php echo $val['category_name']?></a></li>
		 
		  <?php }} ?>
		
		</ul>
	 </div>
	 <!--歌单推荐结束 -->
	 <div class="row">
			<div class="cards">
				<?php
					$sql ="SELECT * FROM zuopins ORDER BY id desc limit 8 ";
					$zuopins = fetchAll($link,$sql);
			   		if(is_array($zuopins)){
				   		foreach ($zuopins as $zuopin) {
				?>
				  <div class="col-md-4 col-sm-6 col-lg-3">
				    <div class="card"><a href="/dongmanguanli/app/home/zhangjie.php?id=<?php echo $zuopin['id'] ?>"><img src="/dongmanguanli/<?php echo $zuopin['zuopin_img'] ?>" width="274px" height="184px" alt=""></a></div>
				    <p class="fen-title"><?php echo $zuopin['zuopin_name'] ?></p>
				  </div>
				<?php }}?>
			</div>
	 </div>
</div>
	 <div class="row" style="background-color: #F1F1F1;">
		<div class="row"> 
 			<h1 class="text-center" style="margin-top: 4%"> 漫画作者分类</h1>
		</div>
		<!--音乐人推荐 -->
		 <div class="row">
		 	
			<ul class="nav nav-pills center-block" style="margin-top: 2%;margin-bottom: 2%;width: 800px">
			   <?php
				   $sql3 = "SELECT * FROM authors ORDER BY id asc";
				   $authors = fetchAll($link,$sql3);
				   if(is_array($authors)){
					   foreach ($authors as $author) {

			   ?>
			  <li><a href="/dongmanguanli/app/home/author.php?id=<?php echo $author['id'] ?>"><?php echo $author['author_relname']?></a></li>
			 
			  <?php }} ?>
			</ul>
		 </div>
		 <!--音乐人推荐结束 -->
		 <div class="row">
			 <div class="container" style="margin-bottom: 5%">
			 		<?php
			 			   $sql3 = "SELECT * FROM authors ORDER BY id asc limit 8";
			 			   $authors = fetchAll($link,$sql3);
			 			   if(is_array($authors)){
			 				   foreach ($authors as $author) {
			 		?>
					<div class="col-lg-3">
						<a href="/dongmanguanli/app/home/author.php?id=<?php echo $author['id'] ?>"><img src="/dongmanguanli/<?php echo $author['author_avatar'] ?>" width="140px" height="140px" class="img-circle"></a><br/>
						<a href="/dongmanguanli/app/home/star.php?id=<?php echo $star['id'] ?>"><p class="text-center" style="width: 130px;margin-top: 15px;font-size: 15px"><?php echo $author['author_relname'] ?></p></a>
					</div>
				<?php }} ?>
			 </div>
		</div>
	 </div>

	 	 <div class="row">
			 <div class="container" style="margin-bottom: 5%">
 					<h2 class="text-center" style="margin-bottom: 20px">漫画在线排行榜</h2>
 					<table class="table">
 					  <thead>
 					    <tr>
 					      <th>排名</th>
 					      <th>漫画名称</th>
 					      <th>作者</th>
 					      <th>分类</th>
 					      <th>简介</th>
 					      <th>热度</th>
 					      <th>阅读</th>
 					    </tr>
 					  </thead>
 					  <tbody>
 					  	<?php 
 					  		$sql2 = "SELECT zuopins.*,categorys.category_name,authors.author_name FROM zuopins INNER JOIN categorys ON zuopins.category_id=categorys.id  INNER JOIN authors ON  zuopins.author_id=authors.id  ORDER BY zuopins.view DESC limit 10";
 					  		$zuopins = fetchAll($link,$sql2);
 					  		if(is_array($zuopins)){
 		                        //遍历每一个作品
 		                        foreach($zuopins as $key=>$zuopin) {
 					  	?>
 					    <tr>
 					      <td style="font-size: 15px"><span class="label label-danger"><?php echo $key+1?></span></td>
 					      <td style="font-size: 15px"><?php echo $zuopin['zuopin_name'] ?></td>
 					      <td style="font-size: 15px"><?php echo $zuopin['author_name'] ?></td>
 					      <td style="font-size: 15px"><?php echo $zuopin['category_name'] ?></td>
 					      <td style="font-size: 15px"><?php echo cur_str($zuopin['zuopin_description'],40) ?></td>
 					      <td style="font-size: 15px"><?php echo $zuopin['view'] ?></td>
 					      <td style="font-size: 15px"><a href="/dongmanguanli/app/home/zhangjie.php?id=<?php echo $zuopin['id'] ?>"><button class="btn btn-success">阅读</button></a></td>
 					    </tr>
 					  <?php }} ?>
 					  </tbody>
 					</table>
			 </div>
		</div>



<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
