<?php
	require './common/common.php';
	//修改管理员给用户的反馈
	$data = $_POST;
	$data['admin_suggest'] = $_POST['admin_suggest'];
	$row = $db->updateData('suggest', $data, 'suggest_id="'.$_POST["suggest_id"].'"');
	if($row){
		echo json_encode(array('res'=>'success'));
	}else {
		echo json_encode(array('res'=>'error'));
	}
	
