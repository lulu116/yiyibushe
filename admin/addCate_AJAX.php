<?php
    //管理员必须是在线状态
    require './common/admin.common.php';
    $data                   = $_POST;
    $data['admin_id']       = $_SESSION['admin_id'];
    $data['realname']       = $_SESSION['realname'];
    $data['updatetimes']    = date('Y-m-d H:i:s');
    //当存在分类ID时修改分类信息，否则添加分类信息
    if($_POST['cate_id']){
        //删除指定的数据
        unset($data['cate_id']);
        $row = $db->updateData('cate', $data, 'cate_id = ' . $_POST['cate_id']);
    }else{
        $data['addtimes']       = date('Y-m-d H:i:s');
        $row = $db->addData('cate', $data);
    }
    if($row){
        echo json_encode(array('res'=>'success'));
    }else{
        echo json_encode(array('res'=>'error'));
    }

