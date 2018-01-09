<?php
	require './common/common.php';
	//用户下线
	if($_GET['action'] == 'loginout'){
		unset($_SESSION['username']);
		unset($_SESSION['userImg']);
		unset($_SESSION['tel']);
		unset($_SESSION['user_id']);
		//更新用户表
		$sql = 'UPDATE user SET loginout = now() WHERE user_id='.$_GET['user_id'];
		$db->dblink->query($sql);
	}
	//轮播图
	$slider = $db->getDatas('product','*','img=1');
	//女装推荐
	$woman_slider = $db->getDatas('product','*','woman_img=1');
	//男装推荐
	$man_slider = $db->getDatas('product','*','man_img=1');
	//二级菜单
	$woman_menu = $db->getDatas('cate','*','parent_cate_id=0');

?>
<!DOCTYPE html>
<html class="noIE" lang="en-US">
<head>
	<meta charset="UTF-8" />
	<title>衣衣不舍电商网站</title>
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
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>');</script>
	<script src="js/modernizr.min.js"></script>
	<!-- PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link href="css/flexslider.css" rel="stylesheet" />
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
<body class="home">
			
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
					<!-- CURRENCY / LANGUAGE / USER MENU -->
					<div class="actions">
						<div class="clearfix"></div>
						<!-- USER RELATED MENU -->
						<nav id="tiny-menu" class="clearfix">

						</nav>
						<!-- // USER RELATED MENU -->
					</div>
					<!-- // CURRENCY / LANGUAGE / USER MENU -->
					<!-- SITE LOGO -->
					<div class="logo-wrapper">
						<a href="index.php" class="logo" title="GFashion - Responsive e-commerce HTML Template">
							<img src="img/logo.png" alt="GFashion - Responsive e-commerce HTML Template" />
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
								<a href="index.php">商品种类</a>
								<!-- MEGA MENU -->
								<div class="mega-menu" data-col-lg="9" data-col-md="12">
									<div class="row">
										<?php
											foreach($woman_menu as $w_k => $w_v){
											$cate_id = $w_v['cate_id'];
										?>
										<div class="col-md-2">
											<h4 class="menu-title"><?php echo $w_v['catename'] ?></h4>
											<ul class="mega-sub">
												<?php
													$woman_menu_sub = $db->getDatas('cate', '*', 'parent_cate_id="' . $cate_id . '"');
													foreach($woman_menu_sub as $w_m_s_k => $w_m_s_v){
														echo '<li><a href="product.php?cate_id_p='.$w_m_s_v['parent_cate_id'].'">'.$w_m_s_v["catename"].'</a></li>';
													}
												?>
											</ul>
										</div>
											<?php
										}
										?>
									</div>
								</div>
								<!-- // MEGA MENU -->

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
						
						<!-- MOBILE MENU -->
						<div id="mobile-menu" class="dl-menuwrapper visible-xs visible-sm">
							<button class="dl-trigger"><i class="iconfont-reorder round-icon"></i></button>
							<ul class="dl-menu">
								<li class="active">
									<a href="index.php">主页</a>
								</li>
								<li>
									<a href="index.php">女装</a>
								</li>
								<li>
									<a href="index.php">男装</a>

								</li>
							</ul>
						</div>
						<!-- // MOBILE MENU -->

					</nav>
					<!-- // SITE NAVIGATION MENU -->
				</div>
			</div>
		</div>
		<!-- // MAIN HEADER -->
	</header>
	<!-- // SITE HEADER -->
    
		
		<!-- HOMEPAGE SLIDER -->
		<div id="home-slider">
		<div class="flexslider">
	<!-- 主页轮播图 -->
	<ul class="slides">
		<?php
		foreach($slider as $s_k => $s_v){
			$slider_img = explode(',', $s_v['imgs']);
			?>
			<li>
				<!-- THE MAIN IMAGE IN THE SLIDE -->
				<img src="<?php echo $slider_img[1]?>" alt=""/>

				<!-- THE CAPTIONS OF THE FIRST SLIDE -->
				<div class="flex-caption h6 text-bold gfc uppercase animated"
					 data-animation="fadeInLeftBig"
					 data-x="800"
					 data-y="110"
					 data-speed="600"
					 data-start="1200">新系列</div>

				<div class="flex-caption herotext text-bold gfc animated"
					 data-animation="fadeInRightBig"
					 data-x="580"
					 data-y="140"
					 data-speed="900"
					 data-start="2000">秋季时装为您推荐</div>

				<div class="flex-caption h6 text-bold gfc text-center animated"
					 data-animation="fadeInDown"
					 data-x="739"
					 data-y="260"
					 data-speed="1600"
					 data-start="2900">
					舒适的针织衫和温暖的夹克<br/>
					<a href="single.php?product_id=<?php echo $s_v['product_id']?>" class="btn btn-primary uppercase">查看详情</a>
				</div>

			</li>
			<?php
		}
		?>
		
	</ul>
	<!-- 主页轮播图结束-->
