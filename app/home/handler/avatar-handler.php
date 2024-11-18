<?php

	// +---------------------------------------------------------------------------------------------
	// | 用户上传头像功能
	// | 设计思路，首先判断上传的头像是否存在，如果存在，就把图片的路径保存到这个用户的数据库中，并且把图片通过
	// | 函数保存到对应的文件夹里，提示用户头像更新成功
	// +----------------------------------------------------------------------------------------------
	
	//引用常用帮助的函数
	require_once('../../../config/config.php');

	//获取用户提交上来的头像
	$avatar = $_FILES['avatar'];

	//先自定义个错误提示信息
	$error = '';

	//判断用户有没有上传头像
	if(empty($avatar)) {
		$error = '抱歉,请上传正确格式的图片(gif,jpeg,png格式)';
		exit($error);
	}

	//具体上传图片操作,其中上传图片的函数在common/helpers.php里
	// 参数$logo是视频文件  ，第二个是保存的地址
	$avatar = uploadImg($avatar,'../../../dongmanguanli/public/uploads');

	//如果上传图片失败，提示
	if(!$avatar) {
		exit('上传图片失败！');
	}

	$data = array(
		'avatar' =>$avatar
	);

	//获取用户id
	$user_id = $_SESSION['user']['id'];
	$where = "id='$user_id'";
	//更新用户的头像信息
	$result = update($link,$data,'users',$where);

	if($result) {
		echo "<script>alert('头像更新成功！');</script>";
	}

	redirect('/dongmanguanli/app/home/user-avatar.php');

