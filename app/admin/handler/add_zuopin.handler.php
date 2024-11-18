<?php
	// +----------------------------------------------------------------------
	// | 后台添加作者信息
	// +----------------------------------------------------------------------

	//引用常用帮助的函数
	require_once('../../../config/config.php');

	//获取发送来的数据
	$zuopin_name = $_POST['zuopin_name'];
	$category_id = $_POST['category_id'];
	$author_id = $_POST['author_id'];
	$zuopin_img = $_FILES['zuopin_img'];
	$zuopin_description = $_POST['zuopin_description'];


	//先自定义个错误提示信息
	$error = '';

	//判断后台的信息有没有填写完整
	if(empty($zuopin_name)) {
		$error = '请输入作品姓名';
		exit($error);
	}


	//判断后台的信息有没有填写完整
	if(empty($zuopin_description)) {
		$error = '请输入作品的描述';
		exit($error);
	}


	if(empty($zuopin_img)) {
		$error = '请上传正确的作品封面（JPG,PNG）';
		exit($error);
	}

	
	//具体上传图片操作,其中上传图片的函数在common/helpers.php里
	// 参数$img是视频文件  ，第二个是保存的地址
	$zuopin_img = uploadImg($zuopin_img,'../../../public/uploads');

	//如果上传图片失败，提示
	if(!$zuopin_img) {
		exit('上传图片失败！');
	}
	
		//组装要插入数据库的数据
		$data = array(
			'zuopin_name' =>$zuopin_name,                                           
			'category_id'=>$category_id,
			'author_id'=>$author_id,
			'zuopin_img'=>$zuopin_img,
			'zuopin_description'=>$zuopin_description,
			'addtime'=>date('Y-m-d H:i:s'),
		);

		$result = insert($link,$data,'zuopins');

		if($result) {
			echo "<script>alert('数据保存成功！');window.location.href='/dongmanguanli/app/admin/zuopins.php';</script>";
		}else{
			echo "<script>alert('保存失败，请重试！');history.back();</script>";
		}





