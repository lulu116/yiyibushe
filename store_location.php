<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>店铺位置</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Favorite Icons -->
	 <link rel="shortcut icon" href="images/yiyi_logo.png">
	<!-- // Favorite Icons -->
	<!-- GENERAL CSS FILES -->
	<link rel="stylesheet" href="css/minified.css">
	<link rel="stylesheet" href="css/always.css">
	<!-- // GENERAL CSS FILES -->
	
	<!--[if IE 8]>
		<script src="js/respond.min.js"></script>
		<script src="js/selectivizr-min.js"></script>
	<![endif]-->
	<!--
	<script src="js/jquery.min.js"></script>
	-->
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>');</script>
	<script src="js/modernizr.min.js"></script>	
	<!-- PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/jquery.nouislider.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/innerpage.css">
	<!-- // PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/responsive.css">
	<!--百度地图-->
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=7SNO5z3z6MXqnHmV4UXpyKn0kndTgKDo"></script>
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
<body class="product-single">

	<!-- PAGE WRAPPER -->
<div id="page-wrapper">

	<!-- SITE HEADER -->
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
<!--	百度地图  店铺位置-->
	<div id="map"></div>
	<div id="container_box">
		<div id="left" class="float_left">
			<div id="place_search_box">
				<input type="text" id="place_input" placeholder="输入地点" class="float_left">
			</div>
		</div>
		<div id="right" class="float_left">
			<button id="search_btn">搜索</button>
			<img src="img/location.png" alt="点击定位到当前店铺" title="点击定位到当前店铺" class="map_img">
		</div>
	</div>
		<?php
			require './footer.php';
		?>
	    <!-- // SITE FOOTER -->
		
</div>
<!-- // PAGE WRAPPER -->

<!-- Essential Javascripts -->
<script src="js/minified.js"></script>
<!-- // Essential Javascripts -->
	<!-- Particular Page Javascripts -->
	<script src="js/jquery.nouislider.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/products.js"></script>
	<script src="js/user.js"></script>
</body>
</html>
<script src="js/map.js"></script>