<?php
	// +----------------------------------------------------------------------
	// | 用户上传音乐
	// +----------------------------------------------------------------------

	//引用常用帮助的函数
	require_once('../../../config/config.php');
	//获取发送来的数据
	$music_name = $_POST['music_name'];
	$category_id = $_POST['category_id'];
	$music_starname = $_POST['music_starname'];
	$music_img = $_FILES['music_img'];
	$music_files = $_FILES['music_files'];
	$music_lyric = $_POST['music_lyric'];
	$user_id = $_SESSION['user']['id'];


	//先自定义个错误提示信息
	$error = '';

	//判断后台的信息有没有填写完整
	if(empty($music_name)) {
		$error = '请输入歌名！';
		exit($error);
	}

	//判断有没有选择标签
	if(empty($category_id)) {
		$error ='请选择标签';
		exit($error);
	}

	//判断有没有上传歌手
	if(empty($music_starname)) {
		$error = '请输入歌手名字！';
		exit($error);
	}

	//判断后台的信息有没有填写完整
	if(empty($music_lyric)) {
		$error = '请输入歌词！';
		exit($error);
	}

	//判断后台的信息有没有填写完整
	if(empty($user_id)) {
		$error = '请登录后再上传';
		exit($error);
	}

	if(empty($music_img['tmp_name'])) {
		$error = '请上传正确的头像（JPG,PNG）';
		exit($error);
	}

	if(empty($music_files['tmp_name'])) {
		$error = '请上传正确的音乐文件（MP3,WAV）';
		exit($error);
	}


	
	//具体上传图片操作,其中上传图片的函数在common/helpers.php里
	// 第一个参数是文件名  ，第二个是保存的地址
	$music_img1 = uploadImg($music_img,'../../../dongmanguanli/public/uploads');

	//如果上传图片失败，提示
	if(!$music_img1) {
		exit('上传图片失败！');
	}

    $music_file1 = uploadMusic($music_files,'../../../dongmanguanli/public/uploads');
	if(!$music_file1) {
		exit('上传音乐文件失败！');
	}

	//组装要插入数据库的数据
	$data = array(
		'music_name' =>$music_name,                                           
		'category_id'=>$category_id,
		'music_starname'=>$music_starname,
		'music_img'=>$music_img1,
		'music_lyric'=>$music_lyric,
		'user_id'=>$user_id,
		'music_files'=>$music_file1,
		'addtime'=>date('Y-m-d H:i:s'),
		'type'=>2
	);

	$result = insert($link,$data,'musics');

	if($result) {
		echo "<script>alert('音乐上传成功！');window.location.href="/dongmanguanli/";</script>";
	}else{
		echo "<script>alert('音乐上传失败，请重试！');window.location.href='/dongmanguanli/app/home/post.php';</script>";
	}





