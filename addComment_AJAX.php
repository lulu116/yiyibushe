<?php
    require './common/common.php';
   
    $data['commenttimes'] = date('Y-m-d H-i-s');
    $data['user_id'] = $_SESSION['user_id'];
    $data['product_id'] = $_POST['productId'];
    $data['username'] = $_SESSION['username'];
    $data['content'] = $_POST['comment'];
    $row = $db->addData('comment',$data);
    if($row){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'error'));
    }
