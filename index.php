<?php include('join/db.php');?>
<?php 
	if(!isset($_SESSION['bappy_id'])){
		$_SESSION['bappy_id']=session_id();
	}
	$session_id=$_SESSION['bappy_id'];
	$end_time=time()+720*60;//12 Hours
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="js/jquery.min.js"></script><!--Jquery-->
    <title>Link Computer || Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/all.min.css">
    <link rel="stylesheet" href="font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap&family=Philosopher:ital,wght@1,700&display=swap&family=Trade+Winds&display=swap" rel="stylesheet">
	
    <link rel="stylesheet" href="css/slider.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
  </head>
<body>
	<!--===================================All Header Start===========================================-->
									<?php include 'join/header_1.php';?>
	<!--===================================All Header End===========================================-->
	
	
	
	
	
	
	<!--===================================Slider Start ===========================================-->

	<article class="slider">
		<?php 
			$slider_select="select * from slider order by id ASC";
			$slider_query=mysqli_query($db,$slider_select);
			while($slider_row=mysqli_fetch_assoc($slider_query)){
			$slider=$slider_row['image'];
		?>
		<section class="slide">
			<img src="img/slider/<?php echo $slider?>" alt="">

			<div class="slide-content">
				
			</div>
		</section>
		<?php }?>
		<nav class="slider-nav">
			<span class="prev-slide"></span>
			<span class="next-slide"></span>
		</nav>
	</article>
	<div class="clear"></div>
	<!--===================================Slider End ===========================================-->
	
	
	<!--===================================Main Content Start ====================================-->
	<div class="container">
		<div class="ads">
			<?php 
				$ads_1_select="select * from ads where id='1'";
				$ads_1_query=mysqli_query($db,$ads_1_select);
				$ads_1_row=mysqli_fetch_assoc($ads_1_query);
				$ads_1=$ads_1_row['image'];
				$ads_1_id=$ads_1_row['id'];
				$ads_2_select="select * from ads where id='2'";
				$ads_2_query=mysqli_query($db,$ads_2_select);
				$ads_2_row=mysqli_fetch_assoc($ads_2_query);
				$ads_2=$ads_2_row['image'];
				$ads_2_id=$ads_2_row['id'];
				$ads_3_select="select * from ads where id='3'";
				$ads_3_query=mysqli_query($db,$ads_3_select);
				$ads_3_row=mysqli_fetch_assoc($ads_3_query);
				$ads_3=$ads_3_row['image'];
				$ads_3_id=$ads_3_row['id'];
			?>
			<div class="ads_child one" onclick="window.location.href='view_product?ads=<?php echo $ads_1_id?>'"><img src="img/product/<?php echo $ads_1?>" alt="" /></div>
			<div class="ads_child" onclick="window.location.href='view_product?ads=<?php echo $ads_2_id?>'"><img src="img/product/<?php echo $ads_2?>" alt="" /></div>
			<div class="ads_child" onclick="window.location.href='view_product?ads=<?php echo $ads_3_id?>'"><img src="img/product/<?php echo $ads_3?>" alt="" /></div>
			<div class="clear"></div>
		</div>
		
		
		
		
		
<!---========================================Latest Area Start==========================================--->
		<div class="latest latest_first">
		<div class="latest_caption">Latest Product</div>
		<div class="latest_border"></div>
			<div class="owl-carousel">
				<?php 
					$latest_no=1;
					$latest_select="select * from home_product where rule='latest'";
					$latest_query=mysqli_query($db,$latest_select);
					while($latest_row=mysqli_fetch_assoc($latest_query)){
					$latest_id=$latest_row['id'];
					$latest_code=$latest_row['code'];
					$latest_image=$latest_row['image'];
					$latest_title=substr($latest_row['title'],0,70);
					$latest_description=substr($latest_row['description'],0,105);
					$latest_old_price=$latest_row['regular_price'];
					$latest_current_price=$latest_row['current_price'];
				?>
				<div class="latest_product_main">
					<div class="latest_product_image" onclick="window.location.href='view_product?latest=<?php echo $latest_id?>'">
						<img src="img/product/<?php echo $latest_image?>" alt="" />
					</div>
					<div class="description">
						<div class="description_heading">
							<?php 
								if(strlen($latest_title)>=70){
									echo $latest_title.' . . .';
								}
								else{
									echo $latest_title;
								}
							?>
						</div>
						<div class="description_content">
							<?php 
								if(strlen($latest_description)>=105){
									echo $latest_description.'...';
								}
								else{
									echo $latest_description;
								}
							?>
						</div>
						<div class="description_price">$<?php echo $latest_current_price?>.00 <span> &nbsp <strike>$<?php echo $latest_old_price?>.00</strike></span>
						</div>
						<div class="description_vat">
							<span>Vat: $0.00</span>
						</div>
						<div class="cart_row latest_cart_row">
							<button class="add_cart" value="<?php echo $latest_no?>">
							<i class="fa fa-shopping-cart"></i>&nbsp Add to Cart
							</button>
							<button class="like"><i class="fa fa-heart"></i></button>
							<div class="compire"><i class="fas fa-cog"></i></div>
						</div>
						<input id="latest_title<?php echo $latest_no?>" type="hidden" value="<?php echo $latest_title?>"/>
						<input id="latest_code<?php echo $latest_no?>" type="hidden" value="<?php echo $latest_code?>"/>
						<input id="latest_image<?php echo $latest_no?>" type="hidden" value="<?php echo $latest_image?>"/>
						<input id="latest_price<?php echo $latest_no?>" type="hidden" value="<?php echo $latest_current_price?>"/>
					</div>
				</div>
				<?php $latest_no++;}?>
			</div>
		</div>
		<script>
			$(".add_cart").click(function(){
				var no=$(this).attr("value");
				var title=$('#latest_title'+no).val();
				var code=$('#latest_code'+no).val();
				var image=$('#latest_image'+no).val();
				var price=$('#latest_price'+no).val();
				var id='<?php echo $session_id?>';
				var time='<?php echo $end_time?>';
				$.post("join/cart_ajax.php",{title:title,code:code,image:image,price:price,id:id,time:time},function(data){$(".main_print").html(data)});
				setTimeout(function(){
					$("body,html").animate({scrollTop:0},500);
				},100);
				setTimeout(function(){
					$(".cart_success").fadeIn(500);
					setTimeout(function(){
						$(".cart_success").fadeOut(500);
					},3000);
					$.post("join/cart_total_ajax_1.php",{quantity:0},function(data){$(".cart").html(data)});
				},1000);
			});
		</script>
