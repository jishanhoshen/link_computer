<?php include('../join/db.php');?>
<?php
	$session_id=$_SESSION['bappy_id'];
	$end_time=time()+720*60;//12 Hours
	if(isset($_GET['id']))
	{
	$id=htmlspecialchars($_GET['id']);
	$p_table='products';
	}
	if(isset($_GET['latest']))
	{
	$id=htmlspecialchars($_GET['latest']);
	$p_table='home_product';
	}
	if(isset($_GET['ads']))
	{
	$id=htmlspecialchars($_GET['ads']);
	$p_table='ads';
	}
	$product_select="select * from $p_table where id='".$id."'";
	$product_query=mysqli_query($db,$product_select);
	$product_row=mysqli_fetch_assoc($product_query);
	$title=$product_row['title'];
	$image=$product_row['image'];
	$description=$product_row['description'];
	$code=$product_row['code'];
	$price=$product_row['current_price'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../js/jquery.min.js"></script><!--Jquery-->
    <title>Link Computer || Home</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/all.min.css">
    <link rel="stylesheet" href="../font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.css">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap&family=Philosopher:ital,wght@1,700&display=swap&family=Trade+Winds&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/slider.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
  </head>
<body>
<!--===================================All Header Start ===========================================-->
								<?php include '../join/header_2.php';?>
	<!--===================================All Header End ===========================================-->
	
	<!--===================================Content Area Start ===========================================-->
	<div class="container">
		<ul class="category_header">
			<li><i class="fa fa-home"></i></li>
			<li><i class="fa fa-angle-double-right"></i></li>
			<li style="color:#22ace9;"><?php echo $title?></li>
		</ul>
		<div class="category_content">
			<div class="left_menu">
				<div class="title">CATEGORIES</div>
				<div class="category_list">
					<ul>
						<?php 
						$category_select="select * from category";
						$category_query=mysqli_query($db,$category_select);
						while($category_row=mysqli_fetch_assoc($category_query)){
						$category=$category_row['categoryname'];
						$category_count_select="select * from products where category='".$category."'";
						$category_count_query=mysqli_query($db,$category_count_select);
						$category_count=mysqli_num_rows($category_count_query);
						?>
						<li><i class="fa fa-caret-right"></i> <a href="../product/?c=<?php echo $category?>">&nbsp <?php echo $category.' ('.$category_count.')'?></a></li>
						<?php }?>
					</ul>
				</div>
			</div>
			<div class="main_content" style="padding-top:0;min-height:800px;">
				<div class="view_image">
					<img src="../img/product/<?php echo $image?>" alt="" />
				</div>
				<div class="view_content_main">
					<div class="heading"><?php echo $title?></div>
					<div class="review">
						<ul>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li><i class="fa fa-star"></i></li>
							<li>0 reviews</li>
							<li><i class="fa fa-pencil-square-o"></i> write review</li>
						</ul>
					</div>
					<div class="details">
						<ul>
							<li>Product Code: <span><?php echo $code?></span></li>
							<li>Reward Point: <span>Not-Active</span></li>
							<li>Availability: <span>Pre-Order</span></li>
							<li>$<?php echo $price?>.00</li>
							<li>Ex Tax:00.00</li>
						</ul>
					</div>
					<div class="view_page_cart_box">
						<button class="add_cart">
							<i class="fa fa-shopping-cart"></i>&nbsp; Add to Cart
						</button>
						<button class="like"><i class="fa fa-heart"></i></button>
					</div>
					<input id="latest_title" type="hidden" value="<?php echo $title?>"/>
					<input id="latest_code" type="hidden" value="<?php echo $code?>"/>
					<input id="latest_image" type="hidden" value="<?php echo $image?>"/>
					<input id="latest_price" type="hidden" value="<?php echo $price?>"/>
				</div>
				<div class="clear"></div>
				<div class="view_description_box">
					<div class="latest_caption">Description</div>
					<div class="latest_border"></div>
					<div class="des_box">
						<?php echo $description?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<script>
			$(".add_cart").click(function(){
				var title=$('#latest_title').val();
				var code=$('#latest_code').val();
				var image=$('#latest_image').val();
				var price=$('#latest_price').val();
				var id='<?php echo $session_id?>';
				var time='<?php echo $end_time?>';
				$.post("../join/cart_ajax.php",{title:title,code:code,image:image,price:price,id:id,time:time},function(data){$(".main_print").html(data)});
				setTimeout(function(){
					$("body,html").animate({scrollTop:0},500);
				},100);
				setTimeout(function(){
					$(".cart_success").fadeIn(500);
					setTimeout(function(){
						$(".cart_success").fadeOut(500);
					},3000);
					$.post("../join/cart_total_ajax_2.php",{quantity:0},function(data){$(".cart").html(data)});
				},1000);
			});
		</script>
	<!--===================================Content Area End ===========================================-->
	
	
	
	
	
	<!--===================================Footer Start ====================================-->
	<?php include('../join/footer.php')?>
	<!--===================================Footer End ====================================-->
	
	
	
	
	
	
	
	
	
    
    <!--==============================Javascript Link Start ========================================-->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/slider.js"></script>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
		$(".like").click(function(){
			$.post("../join/like_ajax.php",{like:0},function(data){$(".bbb").html(data)});
			window.location.href='';
		});
	</script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>