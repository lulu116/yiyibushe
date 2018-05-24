<?php
    require './common/common.php';
    //1.判断用户是否登录
    if(!$_SESSION['user_id']){
        echo json_encode(array('res'=>'no_login'));
        exit;
    }
    //2.把产品添加到购物车
    $data['addtimes'] = date('Y-m-d H-i-s');
    $data['user_id'] = $_SESSION['user_id'];
    $data['product_id'] = $_POST['productId'];
    $data['color_id'] = $_POST['color_sel'];
    $data['size_id'] = $_POST['size_sel'];
    //3.颜色ID不存在
    if(!$data['color_id']){
        echo json_encode(array('res'=>'no_color'));
        exit;
    }
    if(!$data['size_id']){
        echo json_encode(array('res'=>'no_size'));
        exit;
    }
    //更新库存表
    $sql = 'UPDATE stock SET updatetimes = now(),stocknum = stocknum-1 WHERE product_id='.$_POST['productId'];
    $db->dblink->query($sql);
    $row = $db->getOneData('cart','*','user_id='.$_SESSION['user_id'].' AND  product_id='.$_POST['productId']);
        //真：更新数据；假：添加数据
    if($row){
        $res = $db->updateData('cart',array('cart_num'=>$row['cart_num']+1),'cart_id='.$row['cart_id'],'addtimes='.date('Y-m-d H-i-s'));
    }else {
        $res = $db->addData('cart',$data);
    }
    if($res){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'error'));
    }