<!---========================================Latest Area End==========================================--->		
		
		
		
		<?php 
			$ads_4_select="select * from ads where id='4'";
			$ads_4_query=mysqli_query($db,$ads_4_select);
			$ads_4_row=mysqli_fetch_assoc($ads_4_query);
			$ads_4=$ads_4_row['image'];
		?>
		<div class="single_add"><img src="img/<?php echo $ads_4?>" alt=""/></div>
		
		
		
		
		
<!---====================================Low Price Area Start======================================--->			
		<div class="latest">
		<div class="latest_caption">Lowest Price</div>
		<div class="latest_border"></div>
			<div class="owl-carousel">
				<?php 
					$lowest_no=1;
					$lowest_select="select * from home_product where rule='lowest'";
					$lowest_query=mysqli_query($db,$lowest_select);
					while($lowest_row=mysqli_fetch_assoc($lowest_query)){
					$lowest_id=$lowest_row['id'];
					$lowest_code=$lowest_row['code'];
					$lowest_image=$lowest_row['image'];
					$lowest_title=substr($lowest_row['title'],0,70);
					$lowest_description=substr($lowest_row['description'],0,105);
					$lowest_old_price=$lowest_row['regular_price'];
					$lowest_current_price=$lowest_row['current_price'];
				?>
				<div class="latest_product_main">
					<div class="latest_product_image" onclick="window.location.href='view_product?latest=<?php echo $lowest_id?>'">
						<img src="img/product/<?php echo $lowest_image?>" alt="" />
					</div>
					<div class="description">
						<div class="description_heading">
							<?php 
								if(strlen($lowest_title)>=70){
									echo $lowest_title.' . . .';
								}
								else{
									echo $lowest_title;
								}
							?>
						</div>
						<div class="description_content">
							<?php 
								if(strlen($lowest_description)>=105){
									echo $lowest_description.'...';
								}
								else{
									echo $lowest_description;
								}
							?>
						</div>
						<div class="description_price">
							$<?php echo $lowest_current_price?>.00 <span> &nbsp <strike>$<?php echo $lowest_old_price?>.00</strike></span>
						</div>
						<div class="description_vat">
							<span>Vat: $0.00</span>
						</div>
						<div class="cart_row">
							<button class="lowest_add_cart" value="<?php echo $lowest_no?>">
							<i class="fa fa-shopping-cart"></i>&nbsp Add to Cart
							</button>
							<button class="like"><i class="fa fa-heart"></i></button>
							<div class="compire"><i class="fas fa-cog"></i></div>
						</div>
						<input id="lowest_title<?php echo $lowest_no?>" type="hidden" value="<?php echo $lowest_title?>"/>
						<input id="lowest_code<?php echo $lowest_no?>" type="hidden" value="<?php echo $lowest_code?>"/>
						<input id="lowest_image<?php echo $lowest_no?>" type="hidden" value="<?php echo $lowest_image?>"/>
						<input id="lowest_price<?php echo $lowest_no?>" type="hidden" value="<?php echo $lowest_current_price?>"/>
					</div>
				</div>
				<?php $lowest_no++;}?>
			</div>
		</div>
		<script>
			$(".lowest_add_cart").click(function(){
				var no=$(this).attr("value");
				var title=$('#lowest_title'+no).val();
				var code=$('#lowest_code'+no).val();
				var image=$('#lowest_image'+no).val();
				var price=$('#lowest_price'+no).val();
				var id='<?php echo $session_id?>';
				var time='<?php echo $end_time?>';
				$.post("join/cart_ajax.php",{title:title,code:code,image:image,price:price,id:id,time:time},function(data){$(".main_print").html(data)});
				setTimeout(function(){
					$("body,html").animate({scrollTop:0},500);
				},100);
				setTimeout(function(){
					$(".cart_success").fadeIn(500);
					setTimeout(function(){
						$(".cart_success").fadeOut(500);
					},3000);
					$.post("join/cart_total_ajax_1.php",{quantity:0},function(data){$(".cart").html(data)});
				},1000);
			});
		</script>
