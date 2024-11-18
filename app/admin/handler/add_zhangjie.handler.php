<?php

	// +---------------------------------------------------------------------------------------------
	// | 为作品添加章节功能
	// +----------------------------------------------------------------------------------------------
	
	//引用常用帮助的函数
	require_once('../../../config/config.php');
	//获取发送来的数据
	$zhangjie_num = $_POST['zhangjie_num'];
	$zhangjie_title = $_POST['zhangjie_title'];
	$zuopin_id = $_POST['zuopin_id'];
	$zhangjie_content = $_POST['zhangjie_content'];

	//先自定义个错误提示信息
	$error = '';

	//判断后台的信息有没有填写完整
	if(empty($zhangjie_num)) {
		$error = '请输入章节序号';
		exit($error);
	}

	if(empty($zhangjie_title)) {
		$error ='请上传章节标题';
		exit($error);
	}
     
	if(empty($zhangjie_content)) {
		$error ='请上传内容';
		exit($error);
	}

	if(empty($zuopin_id)) {
		$error = '抱歉,参数错误！';
		exit($error);
	}

	//组装要插入数据库的数据
	$data = array(
		'zhangjie_num' =>$zhangjie_num,
		'zhangjie_title'=>$zhangjie_title,
		'zuopin_id'=>$zuopin_id,
		'zhangjie_content'=>$zhangjie_content,
		'addtime'=>date('Y-m-d H:i:s'),
	);

	$result = insert($link,$data,'zhangjies');

	if($result) {
		echo "<script>alert('上传成功!');window.location.href='/dongmanguanli/app/admin/zhangjie.php?id=".$zuopin_id."';</script>";
	}else{
		echo "<script>alert('保存失败，请重试！');history.back()</script>";
	}







