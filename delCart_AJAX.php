<?php
    require './common/common.php';
   //1.判断用户是否登录
    if(!$_SESSION['user_id']){
        echo json_encode(array('res'=>'no_login'));
        exit;
    }
    //2.删除对应的购物车信息
    $row = $db->delData('cart','cart_id="'.$_POST["cart_id"].'"');
    if($row){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'error'));
    }