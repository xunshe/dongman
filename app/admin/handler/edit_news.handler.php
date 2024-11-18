<?php

	// +---------------------------------------------------------------------------------------------
	// | 修改公告功能
	// +----------------------------------------------------------------------------------------------
	
	//引用常用帮助的函数
	require_once('../../../config/config.php');


	//获取发送来的数据
	$new_title = $_POST['new_title'];
	$new_img = $_FILES['new_img'];
	$new_content = $_POST['new_content'];
	$id = $_POST['id'];
	$where = 'id='.$id;

	//先自定义个错误提示信息
	$error = '';

	//判断后台的信息有没有填写完整
	if(empty($new_title)) {
		$error = '请输入标题';
		exit($error);
	}

	//判断有没有上传图片
	if(empty($new_img)) {
		$error ='请上传正确格式的图片(gif,jpeg,png格式)';
		exit($error);
	}

	//判断有没有上传内容
	if(empty($new_content)) {
		$error = '抱歉,请输入详细内容';
		exit($error);
	}


	if(!empty($new_img['tmp_name'])) {
		//具体上传图片操作,其中上传图片的函数在common/helpers.php里
		// 参数$img是视频文件  ，第二个是保存的地址
		$img = uploadImg($new_img,'../../../public/uploads');

		//如果上传图片失败，提示
		if(!$img) {
			exit('上传图片失败！');
		}

		//组装要插入数据库的数据
		$data = array(
			'new_title' =>$new_title,
			'new_img'=>$img,
			'new_content'=>$new_content,
			'addtime'=>date('Y-m-d H:i:s'),
		);

		$result = update($link,$data,'news',$where);

		if($result) {
			echo "<script>alert('数据更新成功！');window.location.href='/dongmanguanli/app/admin/news.php';</script>";
		}else{
			echo "<script>alert('数据更新失败，请重试！');</script>";
		}

	}else{
		//组装要插入数据库的数据
		$data = array(
			'new_title' =>$new_title,
			'new_content'=>$new_content,
			'addtime'=>date('Y-m-d H:i:s'),
		);

		$result = update($link,$data,'news',$where);

		if($result) {
			echo "<script>alert('数据保存成功！');window.location.href='/dongmanguanli/app/admin/news.php';</script>";
		}else{
			echo "<script>alert('数据更新失败，请重试！');</script>";
		}
	}

	






