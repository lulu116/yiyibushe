<?php
    //1.引入管理员配置文件，整个过程中管理员必须是在线状态
    require './common/admin.common.php';
    // 2.删除当前内容
    $row_content = $db->delData('product', 'product_id=' . $_POST['product_id']);
    // 3.如果找到了就删除
    if($row_content){
        echo json_encode(array('res'=>'success'));
    }else{
        echo json_encode(array('res'=>'error'));
    }