<?php include('../join/db.php');?>
<?php 
	$session_id=$_SESSION['bappy_id'];
	$end_time=time()+720*60;//12 Hours
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
		<div class="cart_main">
			<ul class="category_header">
				<li><i class="fa fa-home"></i></li>
				<li><i class="fa fa-angle-double-right"></i></li>
				<li style="color:#22ace9;font-size:13px;">Shopping Cart</li>
			</ul>
			<div class="cart_box">
				<div class="latest_caption">Please Watch and checkout</div>	
				<div class="latest_border"></div>
				
				
				<div class="table_main">
					<table border="1">
					<tr>
						<th>Image</th>
						<th>Product Name</th>
						<th>Code</th>
						<th>Quantity</th>
						<th>Unit Price</th>
						<th>Total</th>
					</tr>
					<?php 
						$i=1;
						$product_select="select * from cart where session_id='".$session_id."'";
						$product_query=mysqli_query($db,$product_select);
						$product_count=mysqli_num_rows($product_query);
						while($product_row=mysqli_fetch_assoc($product_query)){
						$id=$product_row['id'];
						$title=$product_row['title'];
						$image=$product_row['image'];
						$code=$product_row['code'];
						$quantity=$product_row['quantity'];
						$price=$product_row['price'];
						if($quantity>1){
							$price=$price/$quantity;
						}
						$total_price=$price*$quantity;
					?>
					<tr>
						<td class="td_img"><img src="../img/product/<?php echo $image?>" alt="" /></td>
						<td class="td_description"><?php echo $title?> ***</td>
						<td class="td_code"><?php echo $code?></td>
						<td class="td_quantity">
							<div style="width:100%;">
								<div class="q_count"><?php echo $quantity?></div>
								<div class="q_update" onclick="window.location.href=''"><i class="fa fa-refresh"></i></div>
								<button class="q_remove" onclick="window.location.href='../join/delete_cart.php?id=<?php echo $id?>'"><i class="fa fa-times-circle"></i></button>
								<div class="clear"></div>
							</div>
						</td>
						<td class="td_price">$<?php echo $price?></td>
						<td class="td_total">$<?php echo $total_price?></td>
					</tr>
					<?php $i++;}?>
				</table>
				</div>
			</div>
			<?php 
				$total_select="select sum(price) from cart where session_id='".$session_id."'";
				$total__query=mysqli_query($db,$total_select);
				$total__row=mysqli_fetch_assoc($total__query);
				$cart_total_price=$total__row['sum(price)'];
				if(empty($cart_total_price)){
					$cart_total_price='00.00';
				}
			?>
			<div class="last_total_main">
				<?php 
					if($product_count==0){
						echo '<div class="cart_empty">Your Shopping Cart Is Empty</div>';
					}
				?>
				<table border="1" align="right">
					<tr>
						<td><b>Sub-Total:</b></td>
						<td>$<?php echo $cart_total_price?></td>
					</tr>
					<tr>
						<td><b>Shipping-Tax(0%):</b></td>
						<td>$00.00</td>
					</tr>
					<tr>
						<td><b>Vat(0%):</b></td>
						<td>$00.00</td>
					</tr>
					<tr>
						<td><b>Total:</b></td>
						<td>$<?php echo $cart_total_price?></td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
			<div class="last_button">
				<a href="../">Continue Shopping</a>
				<a href="../checkout/">Checkout</a>
				<div class="clear"></div>
			</div>
		</div>
	</div>
	<!--===================================Content Area End ===========================================-->
	
	
	
	
	
	<!--===================================Footer Start ====================================-->
							<?php include('../join/footer.php');?>
	<!--===================================Footer End ====================================-->
	
	
	
	
	
	
	
	
	
    
    <!--==============================Javascript Link Start ========================================-->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/slider.js"></script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>