<?php
    require './common/common.php';
    if(!$_SESSION['user_id']){
        echo json_encode(array('res'=>'no_login'));
        exit;
    }
    if(!$_SESSION['admin_id']){
        echo json_encode(array('res'=>'admin_no_login'));
        exit;
    }
    $data['content'] = $_POST["content"];
    $data['types'] = $_POST["sele_suggest"];
    $data['admin_id'] = $_SESSION['admin_id'];
    $data['user_id'] = $_SESSION["user_id"];
    $row = $db->addData('suggest',$data);
    if($row){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'error'));
    }
