<?php
    //1.引入管理员配置文件，整个过程中管理员必须是在线状态
    require './common/admin.common.php';
    // 2.删除当前分类
    $row_parent_cate = $db->delData('cate', 'cate_id=' . $_POST['cate_id']);
    $row_child_cate = $db->delData('cate', 'parent_cate_id=' . $_POST['cate_id']);
    //3.一级分类与二级分类同时为真删除成功
    // 删除一级分类相应的二级分类也删除了
    if($row_parent_cate && $row_child_cate){
        echo json_encode(array('res'=>'success'));
    }else{
        echo json_encode(array('res'=>'error'));
    }