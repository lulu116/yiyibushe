<div class="header-top navbar-fixed-top">
	<div class="container">
		<?php
			//使用session必须要开启
			session_start();
			if($_SESSION['username']){
		?>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-5">
					<!-- CONTACT INFO -->
					<div class="contact-info index-left">
						<img src="upload/image/<?php echo $_SESSION['userImg']?>" alt="" class="userImg">
						<strong><?php echo $_SESSION['tel']?></strong>
						<span id="nowTime"></span>
					</div>
					<!-- // CONTACT INFO -->
				</div>
				<div class="col-xs-12 col-sm-6 col-md-7">
					<ul class="actions header-icon">

						<li>喵喵喵！欢迎主人<b><?php echo $_SESSION['username']?></b>回家</li>
						<li><a href="./index.php?action=loginout&user_id=<?php echo $_SESSION['user_id']?>">退出登录</a></li>
						<?php
						}else {
								echo '
									<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-5">
								<!-- CONTACT INFO -->
								<div class="contact-info">
									<i class="iconfont-headphones round-icon"></i>
									<strong>+444 (100) 1234</strong>
									<span id="nowTime"></span>
								</div>
								<!-- // CONTACT INFO -->
							</div>
							<div class="col-xs-12 col-sm-6 col-md-7">
								<ul class="actions header-icon">
									<li><span class="login"></span><a href="login.php">请登录</a></li>
									<li><span class="regist"></span><a href="regist.php">免费注册</a></li>
								';
							}
						?>
						<li><span class="car"></span><a href="cart.php">购物车列表</a></li>
						<li><span class="cang"></span><a href="collect.php">收藏列表</a></li>
					</ul>
				</div>
			</div>
	</div>
	
	<!-- ADD TO CART MESSAGE -->
	<div class="cart-notification">
		<ul class="unstyled"></ul>
	</div>
	<!-- // ADD TO CART MESSAGE -->
</div>