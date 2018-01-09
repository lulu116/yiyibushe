<?php
    require './common/common.php';
    //1.根据session里面的账号查询密码
    $row = $db->getOneData('user', '*', 'username = "'.$_POST['username'].'"');
    //2.根据查询的结果判断
    if(!$row){
        //没有找到当前输入的账号
        echo json_encode(array('res'=>'no_exit_username'));
        exit;
    }
    if(md5($_POST['passwd']) != $row['passwd']){
        //当前密码不对
        echo json_encode(array('res'=>'invail_passwd'));
        exit;
    }
    //3.修改密码
    $sql = "UPDATE user SET passwd ='".md5($_POST['nowpasswd'])."',tel='".$_POST['tel']."',useraddress='".$_POST['useraddress']."',logintimes=now() WHERE user_id='".$row['user_id']."'";
    //4.执行sql语句
//   echo $sql;
    $db->dblink->query($sql);
    //5.修改成功
    echo json_encode(array('res'=>'success'));
