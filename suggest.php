<?php
    require './common/common.php';
    $user_address = $db->getOneData('user','username,tel,useraddress','user_id="'.$_SESSION["user_id"].'"');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人中心-意见反馈</title>
    <link rel="shortcut icon" href="images/yiyi_logo.png">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <link href="css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="css/innerpage.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/always.css">
    <link rel="stylesheet" href="css/minified.css">
    <link href="css/personal.css" rel="stylesheet" type="text/css">
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
                <li><a href="person_center.php">个人中心</a></li>
                <li class="active">支付页</li>
            </ul>
        </div>
    </div>
</div>

<div class="center">
    <div class="col-main">
        <div class="main-wrap">

            <div class="user-address">
                <!--标题 -->
                <div class="am-cf am-padding">
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">意见反馈</strong></div>
                </div>
                <hr/>
                <div class="suggestmain">
                    <p>请留下您的宝贵意见：</p>
                    <div class="suggestlist">
                        <select data-am-selected id="sele_suggest">
                            <option value="请选择意见类型" selected>请选择意见类型</option>
                            <option value="产品问题">产品问题</option>
                            <option value="支付问题">支付问题</option>
                            <option value="退款问题">退款问题</option>
                            <option value="配送问题">配送问题</option>
                            <option value="售后问题">售后问题</option>
                            <option value="发票问题">发票问题</option>
                            <option value="退换货">退换货</option>
                            <option value="其他">其他</option>
                        </select>
                    </div>
                    <div class="suggestDetail">
                        <p>描述问题：</p>
                        <blockquote class="textArea">
                            <textarea name="opinionContent" id="content" cols="60" rows="5" autocomplete="off" placeholder="在此描述您的意见具体内容"></textarea>
                            <div class="fontTip"><i class="cur">0</i> / <i>200</i></div>
                        </blockquote>
                    </div>
                    <div class="am-btn am-btn-danger anniu" id="submit_suggest">提交</div>
                    <p class="suggestTel">客服电话：400-007-1234</p>
                </div>
            </div>
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
                    <li> <a href="person_message.php" >个人信息</a></li>
                    <li> <a href="address.php" >地址管理</a></li>
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
                    <li> <a href="suggest.php" class="pay-current">意见反馈</a></li>
                </ul>
            </li>
        </ul>

    </aside>
</div>
<?php
    require './footer.php';
?>
</body>
</html>
<script src="js/user.js"></script>