<?php
	require './common/common.php';
	//1.为你推荐
	$rand = mt_rand(38, 55);
	$recommend = $db->getDatas('product','*','product_id BETWEEN '.$rand.' AND 55 AND img =0');

	//2.购物车
	$product_cart = $db->getDatas('cart','cart_id,product_id,cart_num');
	foreach($product_cart as $p_cart_k => $p_cart_v){
		//根据产品ID获取产品信息
		$product_msg = $db->getDatas('product','product_id,productname,imgs,price,types','product_id="'.$p_cart_v["product_id"].'"');
		$product_cart[$p_cart_k]['cart_msg'] = $product_msg;
	}
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>购物车页</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Favorite Icons -->
	<link rel="shortcut icon" href="images/yiyi_logo.png">

	<link rel="stylesheet" href="css/minified.css">
	<link rel="stylesheet" href="css/always.css">

	<script src="js/respond.min.js"></script>
	<script src="js/selectivizr-min.js"></script>

	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>');</script>
	<script src="js/modernizr.min.js"></script>	
	<!-- PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/innerpage.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
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
<body>
			
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
					<ul class="bc unstyled clearfix">
						<li><a href="index.php">主页</a></li>
						<li class="active">购物车页</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- // BREADCRUMB -->
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
				
			<section class="section">
				<div class="container">
					
					<table class="tbl-cart">
						<thead>
							<tr>
								<th>主图</th>
								<th>商品名称</th>
								<th style="width: 15%;">商品价格</th>
								<th style="width: 15%;">购买数量</th>
								<th class="hidden-xs" style="width: 15%;">总价</th>
								<th class="hidden-xs" style="width: 10%;"></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$cart_all_arr = [];
								foreach($product_cart as $p_c_k => $p_c_v){
									//购物车总数量
									$cart_num_total += $p_c_v['cart_num'];
									$cart_id = $p_c_v['cart_id'];
									$cart_all_arr = $cart_id;
									foreach($p_c_v['cart_msg'] as $p_c_v_parent => $p_c_v_child){
									$cart_img = explode(',', $p_c_v_child['imgs']);
									//每件商品的总价
									$each_price = $p_c_v_child['price'] * 0.95 * $p_c_v['cart_num'];
									//总价格
									$total_price += $each_price;
							?>
							<tr>
								<td>
									<a class="entry-thumbnail" href="<?php echo $cart_img[1]?>" data-toggle="lightbox">
										<img src="<?php echo $cart_img[1]?>" alt="<?php echo $p_c_v_child['productname']?>" title="<?php echo $p_c_v_child['productname']?>"/>
									</a>
									<a class="entry-title" href="single.php?product_id=<?php echo $p_c_v_child['product_id']?>"><?php echo $p_c_v_child['types']?></a>
								</td>
								<td>
									<a class="entry-title" href="single.php"><?php echo $p_c_v_child['productname']?></a>
								</td>
								<td><span class="unit-price">$<?php echo $p_c_v_child['price'] * 0.95 ?></span></td>
								<td>
									<div class="qty-btn-group">
										<button type="button" class="down"><i class="iconfont-caret-down inline-middle"></i></button>
										<input type="text" value="<?php echo $p_c_v['cart_num']?>" />
										<button type="button" class="up"><i class="iconfont-caret-up inline-middle"></i></button>
									</div>
								</td>

								<td class="hidden-xs"><strong class="text-bold row-total">$<?php echo $each_price?></strong></td>
								<td class="hidden-xs"><button type="button" class="btn-default btn-xs delCart" cart_id="<?php echo $cart_id?>" >×</button></td>
							</tr>
							<?php
								}
								}
							?>
						</tbody>
					</table>
					
					<div class="shopcart-total pull-right clearfix">
						<div class="cart-subtotal text-xs m-b-sm clearfix">
							<span class="pull-left">购买数量:</span>
							<span class="pull-right"><?php echo $cart_num_total?></span>
						</div>
						<div class="cart-total text-bold m-b-lg clearfix">
							<span class="pull-left">总价格:</span>
							<span class="pull-right">$<?php echo $total_price?></span>
						</div>
						<div class="text-center">
							<a class="btn btn-round btn-success uppercase" href="index.php">继续购物</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<a class="btn btn-round btn-danger uppercase" href="pay.php?cart_id=<?php echo $cart_all_arr ?>">立即购买</a>
						</div>
					</div>
					
				</div>
			</section>
			

			<!-- RELATED PRODUCTS -->
			<section class="section featured visible-items-4">
				<div class="container">
					<div class="row">
						<header class="section-header clearfix col-sm-offset-3 col-sm-6">
							<h3 class="section-title">为您推荐</h3>
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
								foreach($recommend as $recommend_k => $recommend_v){
									$imgarr = explode(',', $recommend_v['imgs']);
									?>
									<div class="product">
										<div class="entry-media">
											<img data-src="<?php echo $imgarr[1]?>" alt="<?php echo $recommend_v['productname']?>" title="<?php echo $recommend_v['productname']?>" class="lazyOwl thumb" style="height:300px;" />
											<div class="hover">
												<a href="single.php?product_id=<?php echo $recommend_v['product_id']?>" class="entry-url"></a>
												<ul class="icons unstyled">
													<li>
														<div class="circle ribbon ribbon-sale">新款</div>
													</li>
													<li>
														<a href="<?php echo $imgarr[1]?>" class="circle" data-toggle="lightbox"><i class="iconfont-search"></i></a>
													</li>
													<li>
														<a href="#" class="circle addCart" productId="<?php echo $recommend_v['product_id']?>"><i class="iconfont-shopping-cart"></i></a>
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
												<a href="#"><?php echo $recommend_v['productname']?></a>
											</h5>
											<div class="entry-price">
												<s class="entry-discount">$<?php echo $recommend_v['price'] ?>.00</s>
												<strong class="accent-color price">$<?php echo $recommend_v['price'] * 0.95 ?></strong>
											</div>
											<div class="entry-links clearfix">
												<a href="#" class="pull-left m-r addCollect" productId="<?php echo $recommend_v['product_id']?>">添加收藏</a>
												<a href="#" class="pull-right addCart" productId="<?php echo $recommend_v['product_id']?>">加入购物车</a>
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
			<!-- // RELATED PRODUCTS -->
			
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
	<script src="js/products.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/user.js"></script>
	<!-- // Particular Page Javascripts -->
	
</body>
</html>