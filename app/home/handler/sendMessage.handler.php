<?php
	// +---------------------------------------------------------------------------------------------
	// | 用户发送私信功能
	// +----------------------------------------------------------------------------------------------
	
	//引用常用帮助的函数
	require_once('../../../config/config.php');

	//获取发送来的数据
	$receive_id = $_POST['user_id'];
	$message_content = $_POST['message_content'];
	$send_id = $_SESSION['user']['id'];

    //判断是不是给自己发送私信
    if($send_id == $receive_id){
        ajaxReturn(0,'抱歉不能给自己发送私信');
    }


	if (!$message_content) {
        ajaxReturn(0, '请输入私信内容！');
    }

    $data = array(
    	'send_id'=>$send_id,
    	'message_content'=>$message_content,
    	'receive_id'=>$receive_id,
        'addtime'=>date('Y-m-d H:i:s'),
    );

    $result = insert($link,$data,'messages');

    if($result) {
    	ajaxReturn(1,'私信发送成功！');
    }else{
    	ajaxReturn(0,'私信发送失败！');
    }