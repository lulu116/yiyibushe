<?php
    require './common/admin.common.php';
    //根据一级分类id查询子分类
    $child_cate_list = $db->getDatas('cate', 'cate_id, catename', 'parent_cate_id='. $_POST['cate_id_p']);
    echo json_encode($child_cate_list);