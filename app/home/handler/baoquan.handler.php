<?php

	// +----------------------------------------------------------------------
    // | 用户举报版权的信息功能
    // +----------------------------------------------------------------------
	//引用常用的函数
	require_once('../../../config/config.php');

	//获取用户举报的音乐
	$music_id = $_POST['music_id'];
    //获取举报的版权信息
    $banquan_content = $_POST['banquan_content'];
    //获取评论的用户id
    $user_id = $_SESSION['user']['id'];

	//判断用户输入的评论内容是否为空
	if (empty($banquan_content)) {
		//如果为空，返回提示信息
        ajaxReturn(0, '请输入举报信息');
    }

    //判断用户有没有登录，没有登录不准举报
    if(!$user_id) {
    	ajaxReturn(0,'抱歉，请登录后在举报！');
    }

    //判断参数
    if(!$music_id) {
    	ajaxReturn(0,'错误，请刷新后重试');
    }

    //组装举报的数据
    $data = array(
    	'banquan_content'=>$banquan_content,
    	'music_id'=>$music_id,
    	'user_id'=>$user_id,
    	'addtime'=>date('Y-m-d H:i:s')
    );

    //把组装的数据插入到数据库banquans表中
    $result = insert($link,$data,'banquans');


    if($result) {
    	   ajaxReturn(1,'举报成功！');
    }else{
    	   ajaxReturn(0,'举报失败！');
    }
