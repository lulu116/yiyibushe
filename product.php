<?php
	require './common/common.php';
	//获取相应的产品信息
	//1.根据传送过来的一级分类获取相应的产品信息
	$product_cate_msg = $db->getDatas('product','*','cate_id_p="'.$_GET["cate_id_p"].'"');
	foreach($product_cate_msg as $p_c_m_k => $p_c_m_v){
		//2.根据当前一级分类找出对应二级分类与产品表中一致的信息
		$product_sub_msg = $db->getDatas('product','*','cate_id_c="'.$p_c_m_v["cate_id_c"].'"');
	}

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>产品列表页</title>
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

	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>');</script>
	<script src="js/modernizr.min.js"></script>	
	<!-- PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/jquery.nouislider.css">
	<link rel="stylesheet" href="css/isotope.css">
	<link rel="stylesheet" href="css/innerpage.css">
	<!-- // PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/responsive.css">
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
<body class="products-view">
			
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
	<!-- // SITE HEADER -->
	
		<!-- BREADCRUMB -->
		<div class="breadcrumb-container">
			<div class="container">
				<div class="relative">
					<ul class="bc push-up unstyled clearfix">
						<li><a href="index.php">主页</a></li>
						<li class="active">产品列表</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- // BREADCRUMB -->
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
			<div class="container">
				<div class="row">
					<div class="m-t-b clearfix">
						<section class="col-xs-12 col-sm-8 col-md-12">
							<section class="products-wrapper">
								<!-- DISPLAY MODE - NUMBER OF ITEMS TO BE DISPLAY - PAGINATION -->
								<header class="products-header">
									<div class="row">
										<div class="col-xs-12 col-sm-12 col-md-6 center-xs">
											<!-- DISPLAY MODE -->
											<ul class="unstyled inline-li li-m-r-l-sm pull-left">
												<li><a class="round-icon active" href="#" data-toggle="tooltip" data-layout="grid" data-title="切换到列表网格模式"><i class="iconfont-th"></i></a></li>
												<li><a class="round-icon" href="#" data-toggle="tooltip" data-layout="list" data-title="切换到列表视图模式"><i class="iconfont-list"></i></a></li>
											</ul>
											<!-- // DISPLAY MODE -->
										</div>
										<div class="space30 visible-xs"></div>
										<!-- PAGINATION -->
										<div class="col-xs-12 col-sm-12 col-md-6 center-xs">
											<ul class="paginator li-m-r-l pull-right">
												<li><a class="round-icon" href="#" data-toggle="tooltip" data-title="Previous Page"><i class="iconfont-angle-left"></i></a></li>
												<li><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a class="round-icon" href="#" data-toggle="tooltip" data-title="下一页"><i class="iconfont-angle-right"></i></a></li>
											</ul>
										</div>
										<!-- // PAGINATION -->
									</div>
								</header>
								<!-- // DISPLAY MODE - NUMBER OF ITEMS TO BE DISPLAY - PAGINATION -->
								
								<!-- PRODUCT LAYOUT -->
								<div class="products-layout grid m-t-b add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-title=".entry-title > a" data-url=".entry-title > a" data-price=".entry-price > .price">
									<?php
										foreach($product_sub_msg as $p_s_m_k => $p_s_m_v){
											$product_main = explode(',', $p_s_m_v['imgs']);
									?>
									<div class="product" data-category="women|women-jeans|women-skirt" data-brand="brand1" data-price="250" data-colors="red|blue|black|white" data-size="S|M|L">
										<div class="entry-media">
											<img data-src="<?php echo $product_main[1]?>" alt="<?php echo $p_s_m_v['productname']?>" title="<?php echo $p_s_m_v['productname']?>" class="lazyLoad thumb" style="height: 300px;"/>
											<div class="hover">
												<a href="single.php?product_id=<?php echo $p_s_m_v['product_id']?>" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<div class="circle ribbon ribbon-sale">新款</div>
													</li>
													<li>
														<a href="<?php echo $product_main[1]?>" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="" class="circle addCart" productId="<?php echo $p_s_m_v['product_id']?>"><i class="iconfont-shopping-cart"></i></a>
													</li>
												</ul>
												<div class="rate-bar">
													<input type="range" value="4.5" step="0.5" id="backing1" />
													<div class="rateit" data-rateit-backingfld="#backing1" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
												</div>
											</div>
										</div>
										<div class="entry-main">
											<h5 class="entry-title">
												<a href="single.php"><?php echo $p_s_m_v['productname']?></a>
											</h5>
											<div class="entry-description visible-list">
												<p><?php echo $p_s_m_v['detail']?></p>
											</div>
											<div class="entry-price">
												<s class="entry-discount">$<?php echo $p_s_m_v['price']?>.00</s>
												<strong class="accent-color price">$<?php echo $p_s_m_v['price'] * 0.95 ?> </strong>
												<a href="#" class="btn btn-round btn-default visible-list addCart" productId="<?php echo $p_s_m_v['product_id']?>">加入购物车</a>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r addCollect" productId="<?php echo $p_s_m_v['product_id']?>">添加收藏</a>
												<a href="#" class="pull-right addCart" productId="<?php echo $p_s_m_v['product_id']?>">加入购物车</a>
											</div>
										</div>
									</div>
									<?php
										}
									?>
									
								</div>
								<!-- // PRODUCT LAYOUT -->
							</section>
							
						</section>
					</div>
					
				</div>
			</div>
		</main>
		<!-- // SITE MAIN CONTENT -->
		
		<!-- SITE FOOTER -->
		<?php 
			require './footer.php';
		 ?>
	    <!-- // SITE FOOTER -->
		
</div>
<!-- // PAGE WRAPPER -->

<!-- Essential Javascripts -->
<script src="js/minified.js"></script>
<!-- // Essential Javascripts -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27646173-3', 'themina.net');
  ga('send', 'pageview');

</script>
	<!-- Particular Page Javascripts -->
	<script src="js/jquery.nouislider.js"></script>
	<script src="js/jquery.isotope.min.js"></script>
	<script src="js/products.js"></script>
	<script src="js/user.js"></script>
	<!-- // Particular Page Javascripts -->
</body>
</html>