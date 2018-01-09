<?php
    require './common/common.php';
    $user_address = $db->getOneData('user','username,tel,useraddress','user_id="'.$_SESSION["user_id"].'"');
    $cart_msg = $db->getDatas('cart','*','cart_id="'.$_GET["cart_id"].'"');
   foreach($cart_msg as $c_m_k => $c_m_v){
       $product = $db->getDatas('product','*','product_id="'.$c_m_v["product_id"].'"');
   }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人中心-支付页</title>
    <link rel="shortcut icon" href="images/yiyi_logo.png">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <link href="css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="css/innerpage.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/always.css">
    <link rel="stylesheet" href="css/minified.css">
    <link href="css/personal.css" rel="stylesheet" type="text/css">
    <link href="css/addstyle.css" rel="stylesheet" type="text/css">
    <link href="css/orstyle.css" rel="stylesheet" type="text/css">
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
                    <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">支付中...</strong></div>
                </div>
                <hr/>
                <ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">

                    <li class="user-addresslist defaultAddr">
                        <span class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</span>
                        <p class="new-tit new-p-re">
                            <span class="new-txt"><?php echo $user_address["username"]?></span>
                            <span class="new-txt-rd2"><?php echo $user_address["tel"]?></span>
                        </p>
                        <div class="new-mu_l2a new-p-re">
                            <p class="new-mu_l2cw">
                                <?php echo $user_address['useraddress'] ?>
                            </p>
                        </div>
                        <div class="new-addr-btn">
                            <a href="update_address.php?user_id=<?php echo $_SESSION['user_id']?>">编辑</a>
                        </div>
                    </li>
                </ul>
                <div class="clear"></div>
                <a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
                <!--例子-->
                <div class="am-modal am-modal-no-btn" id="doc-modal-1">

                    <div class="add-dress">

                        <!--标题 -->
                        <div class="am-cf am-padding">
                            <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">商品支付中...</strong> </div>
                        </div>
                        <hr/>

                        <div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

                            <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
                                <li class="am-active"><a href="#tab1">所有订单</a></li>
                            </ul>

                            <div class="am-tabs-bd">
                                <?php
                                    foreach($product as $p_k => $p_v) {
                                            $slider_img = explode(',', $p_v['imgs']);
                                            $color = $db->getDatas('color','*','product_id="'.$p_v["product_id"].'"');
                                            $size = $db->getDatas('size','*','product_id="'.$p_v["product_id"].'"');
                                        ?>
                                        <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                                            <div class="order-main">
                                                <div class="order-list">
                                                    <div class="order-status5">
                                                        <div class="order-content">
                                                            <div class="order-left">
                                                                <ul class="item-list">
                                                                    <li class="td ">
                                                                        <div class="item-pic">
                                                                            <a href="#" class="J_MakePoint">
                                                                                <img
                                                                                    src="<?php echo $slider_img[1]?>"
                                                                                    class="itempic J_ItemImg">
                                                                            </a>
                                                                        </div>
                                                                        <div class="item-info">
                                                                            <div class="item-basic-info">
                                                                                <a href="#">
                                                                                    <p><?php echo $p_v['productname']?></p>
                                                                                    <p class="info-little">颜色：<?php echo $color[0]['colorname']?>
                                                                                        <br/>尺寸：<?php echo $size[0]['sizename']?>
                                                                                    </p>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="td ">
                                                                        <div class="item-price">
                                                                           <?php echo $p_v['price']?>.00
                                                                        </div>
                                                                    </li>
                                                                    <li class="td ">
                                                                        <div class="item-num">
                                                                            <span>×</span>1
                                                                        </div>
                                                                    </li>
                                                                </ul>

                                                            </div>
                                                            <div class="order-right">
                                                                <li class="td td-amount">
                                                                    <div class="item-amount">
                                                                        合计：<?php echo $p_v['price']?>.00
                                                                        <p>含运费：<span>10.00</span></p>
                                                                    </div>
                                                                </li>
                                                                <div class="move-right">
                                                                    <li class="td td-change">
                                                                        <div class="am-btn am-btn-danger anniu submit_pay" productId="<?php echo $p_v["product_id"]?>" colorId="<?php echo $color[0]["color_id"]?>"
                                                                             sizeId="<?php echo $size[0]["size_id"]?>"
                                                                             address="<?php echo $user_address['useraddress']?>"
                                                                             price="<?php echo $p_v['price']?>"
                                                                        >
                                                                            点击确认支付
                                                                        </div>
                                                                    </li>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>

                                        </div>
                                        <?php
                                    }
                                ?>
                            </div>

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
                    <li> <a href="person_center.php" >个人信息</a></li>
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
                    <li> <a href="suggest.html">意见反馈</a></li>
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