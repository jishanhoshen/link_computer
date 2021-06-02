<!--================================Top Header Start ======================================-->
    <div class="col-sm-12" style="padding:0px;">
		<div class="main_header">
			<div class="container">
				<div class="top_bar">
					<div class="col-xs-7" style="padding:0px;">
						<ul class="header_ul">
							<li><i class="fa fa-phone" ></i> <span>01911048909</span></li>
							<a href="register/"><li><i class="fa fa-user"></i> <span>Register</span></li></a>
							<?php 
								if(isset($_SESSION['user_id'])){
									echo '
										<a onclick="redirect()"><li><i class="fa fa-users" aria-hidden="true"></i> <span>Logout</span></li></a>
										<script>
											function redirect(){
												window.location.href="join/session_destroy.php";
											}
										</script>
									';
								}else{
									echo '<a href="login/"><li><i class="fa fa-users" aria-hidden="true"></i> <span>Login</span></li></a>';
								}
							?>
							<?php 
								$like_select="select * from like_table where id='1'";
								$like_query=mysqli_query($db,$like_select);
								$like_row=mysqli_fetch_assoc($like_query);
								$like=$like_row['like_count'];
							?>
							<li><i class="fa fa-heart" aria-hidden="true"></i> <span class="hidden-xs hidden-sm">Pepole Like</span>(<?php echo $like?>)</li>
						</ul>
					</div>
					
					
					<div class="col-xs-offset-2 col-xs-3" style="padding:0px;">
						<div style="float:right;">
							<div class="language"><img src="img/language.png" alt="" /> <span class="hidden-xs hidden-sm">Language</span> <i class="fa fa-caret-down"></i></div>
							<div class="language_child"><img src="img/language.png" alt="" /> &nbsp <span>English</span></div>
						
							<div class="currency">
							$ <span class="hidden-xs hidden-sm">Currency</span> <i class="fa fa-caret-down"></i>
							<div class="currency_child"><span>৳ BDT</span></div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
	<!--===================================Middle Header Start =========================================-->
	<div class="middle_bar" style="padding:20px 0px;">
		<div class="col-sm-4" style="padding:0">
			<div class="logo" onclick="window.location.href=''" style="cursor:pointer;">
				<h1 style="display:inline-block;color:#22ace9;font-family:'Courgette', cursive;">Link</h1> <h1 style="display:inline-block;color:#cacaca;font-family:'Lobster', cursive;">Computer</h1>
			</div>
		</div>
		<div class="col-sm-12 col-md-5" style="padding:0">
			<div class="search_bar">
				<input type="text" placeholder="Search" class="search_keyword"/>
				<button class="search_icon"><i class="fa fa-search"></i></button>
			</div>
			<div class="search_result_box"></div>
		</div>
		<div class="col-xs-3" style="padding:0">
			<?php 
				$cart_select="select sum(price),sum(quantity) from cart where session_id='".$session_id."'";
				$cart_query=mysqli_query($db,$cart_select);
				$cart_row=mysqli_fetch_assoc($cart_query);
				$cart_total=$cart_row['sum(price)'];
				$cart_quantity=$cart_row['sum(quantity)'];
				if(empty($cart_quantity)){
				$cart_quantity=0;
				}
			?>
			<?php 
				if(isset($_SESSION['user_id'])){
					echo '
						<div class="user"><i class="fa fa-male"></i></div>
					';
				}
			?>
			<!--Show Success--><div class="cart_success"><i class="fa fa-check-circle"></i> <span>1 Item Added in Cart</span></div><!--Show Success-->
			<div class="cart" style="position:relative;">
			<span class="cart_quantity"><i class="fa fa-shopping-cart"></i> <?php echo $cart_quantity?> item(s)-$<?php echo $cart_total?>.00</span>
				<div class="cart_full_child">
					<ul class="cart_ul">
						<?php 
							if($cart_quantity==0){
								echo '
									<li style="height:40px;line-height:40px;text-align:center;border-bottom:0;"><span class="cart_heading">Your shopping cart is empty!</span></li>
								';
							}
							else{
						?>
						<li style="height:40px;line-height:40px;text-align:center;"><span class="cart_heading">Sub-Total</span> &nbsp <span class="cart_content">$<?php echo $cart_total?>.00</span></li>
						<li style="height:30px;line-height:30px;padding-left:25px;"><span class="cart_heading">Shipping-Tax(0%)</span> &nbsp <span class="cart_content">$00.00</span></li>
						<li style="height:30px;line-height:30px;padding-left:83px;"><span class="cart_heading">Vat(0%)</span> &nbsp <span class="cart_content">$00.00</span></li>
						<li style="height:30px;line-height:30px;padding-left:99px;"><span class="cart_heading">Total</span> &nbsp <span class="cart_content">$<?php echo $cart_total?>.00</span></li>
						<li style="height:60px;padding:12px 10px;">
							<div class="col-xs-5" style="padding:0;">
								<a href="cart/" class="view_cart"><i class="fa fa-shopping-cart"></i>&nbsp View Cart</a>
							</div>
							<div class="col-xs-offset-1 col-xs-6">
								<a href="checkout" class="checkout"><i class="fa fa-share"></i>&nbsp Checkout</a>
							</div>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!--===================================Middle Header End =========================================-->
			</div>
		</div>
	</div>
	<!----------Header Javascript Start----->
	<script>
		$(".language").click(function(){
			$(".language_child").stop().fadeToggle(100);
		});
		$(".currency").click(function(){
			$(".currency_child").stop().fadeToggle(100);
		});
		$(".cart_quantity").click(function(){
			$(".cart_full_child").stop().fadeToggle(100);
		});
		$(document).on("click", function(event){
			var $trigger = $(".cart");
			var $trigger2 = $(".language");
			var $trigger3 = $(".currency");
			var $trigger4 = $(".search_bar");
			if($trigger !== event.target && !$trigger.has(event.target).length){
				$(".cart_full_child").fadeOut(100);
			}   
			if($trigger2 !== event.target && !$trigger2.has(event.target).length){
				$(".language_child").fadeOut(100);
			} 
			if($trigger3 !== event.target && !$trigger3.has(event.target).length){
				$(".currency_child").fadeOut(100);
			}
			if($trigger4 !== event.target && !$trigger4.has(event.target).length){
				$(".search_result_box").fadeOut(100);
			}
		});
		$(document).ready(function(){
			$('.search_keyword').keyup(function(){
				$(".search_result_box").fadeIn(100);
				var search=$(this).val();
				$.post('join/search_1.php',
				{'search':search},
				function(data){
					$('.search_result_box').html(data);
				}
				)
			});
			
			$('.search_keyword').focus(function(){
				$(".search_result_box").fadeIn(100);
				var search=$(this).val();
				$.post('join/search_1.php',
				{'search':search},
				function(data){
					$('.search_result_box').html(data);
				}
				)
			});
			
		});
	</script>
	<!----------Header Javascript End----->
<!--================================Top Header End ======================================-->
	<div class="clear"></div>
	
	
<!--===================================Navbar Start =========================================-->
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Categories</a>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php 
					$category_select="select * from category";
					$category_query=mysqli_query($db,$category_select);
					while($category_row=mysqli_fetch_assoc($category_query)){
					$category=$category_row['categoryname'];
				?>
				<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $category?></span></a>
				<ul class="dropdown-menu">
					<?php 
						$protect=[];//protect duplicate value
						$company_select="select * from products where category='".$category."'";
						$company_query=mysqli_query($db,$company_select);
						while($company_row=mysqli_fetch_assoc($company_query)){
						if(!in_array($company_row['company'],$protect)){
						$company=$company_row['company'];
						$protect[]=$company_row['company'];//protect duplicate value
						$company_count_select="select * from products where category='".$category."'&&company='".$company."'";/*count number of company*/
						$company_count_query=mysqli_query($db,$company_count_select);
						$company_count=mysqli_num_rows($company_count_query);
					?>
					<li><a href="product/?c=<?php echo $category?>&&cc=<?php echo $company?>" class="nav_border"><?php echo $company.'('.$company_count.')'?></a></li>
					<?php }}?>
					<li><a href="product/?c=<?php echo $category?>" class="show_all">Show All <?php echo $category?></a></li>
				</ul>
				</li>
				<?php }?>
			</ul>
		</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<!--===================================Navbar End ===========================================-->