<?php
	require './common/common.php';
	//1.检查验证码是否正确
	if($_SESSION['usercode'] != $_POST['usercode']){
		echo json_encode(array('res'=>'no_coder'));
		exit;
	}
	//2.. 根据用户名查询一条数据
	$row = $db->getOneData('user','*','username="'.$_POST["username"].'"');
	//3.用户名是否正确
	if($row['username'] != $_POST['username']){
		echo json_encode(array('res'=>'no_exit_username'));
		exit;
	}
	//4.密码是否正确
	if($row['passwd'] != md5($_POST[passwd])){
		echo json_encode(array('res'=>'invail_passwd'));
		exit;
	}
	//5.更新用户信息
	$sql = 'UPDATE user SET logintimes = now(),loginnum = loginnum+1 WHERE user_id = '.$row['user_id'];
	$db->dblink->query($sql);

	//6.账号密码正确保存用户信息
	if($_POST['remember'] == '1'){
		setcookie('username',   $row['username'],    time() + 720*3600);
		setcookie('passwd',     $_POST['passwd'],    time() + 720*3600);
	}else {
		setcookie('username', '' ,    time() - 720*3600);
		setcookie('passwd',  '',    time() - 720*3600);
	}
	//7.把用户基本信息保存到session
	$_SESSION['username'] = $row['username'];
	$_SESSION['userImg'] = $row['userImg'];
	$_SESSION['user_id'] = $row['user_id'];
	$_SESSION['tel'] = $row['tel'];
	//8.登录成功
	echo json_encode(array('res'=>'success'));
