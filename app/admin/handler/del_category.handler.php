<?php
	// +----------------------------------------------------------------------
	// |  后台删除分类功能
	// +----------------------------------------------------------------------
	

	//引用常用的函数
	require_once('../../../config/config.php');

	//获取发来的数据
	$id = $_POST['id']; //获取数据的id，比如这篇文章的id
	$table = $_POST['table']; //获取此数据对应的表名，比如此文章对应的数据库表

	//需要同时获取到两个数据，不然提示参数错误
	if(!$id && !$table) {
		ajaxReturn(0,'抱歉，参数错误！');
	}


    //判断此分类下有没有产品，如果有产品那么禁止删除
    $sql = "SELECT movies.* From movies INNER JOIN tags ON movies.tag_id=tags.id WHERE movies.tag_id ='$id'";
    $movies = fetchAll($link,$sql);
    if($movies) {
    	ajaxReturn(0,'抱歉,此分类下还有宠物信息，请去删除宠物信息后再删除此分类!');
    }


	//删除数据操作,mysql_delete()在common/mysql.php下,我们通过require_once('../../../config/config.php')引入了进来
	 $result = mysql_delete($link,$table,'id='.$id);

	//判断删除成功与否，给予提示
	if($result) {
		ajaxReturn(0,'删除失败！');
	}else{
		ajaxReturn(1,'删除成功！');
	}