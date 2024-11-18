<?php

	// +----------------------------------------------------------------------
    // | 获取章节信息
    // +----------------------------------------------------------------------
    
		
	//引用常用的函数
	require_once('../../../config/config.php');

	//获取章节id
    $zhangjie_id = $_POST['id'];

    //获取章节内容
    $sql = "SELECT * FROM zhangjies WHERE id='$zhangjie_id'";
    $content = fetchOne($link,$sql);

    if($content){
        ajaxReturn(1,'获取成功',$content);
    }else{
        ajaxReturn(0,'获取失败');
    }
