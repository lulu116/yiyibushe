<?php
    require './common/common.php';
    //1.判断用户是否登录
    if(!$_SESSION['user_id']){
        echo json_encode(array('res'=>'no_login'));
        exit;
    }
    //2.把产品加入收藏
    $data['addtimes'] = date('Y-m-d H-i-s');
    $data['user_id'] = $_SESSION['user_id'];
    $data['product_id'] = $_POST['productId'];
    $data['collect_num'] = 1;
   //collect_num  0:未收藏  1：已经收藏了 2：提示用户不能再添加了  同一件商品不能收藏多次，
    $row = $db->getOneData('collect','*','user_id='.$_SESSION['user_id'].' AND  product_id='.$_POST['productId']);
    //真：更新数据；假：添加数据
    if($row){
        $res = $db->updateData('cart',array('collect_num'=>2),'cart_id='.$row['cart_id'],'addtimes='.date('Y-m-d H-i-s'));
    }else {
        $res = $db->addData('collect',$data);
    }
    if($res){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'no_repeat'));
    }