<?php
    require './common/common.php';
    $data['product_id'] = $_POST['productId'];
    $data['color_id'] = $_POST['colorId'];
    $data['size_id'] = $_POST['sizeId'];
    $data['user_id'] = $_SESSION['user_id'];
    $data['username'] = $_SESSION['username'];
    $data['ordertimes'] = date('Y-m-d H-i-s');
    $data['orderaddress'] = $_POST['address'];
    $data['tel'] = $_SESSION['tel'];
    $data['price'] = $_POST['price'];
    $data['totalprices'] = $_POST['price'];
    $data['status'] = 1;
    $data['ordercount'] = 1;
    $row = $db->addData('orders',$data);
    if($row){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'error'));
    }
