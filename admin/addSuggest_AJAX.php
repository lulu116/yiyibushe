<?php
    //管理员必须是在线状态
    require './common/admin.common.php';
    $data['admin_suggest']       = $_POST['admin_suggest'];
    //更新意见表
    $row = $db->updateData('suggest', $data, 'user_id="'.$_POST["username"].'"');
    
    if($row){
        echo json_encode(array('res'=>'success'));
    }else{
        echo json_encode(array('res'=>'error'));
    }

