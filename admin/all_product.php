<?php include('header.php')?>
					  
					  
					  
<!--=====================================Bappy Content Start================================================-->	
	<form method="post" enctype="multipart/form-data">
		
		
		
		
		
		
		
		
		
		
		<!--==================All Product Start======================-->
		<div class="all_heading">All Product</div>
		<div class="all_product_main">
			<table border="1">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				<?php 
					$product_select="select * from products order by id DESC";
					$product_query=mysqli_query($db,$product_select);
					while($product_row=mysqli_fetch_assoc($product_query)){
					$product_id=$product_row['id'];
					$product_title=$product_row['title'];
					$product_price=$product_row['current_price'];
					$product_image=$product_row['image'];
				?>
				<tr>
					<td align="center" style="padding-left:2px;width:10%;"><img src="../img/product/<?php echo $product_image?>" alt="" height="60" width="60"/></td>
					<td><?php echo $product_title?></td>
					<td><?php echo $product_price?></td>
					<td><a href="edit_product.php?id=<?php echo $product_id?>">Edit</a> &nbsp &nbsp <a href="delete_product.php?id=<?php echo $product_id?>">Delete</a></td>
				</tr>
				<?php }?>
			</table>
		</div>
		<!--==================All Product End======================-->
	</form>
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
</body>

</html>
