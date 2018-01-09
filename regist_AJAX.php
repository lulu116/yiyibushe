<?php
	require './common/common.php';
	$data = $_POST;
	//1.检查验证码是否正确
	if($_SESSION['usercode'] != $data['usercode']){
		echo json_encode(array('res'=>'no_coder'));
		exit;
	}
	//2.添加一条数据
	$data['registtimes'] = date('Y-m-d H-i-s');
	//存入数据库中的密码必须是加密的
	unset($data['usercode']);
	$data['passwd'] = md5($data['passwd']);
	$row = $db->addData('user',$data);
	if(!$row){
		echo json_encode(array('res'=>'error'));
	}else {
		echo json_encode(array('res'=>'success'));
	}