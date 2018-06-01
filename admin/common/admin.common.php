<?php 
    require './common/common.php';
    //后台管理页面必须是登录状态
    if(!$_SESSION['realname']){
        //PHP的跳转
        header('Location:./login.php');
        exit;
    }
    /*
    当管理员登录成功后跳转到主页时，会在主页head.php 文件里面检测 管理员是否是登录状态，相当于是否有session，当登录成功后会保存session
     */