<!---==================================Low Price Area End===============================--->					
				
				
				
				
				
		
		
		
		
		
		
		
		
		
		
		
<!---==================================Regular Area Start===============================--->	
		<div class="latest">
		<div class="latest_caption">Regular Product</div>
		<div class="latest_border"></div>
				<?php 
					$regular_no=1;
					$regular_select="select * from home_product where rule='regular'";
					$regular_query=mysqli_query($db,$regular_select);
					while($regular_row=mysqli_fetch_assoc($regular_query)){
					$regular_id=$regular_row['id'];
					$regular_code=$regular_row['code'];
					$regular_image=$regular_row['image'];
					$regular_title=substr($regular_row['title'],0,70);
					$regular_description=substr($regular_row['description'],0,105);
					$regular_old_price=$regular_row['regular_price'];
					$regular_current_price=$regular_row['current_price'];
				?>
				<div class="latest_product_main regular">
					<div class="latest_product_image" onclick="window.location.href='view_product?latest=<?php echo $regular_id?>'">
						<img src="img/product/<?php echo $regular_image?>" alt="" />
					</div>
					<div class="description">
						<div class="description_heading">
							<?php 
								if(strlen($regular_title)>=70){
									echo $regular_title.' . . .';
								}
								else{
									echo $regular_title;
								}
							?>
						</div>
						<div class="description_content">
							<?php echo $regular_description?>
						</div>
						<div class="description_price">
							$<?php echo $regular_current_price?>.00 <span> &nbsp <strike>$<?php echo $regular_old_price?>.00</strike></span>
						</div>
						<div class="description_vat">
							<span>Vat: $0.00</span>
						</div>
						<div class="cart_row">
							<button class="regular_add_cart" value="<?php echo $regular_no?>">
							<i class="fa fa-shopping-cart"></i>&nbsp Add to Cart
							</button>
							<button class="like"><i class="fa fa-heart"></i></button>
							<div class="compire"><i class="fas fa-cog"></i></div>
						</div>
						<input id="regular_title<?php echo $regular_no?>" type="hidden" value="<?php echo $regular_title?>"/>
						<input id="regular_code<?php echo $regular_no?>" type="hidden" value="<?php echo $regular_code?>"/>
						<input id="regular_image<?php echo $regular_no?>" type="hidden" value="<?php echo $regular_image?>"/>
						<input id="regular_price<?php echo $regular_no?>" type="hidden" value="<?php echo $regular_current_price?>"/>
					</div>
				</div>
				<?php $regular_no++;}?>
				<div class="clear"></div>
		</div>
		<script>
			$(".regular_add_cart").click(function(){
				var no=$(this).attr("value");
				var title=$('#regular_title'+no).val();
				var code=$('#regular_code'+no).val();
				var image=$('#regular_image'+no).val();
				var price=$('#regular_price'+no).val();
				var id='<?php echo $session_id?>';
				var time='<?php echo $end_time?>';
				$.post("join/cart_ajax.php",{title:title,code:code,image:image,price:price,id:id,time:time},function(data){$(".main_print").html(data)});
				setTimeout(function(){
					$("body,html").animate({scrollTop:0},500);
				},100);
				setTimeout(function(){
					$(".cart_success").fadeIn(500);
					setTimeout(function(){
						$(".cart_success").fadeOut(500);
					},3000);
					$.post("join/cart_total_ajax_1.php",{quantity:0},function(data){$(".cart").html(data)});
				},1000);
			});
		</script>
<!---==================================Regular Area End===============================--->
	</div><!--end container-->
	<!--===================================Main Content End ====================================-->
	
	
	
	
	
	<!--===================================Footer Start ====================================-->
	<?php include('join/footer.php');?>
	<!--===================================Footer End ====================================-->
	
	
	
	
	
	
	
	
	
    
    <!--==============================Javascript Link Start ========================================-->
    <script src="js/bootstrap.min.js"></script>
	<script src="js/slider.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
		$(".like").click(function(){
			$.post("join/like_ajax.php",{like:0},function(data){$(".bbb").html(data)});
			window.location.href='';
		});
	</script>
	 <script>
	$('.owl-carousel').owlCarousel({
		loop:false,
		rewind:true,
		margin:10,
		nav:true,
		autoplay:false,
		autoplayTimeout:2000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:3
			},
			1000:{
				items:4
			}
		}
    
	})
  </script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>