<?php
    require './common/common.php';
    $row = $db->delData('orders','product_id="'.$_POST["order_id"].'"');
    if($row){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'error'));
    }