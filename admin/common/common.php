<?php
    session_start(); //SESSION的开启一定要放在最前面
    header('Content-type:text/html;charset="UTF-8"');
    require './class/db.php';
    require './config/db.config.php';
    $db = new DB($dbconfig);
