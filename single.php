<?php
	require './common/common.php';
	//1.根据ID获取产品信息
	$product_msg = $db->getOneData('product','*','product_id="'.$_GET["product_id"].'"');
	$single_img = explode(',', $product_msg['imgs']);
	//2.为您推荐
	//随机数
	$rand = mt_rand(38, 55);
	$recommend = $db->getDatas('product','*','product_id BETWEEN '.$rand.' AND 55 AND img =0');

	//3.颜色、尺寸、库存
 	$color = $db->getDatas('color','*','product_id = "'.$product_msg["product_id"].'"');
	$size = $db->getDatas('size','*','product_id = "'.$product_msg["product_id"].'"');
	$stock = $db->getOneData('stock','*','product_id = "'.$product_msg["product_id"].'"');

	//商品评论
	$comment_msg = $db->getDatas('comment','*','product_id="'.$_GET["product_id"].'"');

?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8" />
	<title>产品详情页</title>
	<meta name="description" content=""/>
	<meta name="keywords" content=""/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Favorite Icons -->
	 <link rel="shortcut icon" href="images/yiyi_logo.png">
	<!-- // Favorite Icons -->
	<!-- GENERAL CSS FILES -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/minified.css">
	<link rel="stylesheet" href="css/always.css">
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>');</script>
	<script src="js/modernizr.min.js"></script>	
	<!-- PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/jquery.nouislider.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/innerpage.css">
	<!-- // PARTICULAR PAGES CSS FILES -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->

    <!-- <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'> -->
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

	</header>
	<!-- // SITE HEADER -->
	
		<!-- BREADCRUMB -->
		<div class="breadcrumb-container">
			<div class="container">
				<div class="relative">
					<ul class="bc unstyled clearfix">
						<li><a href="index.php">主页</a></li>
						<li><a href="index.php">产品列表</a></li>
						<li class="active">产品详情</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- // BREADCRUMB -->
		
		<!-- SITE MAIN CONTENT -->
		<main id="main-content" role="main">
			<section class="section">
				<div class="container">

					<div class="row">
						<!-- PRODUCT PREVIEW -->
						<div class="col-xs-6 col-sm-6">
							<div class="product-preview">
								<div class="big-image">
									<a href="<?php echo $single_img[1]?>" data-toggle="lightbox">
										<img src="<?php echo $single_img[1]?>" alt="<?php echo $product_msg['productname']?>" title="<?php echo $product_msg['productname']?>" style="width: 400px;height: 460px;"/>
									</a>
								</div>
								<ul class="thumbs unstyled clearfix">
									<li><a href="<?php echo $single_img[1]?>"><img src="<?php echo $single_img[1]?>" alt="<?php echo $product_msg['productname']?>" title="<?php echo $product_msg['productname']?>" style="height: 84px;width:84px;"/></a></li>
									<li><a href="<?php echo $single_img[2]?>"><img src="<?php echo $single_img[2]?>" alt="<?php echo $product_msg['productname']?>" title="<?php echo $product_msg['productname']?>"  style="height: 84px;width:84px;"/></a></li>
									<li><a href="<?php echo $single_img[3]?>"><img src="<?php echo $single_img[3]?>" alt="<?php echo $product_msg['productname']?>" title="<?php echo $product_msg['productname']?>"   style="height: 84px;width:84px;"/></a></li>
								</ul>
							</div>

						</div>
						<!-- // PRODUCT PREVIEW -->
						<div class="space40 visible-xs"></div>
						<!-- PRODUCT DETAILS -->
						<div class="col-xs-6 col-sm-6">
							<section class="product-details add-cart">
								<header class="entry-header">
									<h2 class="entry-title uppercase"><?php echo $product_msg['productname']?></h2>
								</header>
								<article class="entry-content">
									<figure>
										<span class=" inline-middle"><s>$<?php echo $product_msg['price']?>.00</s></span>&nbsp;&nbsp;&nbsp;
										<span class="entry-price inline-middle">$<?php echo $product_msg['price'] * 0.95 ?></span>
										<br><br>
										<h2 style="color: #FA6F57;font-weight: 600;">衣衣不舍电商网站参数列表：</h2>
										<ul class="entry-meta unstyled">
											<li>
												颜色：
												<select id="color_sel">
													<option value="0">请选择</option>
													<?php
														foreach($color as $color_k => $color_v){
															echo '<option value="'.$color_v["color_id"].'">'.$color_v["colorname"].'</option>';
														}
													?>
												</select>
											</li>
											<li>
												尺寸：
												<select id="size_sel">
													<option value="0">请选择</option>
													<?php
													foreach($size as $size_k => $size_v){
														echo '<option value="'.$size_v["size_id"].'">'.$size_v["sizename"].'</option>';
													}
													?>
												</select>
											</li>
											<li>数量:
											    <input type="number"/>
											</li>
											<li>
												库存：<span style="font-size:15px;color:#FA6F57;font-weight:600;"><?php echo $stock['stocknum']?></span>
											</li>
										</ul>
										<div class="clearfix"></div>

										<figcaption class="m-b-sm">
											<h5 class="subheader uppercase"><?php echo $product_msg['productname']?>简介:</h5>
											<p><?php echo $product_msg['detail']?></p>
										</figcaption>
										

										<ul class="inline-li li-m-r-l m-t-lg">
											<li>
												<a href="#" class="btn btn-danger btn-lg btn-round add-to-cart" productId="<?php echo $product_msg['product_id']?>" id="addCart">加入购物车</a>
											</li>

										</ul>

									</figure>
								</article>
							</section>
						</div>
						<!-- // PRODUCT DETAILS -->
					</div>

					<div class="m-t-lg">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#product-description" data-toggle="tab">产品描述</a></li>
							<li><a href="#product-reviews" data-toggle="tab">产品类型</a></li>
							<li><a href="#product-shipping" data-toggle="tab">商家保证</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="product-description">
								<h3 style="color: #FA6F57">喵喵喵！你好！<?php echo $product_msg['productname']?></h3>
								<p><?php echo $product_msg['detail']?></p>
							</div>
							<div class="tab-pane fade in" id="product-reviews">
								<div class="comments-list">
									<span class="logo-disqus"><?php echo $product_msg['types']?></span>
								</div>
							</div>
							<div class="tab-pane fade in" id="product-shipping">
								<p><?php echo $product_msg['assure']?></p>
							</div>
						</div>
					</div>
					<div class="product-comment" >
							<div class="response">
                            <h3>喵喵喵！<?php echo $product_msg['productname']?>评论</h3>
                            <?php
                            	foreach ($comment_msg as $key => $value) {	
                            ?>
                            <div class="media response-info">
                                <div class="media-left response-text-left">
                                    <div>
                                        <img class="userImg" src="upload/image/<?php echo $_SESSION['userImg']?>" alt="">
                                    </div>
                                    <h5><a href="#"><b><?php echo $_SESSION['username']?></b></a></h5>
                                </div>
                                <div class="media-body response-text-right">
                                    <p style="width: 950px;word-wrap:break-word"><?php echo $value['content']?></p>
                                    <ul>
                                        <li>
                                            <?php echo $value['commenttimes']?>
                                        </li>

                                    </ul>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <?php
                            	}
                            ?>
                        </div>
					</div>
				</div>
			</section>

			<!-- FEATURED PRODUCTS -->
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
			<!-- // FEATURED PRODUCTS -->
			
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
	<script src="js/jquery.nouislider.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/products.js"></script>
	<script src="js/user.js"></script>
	<!-- // Particular Page Javascripts -->


</body>
</html>