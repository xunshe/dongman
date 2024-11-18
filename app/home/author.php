<?php 
    // +----------------------------------------------------------------------
    // | 作者列表页面
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php'); 
    //获取作者信息
    $id = $_GET['id'];
    $sql = "SELECT * FROM authors WHERE id='$id'";
    $star = fetchOne($link,$sql);
?>

<div class="container" style="margin-top: 7%">
	<div class="row">
	<div class="col-sm-3">
		<img src="/dongmanguanli/<?php echo $star['author_avatar'] ?>" width="220px" height="220px" class="img-circle">
	</div>
	<div class="col-sm-8">
		<h1><?php echo $star['author_name'] ?></h1>
		<p style="margin-top:5%;font-size:16px">中文名称：<?php echo $star['author_relname'] ?>&nbsp&nbsp&nbsp&nbsp国籍：<?php echo $star['author_guoji'] ?>&nbsp&nbsp&nbsp&nbsp出生地：<?php echo $star['author_city'] ?>&nbsp&nbsp&nbsp&nbsp</p>
		<p style="margin-top:2%;font-size:16px">简介：<?php echo $star['author_description'] ?></p>
	</div>
	</div>
	<div class="row" style="margin-top: 3%">
			<h2 class="text-center" style="margin-bottom: 20px">作品列表</h2>
			<table class="table">
			  <thead>
			    <tr>
			      <th>作品名称</th>
			      <th>分类</th>
			      <th>简介</th>
			      <th>时间</th>
			      <th>阅读数</th>
			      <th>操作</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php 
			  		$sql2 = "SELECT zuopins.*,categorys.category_name FROM zuopins INNER JOIN categorys ON zuopins.category_id=categorys.id WHERE zuopins.author_id='$id'";
			  		$zuopins = fetchAll($link,$sql2);
			  		if(is_array($zuopins)){
                        //遍历每一个音乐
                        foreach($zuopins as $zuopin) {
			  	?>
			    <tr>
			      <td style="font-size: 15px"><?php echo $zuopin['zuopin_name'] ?></td>
			      <td style="font-size: 15px"><?php echo $zuopin['category_name'] ?></td>
			      <td style="font-size: 15px"><?php echo cur_str($zuopin['zuopin_description'],25) ?></td>
			      <td style="font-size: 15px"><?php echo $zuopin['addtime'] ?></td>
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