</div>

<script>
	jQuery(function($) {
		var $slider = $('#home-slider > .flexslider');
		$slider.find('.flex-caption').each(function() {
			var $this = $(this);
			var configs = {
				left: $this.data('x'),
				top: $this.data('y'),
				speed: $this.data('speed') + 'ms',
				delay: $this.data('start') + 'ms'
			};
			if ( configs.left == 'center' && $this.width() !== 0 ) 
			{
				configs.left = ( $slider.width() - $this.width() ) / 2;
			}
			if ( configs.top == 'center' && $this.height() !== 0 ) 
			{
				configs.top = ( $slider.height() - $this.height() ) / 2;
			}
			
			$this.data('positions', configs);
			
			$this.css({
				'left': configs.left + 'px',
				'top': configs.top + 'px',
				'animation-duration': configs.speed,
				'animation-delay': configs.delay
			});
		});
		
		$(window).on('resize', function() {
			var wW = $(window).width(),
				zoom = ( wW >= 1170 ) ? 1 : wW / 1349;
			$('.flex-caption.gfc').css('zoom', zoom);
		});
		$(window).trigger('resize');
		
		
		
		$slider.imagesLoaded(function() {
			$slider.flexslider({
				animation: 'slide',
				easing: 'easeInQuad',
				slideshow: false,
				nextText: '<i class="iconfont-angle-right"></i>',
				prevText: '<i class="iconfont-angle-left"></i>',
				start: function() {
					flex_fix_pos(1);
				},
				before: function(slider) {
					// initial caption animation for next show
					$slider.find('.slides li .animation-done').each(function() {
						$(this).removeClass('animation-done');
						var animation = $(this).attr('data-animation');
						$(this).removeClass(animation);
					});
					
					flex_fix_pos(slider.animatingTo + 1);
				},
				after: function() {
					// run caption animation
					$slider.find('.flex-active-slide .animated').each(function() {
						var animation = $(this).attr('data-animation');
						$(this).addClass('animation-done').addClass(animation);
					});
				}
			});
		});
		
		
		function flex_fix_pos(i) {
			$slider.find('.slides > li:eq(' + i + ') .gfc').each(function() {
				var $this = $(this),
					pos = $(this).data('positions');
					
				if ( pos.left == 'center' )
				{
					pos.left = ( $slider.width() - $this.width() ) / 2;
					$this.css('left', pos.left + 'px');
					$this.data('positions', pos);
				}
				if ( pos.top == 'center' )
				{
					pos.top = ( $slider.height() - $this.height() ) / 2;
					$this.css('left', pos.top + 'px');
					$this.data('positions', pos);
				}
			});
		}
	});
