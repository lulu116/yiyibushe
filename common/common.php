<?php
	//session开启 
	session_start();  
	//设置头文件
	header('Content-type:text/html;charset="utf-8"');
	//引入数据库文件
	require './class/db.php';
	//引入数据库配置文件
	require './config/db.config.php';
	//创建数据库对象
	$db = new DB($dbconfig);
