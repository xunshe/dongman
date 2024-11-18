<?php

	// +----------------------------------------------------------------------
    // | 用户搜索功能
    // +----------------------------------------------------------------------
    
		
	//引用常用的函数
	require_once('../../../config/config.php');

	//获取用户输入搜索内容
	$search_name = $_POST['search_name'];

	if(!$search_name) {
		 ajaxReturn(0, '请输入搜索内容');
	}

	//写sql语句获取搜索的信息
	$sql = "SELECT id FROM products WHERE title = '$search_name'";

	$result = fetchOne($link,$sql);

	if(!empty($result)){
		ajaxReturn(1,$result['id']);
	}else{
		ajaxReturn(0,'抱歉，没有搜索到相关内容！');
	}