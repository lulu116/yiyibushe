<?php
    //引入公共文件
   require './common/common.php';
   //开启session
   session_start();
   //管理员退出登录，销毁session
   if($_GET['loginaction'] == 'loginquit'){
      unset($_SESSION['realname']);   //销毁指定session信息
      unset($_SESSION['admin_id']);
   }
?>
<!DOCTYPE html>
<head>
   <meta charset="utf-8" />
   <title>衣衣不舍后台管理-登录页</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="" name="author" />
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
   <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
   <link href="css/style.css" rel="stylesheet" />
   <link href="css/style-responsive.css" rel="stylesheet" />
   <link href="css/style-default.css" rel="stylesheet" id="style_color" />
   <link rel="shortcut icon" href="img/yiyi_logo.png">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="index.html">
            <img class="center" alt="logo" src="img/logo.png">
        </a>
        <!-- END LOGO -->
    </div>
    <div class="login-wrap">
        <div class="metro single-size red">
            <div class="locked">
                <i class="icon-lock"></i>
            </div>
        </div>
        <div class="metro double-size green">
            <div class="input-append lock-input">
                <input type="text" name="realname" id="realname" placeholder="账号" value="<?= $_COOKIE['realname']; ?>">
                <span style="font-size: 14px;"></span>
            </div>
        </div>
        <div class="metro double-size yellow">
            <div class="input-append lock-input">
                <input type="password" name="passwd" id="passwd" placeholder="密码" value="<?= $_COOKIE['passwd']; ?>">
                <span style="font-size: 14px;"></span>
            </div>
        </div>
        <div class="metro single-size terques login" id="loginbutton">
            <button type="button" class="btn login-btn">
                登录
                <i class=" icon-long-arrow-right"></i>
            </button>
        </div>
        <div class="login-footer">
            <div class="remember-hint pull-left">
                <input type="checkbox" name="remember" id="remember" value="1" <?=$_COOKIE['realname'] && $_COOKIE['passwd'] ? 'checked' : '' ?> >记住我
            </div>
        </div>
    </div>
    <script src="./js/jquery-1.8.3.min.js"></script>
    <script src="./js/login.js"></script>
</body>
<!-- END BODY -->
</html>