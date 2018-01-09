<?php
require './common/common.php';
//1.根据session里面的账号查询密码
$row = $db->getOneData('admin', '*', 'realname = "'.$_POST['realname'].'"');
//2.根据查询的结果判断
if(!$row){
    //没有找到当前输入的账号
    echo json_encode(array('res'=>'no_exit_realname'));
    exit;
}
if(md5($_POST['passwd']) != $row['passwd']){
    //当前密码不对
    echo json_encode(array('res'=>'invail_passwd'));
    exit;
}
//3.修改密码
$sql = "UPDATE admin SET passwd ='".md5($_POST['nowpasswd'])."',lasttimes=now() WHERE admin_id='".$row['admin_id']."'";
//4.执行sql语句
$db->dblink->query($sql);
//5.修改成功
echo json_encode(array('res'=>'success'));
