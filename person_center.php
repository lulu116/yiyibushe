<?php
    require './common/common.php';
    //浏览列表
    $collect_msg = $db->getDatas('collect','*');

    //订单列表
    $orders = $db->getDatas('orders','product_id');
    foreach($orders as $order_k => $order_v){
        $order_product = $db->getDatas('product','*','product_id="'.$order_v["product_id"].'"');
        $orders['$order_k']['single_order'] = $order_product;
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">
    <title>个人中心页</title>
    <link rel="shortcut icon" href="images/yiyi_logo.png">
    <link href="css/admin.css" rel="stylesheet" type="text/css">
    <link href="css/amazeui.css" rel="stylesheet" type="text/css">
    <link href="css/innerpage.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="css/always.css">
    <link rel="stylesheet" href="css/minified.css">
    <link href="css/personal.css" rel="stylesheet" type="text/css">
    <link href="css/addstyle.css" rel="stylesheet" type="text/css">
    <link href="css/vipstyle.css" rel="stylesheet" type="text/css">
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

            <div class="wrap-left">
                <div class="wrap-list">
                    <div class="m-user">
                        <!--个人信息 -->

                        <div class="m-userinfo">
                            <a href="person_center.php">
                                <div class="tipsBox"></div>
                            </a>
                            <?php
                                session_start();
                                if($_SESSION["username"]){
                            ?>
                            <div class="m-baseinfo">
                                <a class="m-pic" href="person_message.php">
                                    <img src="upload/image/<?php echo $_SESSION["userImg"]?>">
                                </a>
                                <div class="m-info">
                                    <em class="s-name"><?php echo $_SESSION["username"] ?></em>
                                    <div class="vip1"><a href="#"><span></span><em>会员专享</em></a></div>
                                    <div class="safeText"><a href="safety.html">账户安全:<em style="margin-left:20px ;">60</em>分</a>
                                        <div class="progressBar"><span style="left: -95px;" class="progress"></span></div>
                                    </div>
                                    <div class="m-address">
                                        <a href="address.php" class="i-trigger">收货地址<i class="am-icon-angle-right" style="padding-left:5px ;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }else {
                            ?>
                            <div class="m-baseinfo">
                                <a class="m-pic" href="person_message.php">
                                    <img src="img/getAvatar.do.jpg">
                                </a>
                                <div class="m-info">
                                    <em class="s-name">啦啦啦</em>
                                    <div class="vip1"><a href="#"><span></span><em>会员专享</em></a></div>
                                    <div class="safeText"><a href="safety.html">账户安全:<em style="margin-left:20px ;">60</em>分</a>
                                        <div class="progressBar"><span style="left: -95px;" class="progress"></span></div>
                                    </div>
                                    <div class="m-address">
                                        <a href="address.html" class="i-trigger">收货地址<i class="am-icon-angle-right" style="padding-left:5px ;"></i></a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="m-right">
                                <div class="m-new">
                                    <a href="news.html"><i class="am-icon-dropbox  am-icon-md" style="padding-right:5px ;"></i>消息盒子</a>
                                </div>

                            </div>
                        </div>

                        <!--个人资产-->
                        <div class="m-userproperty">
                            <div class="s-bar">
                                <i class="s-icon"></i>个人资产
                            </div>
                            <p class="m-coupon">
                                <a href="coupon.html">
                                    <em class="m-num">2</em>
                                    <span class="m-title">优惠券</span>
                                </a>
                            </p>
                            <p class="m-wallet">
                                <a href="wallet.html">
                                    <em class="m-num">你猜</em>
                                    <span class="m-title">账户余额</span>
                                </a>
                            </p>
                            <p class="m-bill">
                                <a href="pointnew.html">
                                    <em class="m-num">10</em>
                                    <span class="m-title">总积分</span>
                                </a>
                            </p>
                        </div>

                        <!--我的钱包-->
                        <div class="wallet">
                            <div class="s-bar">
                                <i class="s-icon"></i>商城钱包
                            </div>
                            <p class="m-big squareS">
                                <a href="#">
                                    <i><img src="img/shopping.png"/></i>
                                    <span class="m-title">能购物</span>
                                </a>
                            </p>
                            <p class="m-big squareA">
                                <a href="#">
                                    <i><img src="img/safe.png"/></i>
                                    <span class="m-title">够安全</span>
                                </a>
                            </p>
                            <p class="m-big squareL">
                                <a href="#">
                                    <i><img src="img/profit.png"/></i>
                                    <span class="m-title">很灵活</span>
                                </a>
                            </p>
                        </div>

                    </div>
                    <div class="box-container-bottom"></div>

                    <!--订单 -->
                    <div class="m-order">
                        <div class="s-bar">
                            <i class="s-icon"></i>我的订单
                            <a class="i-load-more-item-shadow" href="order.php">全部订单</a>
                        </div>

                        <?php
                        foreach($orders['$order_k'] as $order_product_k => $order_product_v){
                            $slider_img = explode(',', $order_product_v[0]['imgs']);
                            ?>
                            <div class="orderContentBox">
                                <div class="orderContent">
                                    <div class="orderContentpic">
                                        <div class="imgBox">
                                            <a href="single.php?product_id=<?php echo $order_product_v[0]['product_id']?>"><img src="<?php echo $slider_img[1]?>" title="<?php echo $order_product_v[0]['productname']?>" alt="<?php echo $order_product_v[0]['productname']?>"></a>
                                        </div>
                                    </div>
                                    <div class="detailContent">
                                        <a href="orderinfo.html" class="delivery">签收</a>
                                        <div class="orderID">
                                            <span class="time"><?php echo $order_product_v[0]['addtimes']?></span>
                                            <span class="splitBorder">|</span>
                                            <span class="time">21:52:47</span>
                                        </div>
                                        <div class="orderID">
                                            <span class="num">共1件商品</span>
                                        </div>
                                    </div>
                                    <div class="state">待评价</div>
                                    <div class="price"><span class="sym">¥</span><?php echo $order_product_v[0]['price']?><span class="sym">.00</span></div>

                                </div>
                                <a href="index.php" class="btnPay">再次购买</a>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!--优惠券积分-->
                    <div class="twoTab">
                        <div class="twoTabModel Coupon">
                            <h5 class="squareTitle"><a href="#"><span class="splitBorder"></span>优惠券</a></h5>
                            <div class="Box">
                                <div class="CouponList">
                                    <span class="price">¥<strong class="num">50</strong></span>
                                    <p class="brandName"><a href="#">衣衣不舍商城 ABC品牌499减50</a></p>
                                    <p class="discount">满<span>499</span>元抵扣</p>
                                    <a href="index.php" class="btnReceive">
                                        <marquee >立即领取，去购物！</marquee></a>
                                </div>
                            </div>
                        </div>
                        <div class="twoTabModel credit">
                            <h5 class="squareTitle"><a href="#"><span class="splitBorder"></span>浏览记录</a></h5>
                            <div class="Box " >
                                <div class="am-slider am-slider-default am-slider-carousel person_box" data-am-flexslider="{itemWidth:108, itemMargin:3, slideshow: false}">
                                    <ul class="am-slides">
                                        <?php
                                            foreach($collect_msg as $c_k =>$c_v){
                                            $all_product = $db->getDatas('product','*','product_id="'.$c_v["product_id"].'"');
                                            foreach($all_product as $a_p_k => $a_p_v) {
                                                $imgarr = explode(',', $a_p_v['imgs']);

                                        ?>
                                        <li><a href="single.php?product_id=<?php echo $a_p_v['product_id']?>"><img src="<?php echo $imgarr[1]?>" style="height:120px"/></a></li>
                                        <?php
                                             }
                                            }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="wrap-right">

                <!-- 日历-->
                <div class="day-list">
                    <div class="s-title">
                        每日新鲜事
                    </div>
                    <div class="s-box">
                        <ul>
                            <li><a><p>粮油冲锋周 满128减18</p></a></li>
                            <li><a><p>防晒这么重要的事怎能随意</p></a></li>
                            <li><a><p>春日护肤面膜不可少，你选对了吗？</p></a></li>
                            <li><a><p>纯粹时尚，摩登出游，吸睛美衣</p></a></li>
                            <li><a><p>粮油冲锋周 满128减18</p></a></li>
                            <li><a><p>春日护肤面膜不可少，你选对了吗？</p></a></li>
                        </ul>
                    </div>
                </div>
                <!--新品 -->
                <div class="new-goods">
                    <div class="s-bar">
                        <i class="s-icon"></i>今日新品
                        <a class="i-load-more-item-shadow">15款新品</a>
                    </div>
                    <div class="new-goods-info">
                        <a class="shop-info" href="#">
                            <div class="face-img-panel">
                                <img src="img/imgsearch1.jpg" alt="">
                            </div>
                            <span class="new-goods-num ">4</span>
                            <span class="shop-title">剥壳松子</span>
                        </a>
                        <a class="follow">收藏</a>
                    </div>
                </div>

                <!--热卖推荐 -->
                <div class="new-goods">
                    <div class="s-bar">
                        <i class="s-icon"></i>热卖推荐
                    </div>
                    <div class="new-goods-info">
                        <a class="shop-info" href="#" target="_blank">
                            <div >
                                <img src="img/666.jpg" alt="">
                            </div>
                            <span class="one-hot-goods">￥189.60</span>
                        </a>
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
                <a href="person_center.php">个人中心</a>
            </li>
            <li class="person">
                <p>个人资料</p>
                <ul>
                    <li> <a href="person_message.php">个人信息</a></li>
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