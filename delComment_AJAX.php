<?php
    require './common/common.php';
    $row = $db->delData('comment','comment_id="'.$_POST['commentId'].'"');
    if($row){
        echo json_encode(array('res'=>'success'));
    }else {
        echo json_encode(array('res'=>'error'));
    }