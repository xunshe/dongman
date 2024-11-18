<?php 
    // +----------------------------------------------------------------------
    // | 搜索页面
    // +----------------------------------------------------------------------
    include('../../config/config.php');

    include('header-layout.php');

    //获取到要搜索的内容
    $keywords = $_GET['keyword'];

    $sql = "SELECT * FROM zuopins WHERE zuopin_name like '%{$keywords}%'";
?>

<div class="container" style="margin-top: 75px">

	 <div class="row"> 
	 	<h2 class="text-center" style="margin-top: 50px"> 漫画搜索 </h2>
	 </div>
	 <div class="row">
	       <div class="cards">
                <?php
                    $zuopins = fetchAll($link,$sql);
                    if(is_array($zuopins)){
                        foreach ($zuopins as $zuopin) {
                ?>
                  <div class="col-md-4 col-sm-6 col-lg-3">
                    <div class="card"><a href="/dongmanguanli/app/home/zhangjie.php?id=<?php echo $zuopin['id'] ?>"><img src="/dongmanguanli/<?php echo $zuopin['zuopin_img'] ?>" width="274px" height="184px" alt=""></a></div>
                    <p class="fen-title"><?php echo $zuopin['zuopin_name'] ?></p>
                  </div>
                <?php }}else{?>
                 <h2>抱歉，没有找到相关作品</h2>
                <?php } ?>
            </div>
	 </div>

</div>



<?php          
    //引入公共底部部分
    include('footer-layout.php');
?>
