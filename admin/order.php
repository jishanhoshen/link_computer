<?php include('header.php')?>
					  
					  
					  
<!--=====================================Bappy Content Start================================================-->	
	<div class="order_main">
		<div class="all_heading" style="padding-left:515px;">All Order</div>
		<?php 
			$i=1;
			$session_select="select * from session";
			$session_query=mysqli_query($db,$session_select);
			while($session_row=mysqli_fetch_assoc($session_query)){
			$session_name=$session_row['session_id'];
			$customer_name=$session_row['name'];
			$customer_mobile=$session_row['mobile'];
			$customer_email=$session_row['email'];
			if(empty($customer_email)){
			$customer_email='Empty';
			}
			$customer_address=$session_row['address'];
		?>
		<div class="order_box">
			<div class="number"><?php echo $i?></div>
			<table border="1">
				<tr>
					<th>Image</th>
					<th>Product Name</th>
					<th>Code</th>
					<th>Unit Price</th>
					<th>Quantity</th>
					<th>Total Price</th>
				</tr>
				<?php 
					$product_select="select * from admin_product where session_id='".$session_name."'";
					$product_query=mysqli_query($db,$product_select);
					$product_count=mysqli_num_rows($product_query);
					while($product_row=mysqli_fetch_assoc($product_query)){
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
					<td style="padding-left:2px;"><img src="../img/product/<?php echo $image?>" alt="" height="60" width="60"/></td>
					<td><?php echo $title?></td>
					<td><?php echo $code?></td>
					<td><?php echo $price?></td>
					<td><?php echo $quantity?></td>
					<td><?php echo $total_price?></td>
				</tr>
				<?php }?>
			</table>
			<div class="address_main">
				<label style="margin:0;">Name:</label><div class="name"><?php echo $customer_name?></div>
				<label>Mobile:</label><div class="mobile"><?php echo $customer_mobile?></div>
				<label>Email:</label><div class="email"><?php echo $customer_email?></div>
				<label>Address:</label><div class="address"><?php echo $customer_address?></div>
			</div>
			<div class="clear"></div>
			<?php 
				$total_select="select sum(price) from admin_product where session_id='".$session_name."'";
				$total__query=mysqli_query($db,$total_select);
				$total__row=mysqli_fetch_assoc($total__query);
				$cart_total_price=$total__row['sum(price)'];
			?>
			<div class="total_main"><div><b> &nbsp All Total</b></div><div class="total"><?php echo $cart_total_price?></div></div>
			<a href="delete_admin_product.php?session_id=<?php echo $session_name?>"><button style="margin-top:24px;" class="btn waves-effect waves-light btn-success btn-skew" name="sbt">Place Order</button></a>
			<div class="clear"></div>
		</div>
		<?php $i++;}?>
	</div>
<!--=====================================Bappy Content End================================================-->					  
					  
					  
					  
					  
					  
	
    
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <script type="text/javascript" src="assets/pages/widget/excanvas.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js "></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js "></script>
    <!-- slimscroll js -->
    <script type="text/javascript" src="assets/js/SmoothScroll.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>
    <!-- Chart js -->
    <script type="text/javascript" src="assets/js/chart.js/Chart.js"></script>
    <!-- amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="assets/pages/widget/amchart/gauge.js"></script>
    <script src="assets/pages/widget/amchart/serial.js"></script>
    <script src="assets/pages/widget/amchart/light.js"></script>
    <script src="assets/pages/widget/amchart/pie.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical-layout.min.js "></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/pages/dashboard/custom-dashboard.js"></script>
    <script type="text/javascript" src="assets/js/script.js "></script>
	<script>
		if(window.history.replaceState){
		window.history.replaceState(null,null,window.location.href);
		}
	</script>
</body>

</html>