</script>	
	</div>
		<!-- // HOMEPAGE SLIDER -->
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
			
			<!-- PROMO BOXES -->
			<section class="section promos">
				<div class="container">
					<div class="row">
					
						<div class="col-md-4">
							<div class="promo accent-background first-child first-row animated" data-animation="fadeInLeft">
								<div class="inner text-center">
									<h1 class="uppercase text-semibold">
										<a href="#">
											<span class="inverse-color">销售</span>高达35％折扣<span class="inverse-color">看这里</span>
										</a>
									</h1>
									<h5 class="uppercase">衣衣不舍创建于2013</h5>
								</div>
							</div>
						</div>
					
						<div class="col-md-4">
							<div class="promo inverse-background first-row animated" data-animation="fadeInDown" style="background: url('img/P2200214.jpg') no-repeat; background-size: 100%;">
								<div class="inner text-center np">
									<div class="ribbon">
										<h6 class="nmb">新装来袭</h6>
										<h5 class="text-semibold uppercase nmb">皮鞋时装</h5>
										<div class="space10"></div>
										<a href="product.php" class="with-icon prepend-icon"><i class="iconfont-caret-right"></i><span>去购物</span></a>
									</div>
								</div>
							</div>
						</div>
					
						<div class="col-md-4">
							<div class="promo inverse-background first-row animated" data-animation="fadeInRight">
								<div class="inner text-center">
									<h1 class="uppercase text-bold">
										<a href="#">
											免费<span class="inverse-color">送货</span>
										</a>
									</h1>
									<h5 class="uppercase">单笔订单满1000元即可</h5>
								</div>
							</div>
						</div>
					
					</div>
				</div>
			</section>
			<!-- // PROMO BOXES -->
			
			<!-- FEATURED PRODUCTS -->
			<section class="section featured visible-items-4">
				<div class="container">
					<div class="row">
						<header class="section-header clearfix col-sm-offset-3 col-sm-6">
							<h3 class="section-title">新装上市-女装</h3>
							<p class="section-teaser">本网站为顾客朋友们推荐:棉衣羽、绒服针织、毛衣、风衣、大衣、夹克 皮草、皮衣、雪纺衫...</p>
						</header>
						
						<div class="clearfix"></div>
						
						<!-- BEGIN CAROUSEL -->
						<div id="featured-products" class="add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-title=".entry-title > a" data-url=".entry-title > a" data-price=".entry-price > .price">
						
							<div class="owl-controls clickable top">
								<div class="owl-buttons">
									<div class="owl-prev"><i class="iconfont-angle-left"></i></div>
									<div class="owl-next"><i class="iconfont-angle-right"></i></div>
								</div>
							</div>
							
							<div class="owl-carousel owl-theme" data-visible-items="4" data-navigation="true" data-lazyload="true">
								<?php
									foreach($woman_slider as $w_s_k => $w_s_v){
										$imgarr = explode(',', $w_s_v['imgs']);
								?>
								<div class="product">
									<div class="entry-media">
										<img data-src="<?php echo $imgarr[1]?>" alt="" class="lazyOwl thumb" style="height: 300px"/>
										<div class="hover">

											<a href="single.php?product_id=<?php echo $w_s_v['product_id']?>" class="entry-url"></a>
											<ul class="icons unstyled">
												<li>
													<div class="circle ribbon ribbon-sale">新款</div>
												</li>
												<li>
													<a href="<?php echo $imgarr[1]?>" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
												</li>
												<li>
													<a href="" class="circle addCart" productId="<?php echo $w_s_v['product_id']?>"><i class="iconfont-shopping-cart"></i></a>
												</li>

											</ul>
											<div class="rate-bar">
												<input type="range" value="4.5" step="1.0" id="backing1" />
												<div class="rateit" data-rateit-backingfld="#backing1" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
											</div>
										</div>
									</div>
									<div class="entry-main">
										<h5 class="entry-title">
											<a href="#"><?php echo $w_s_v['productname']?></a>
										</h5>
										<div class="entry-price">
											<s class="entry-discount">$<?php echo $w_s_v['price']?>.00</s>
											<strong class="accent-color price">$<?php echo $w_s_v['price'] * 0.95 ?></strong>
										</div>
										<div class="entry-links clearfix">
											<a href="" class="pull-left m-r addCollect" productId="<?php echo $w_s_v['product_id']?>" >添加收藏</a>
											<a href="" class="pull-right addCart" productId="<?php echo $w_s_v['product_id']?>">加入购物车</a>
										</div>
									</div>
								</div>
								<?php
									}
								?>
							</div>
								
						</div>
						<!-- // END CAROUSEL -->
						
					</div>
				</div>
			</section>
			<!-- // FEATURED PRODUCTS -->
			
			<!-- NEW ARRIVAL PRODUCTS -->
			<section class="section new-arrivals visible-items-5">
				<div class="container">
					<div class="row">
						<header class="section-header clearfix col-sm-offset-3 col-sm-6">
							<h3 class="section-title">新装上市-男装</h3>
							<p class="section-teaser">本网站为顾客朋友们推荐:棉衣羽、绒服针织、毛衣、风衣、大衣、夹克 皮草、皮衣、雪纺衫...</p>
						</header>
						
						<div class="clearfix"></div>
						
						<!-- BEGIN CAROUSEL -->
						<div id="new-arrivals-products" class="add-cart" data-product=".product" data-thumbnail=".entry-media .thumb" data-title=".entry-title > a" data-url=".entry-title > a" data-price=".entry-price > .price">
							<div class="owl-controls clickable outside">
								<div class="owl-buttons">
									<div class="owl-prev"><i class="iconfont-angle-left"></i></div>
									<div class="owl-next"><i class="iconfont-angle-right"></i></div>
								</div>
							</div>
							<div class="owl-carousel owl-theme" data-visible-items="5" data-navigation="true" data-lazyload="true">
								<?php
									foreach($man_slider as $m_s_k => $m_s_v){
										$imgarr = explode(',', $m_s_v['imgs']);
								?>
								<div class="product">
									<div class="entry-media">
										<img data-src="<?php echo $imgarr[1]?>" alt="<?php echo $m_s_v['productname']?>" title="<?php echo $m_s_v['productname']?>" class="lazyOwl thumb" style="height:300px;" />
										<div class="hover">
											<a href="single.php?product_id=<?php echo $m_s_v['product_id']?>" class="entry-url"></a>
											<ul class="icons unstyled">
												<li>
													<div class="circle ribbon ribbon-sale">新款</div>
												</li>
												<li>
													<a href="<?php echo $imgarr[1]?>" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
												</li>
												<li>
													<a href="#" class="circle addCart" productId="<?php echo $m_s_v['product_id']?>"><i class="iconfont-shopping-cart"></i></a>
												</li>
											</ul>
											<div class="rate-bar">
												<input type="range" value="4.5" step="0.5" id="backing9" />
												<div class="rateit" data-rateit-backingfld="#backing9" data-rateit-starwidth="12" data-rateit-starheight="12" data-rateit-resetable="false"  data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5"></div>
											</div>
										</div>
									</div>
									<div class="entry-main">
										<h5 class="entry-title">
											<a href="#"><?php echo $m_s_v['productname']?></a>
										</h5>
										<div class="entry-price">
											<s class="entry-discount">$<?php echo $m_s_v['price'] ?>.00</s>
											<strong class="accent-color price">$<?php echo $m_s_v['price'] * 0.95 ?></strong>
										</div>
										<div class="entry-links clearfix">
											<a href="" class="pull-left m-r addCollect" productId="<?php echo $m_s_v['product_id']?>">添加收藏</a>
											<a href="" class="pull-right addCart" productId="<?php echo $m_s_v['product_id']?>">加入购物车</a>
										</div>
									</div>
								</div>
								<?php
									}
								?>
							</div>

						</div>
						<!-- // END CAROUSEL -->
						
					</div>
				</div>
			</section>
			<!-- // NEW ARRIVAL PRODUCTS -->
			
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

<!-- Particular Page Javascripts -->
<script src="js/owl.carousel.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/user.js"></script>
<!-- // Particular Page Javascripts -->
</body>
</html>