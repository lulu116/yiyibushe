<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人中心页-信息</title>
    <link rel="shortcut icon" href="images/yiyi_logo.png">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <link href="css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="css/innerpage.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/always.css">
    <link rel="stylesheet" href="css/minified.css">
    <link href="css/personal.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/infstyle.css">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/amazeui.js"></script>
    <script>
        window.onload = function(){
            var nowTime = new Date();
            var year = nowTime.getFullYear();
            var month = nowTime.getMonth()+1;
            var date = nowTime.getDate();
            var day = nowTime.getDay();
            var now_span = document.querySelector("#nowTime");
            switch (day) {
                case 1:
                    day = "星期一";
                    break;
                case 2:
                    day = "星期二";
                    break;
                case 3:
                    day = "星期三";
                    break;
                case 4:
                    day = "星期四";
                    break;
                case 5:
                    day = "星期五";
                    break;
                case 6:
                    day = "星期六";
                    break;
                default:
                    day = "星期日";
                    break;
            }
            now_span.innerHTML = year+"年"+month+"月"+date+"日"+day;
        }

    </script>
</head>

<body>
<!--头 -->
<header id="site-header" role="banner">
    <!-- HEADER TOP -->
    <?php
    require './header.php';
    ?>
    <!-- // HEADER TOP -->
    <!-- MAIN HEADER -->
    <div class="main-header-wrapper">
        <div class="container">
            <div class="main-header">
                <!-- // CURRENCY / LANGUAGE / USER MENU -->
                <!-- SITE LOGO -->
                <div class="logo-wrapper">
                    <a href="index.php" class="logo" >
                        <img src="img/logo.png" title="衣衣不舍电商网站" />
                    </a>
                </div>
                <!-- // SITE LOGO -->
                <!-- SITE NAVIGATION MENU -->
                <nav id="site-menu" role="navigation">
                    <ul class="main-menu hidden-sm hidden-xs">
                        <li class="active">
                            <a href="index.php">主页</a>
                        </li>
                        <li>
                            <a href="index.php">产品</a>
                        </li>
                        <li>
                            <a href="store_location.php">店铺位置</a>
                        </li>
                        <li>
                            <a href="person_center.php">个人中心</a>
                        </li>
                        <li>
                            <a href="suggest.php">联系我们</a>
                        </li>
                    </ul>
                </nav>
                <!-- // SITE NAVIGATION MENU -->
            </div>
        </div>
    </div>
    <!-- // MAIN HEADER -->
</header>
<div class="breadcrumb-container">
    <div class="container">
        <div class="relative">
            <ul class="bc unstyled clearfix">
                <li><a href="index.php">主页</a></li>
                <li class="active">个人中心</li>
            </ul>
        </div>
    </div>
</div>

<div class="center">
    <div class="col-main">
        <div class="main-wrap">


            <div class="user-info">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人信息-修改</strong></div>
                </div>
                <hr/>

                <!--头像 -->
                <?php
                    if($_SESSION["username"]){
                ?>
                <div class="user-infoPic">
                    <div class="filePic">
                        <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                        <img class="am-circle am-img-thumbnail" src="upload/image/<?php echo $_SESSION['userImg']?>" alt="" />
                    </div>
                    <div class="info-m">
                        <div><b>用户名：<i><?php echo $_SESSION['username']?></i></b></div>
                        <div class="vip">
                            <span></span><a href="#">会员专享</a>
                        </div>
                    </div>
                </div>
                <?php
                    }else{
                ?>
                <div class="user-infoPic">
                    <div class="filePic">
                        <input type="file" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
                        <img class="am-circle am-img-thumbnail" src="img/getAvatar.do.jpg" alt="" />
                    </div>
                    <div class="info-m">
                        <div><b>用户名：<i>小叮当</i></b></div>
                        <div class="vip">
                            <span></span><a href="#">会员专享</a>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>

                <!--个人信息 -->
                <div class="info-main">
                    <div class="am-form am-form-horizontal">
                        <div class="am-form-group">
                            <label for="username" class="am-form-label">用户名</label>
                            <div class="am-form-content">
                                <input type="text" id="username" name="username" placeholder="请输入用户名">
                                <span></span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="passwd" class="am-form-label">旧密码</label>
                            <div class="am-form-content">
                                <input type="password" id="passwd" name="passwd" placeholder="请输入旧密码">
                                <span></span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="nowpasswd" class="am-form-label">新密码</label>
                            <div class="am-form-content">
                                <input type="password" id="nowpasswd" name="nowpasswd" placeholder="请输入新密码">
                                <span></span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="repasswd" class="am-form-label">确认密码</label>
                            <div class="am-form-content">
                                <input type="password" id="repasswd" name="repasswd" placeholder="确认密码">
                                <span></span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="tel" class="am-form-label">联系电话</label>
                            <div class="am-form-content">
                                <input type="text" id="tel" name="tel" placeholder="请输入联系电话">
                                <span></span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="useraddress" class="am-form-label">收货地址</label>
                            <div class="am-form-content">
                                <input type="text" id="useraddress" name="useraddress" placeholder="请输入收货地址">
                                <span></span>
                            </div>
                        </div>
                        <div class="info-btn">
                            <button class="btn btn-danger" id="updateUserImg">修改</button>
                            <input type="reset" class="btn btn-success" value="重置" >
                        </div>

                    </div>
                </div>

            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".new-option-r").click(function() {
                        $(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
                    });

                    var $ww = $(window).width();
                    if($ww>640) {
                        $("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
                    }

                })
            </script>

            <div class="clear"></div>

        </div>
        <!--底部-->

    </div>

    <aside class="menu">
        <ul>
            <li class="person active">
                <a href="person_center.php" >个人中心</a>
            </li>
            <li class="person">
                <p>个人资料</p>
                <ul>
                    <li> <a href="person_message.php" class="pay-current">个人信息</a></li>
                    <li> <a href="address.php">地址管理</a></li>
                </ul>
            </li>
            <li class="person">
                <p>我的交易</p>
                <ul>
                    <li><a href="order.php">订单管理</a></li>
                </ul>
            </li>
            <li class="person">
                <p>我的收藏</p>
                <ul>
                    <li> <a href="collect.php">收藏</a></li>
                </ul>
            </li>

            <li class="person">
                <p>在线客服</p>
                <ul>
                    <li> <a href="suggest.php">意见反馈</a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
<hr color="#fff"/>
<?php
require './footer.php';
?>
</body>
</html>
<script src="js/user.js"></script>