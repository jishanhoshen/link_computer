<?php include('header.php')?>
					  
					  
					  
<!--=====================================Bappy Content Start================================================-->	
	<form method="post" enctype="multipart/form-data">
		
		
		
		
		<?php 
			$id=htmlspecialchars($_GET['id']);
			$name=htmlspecialchars($_GET['name']);
			if(isset($_POST['sbt'])){
				$category=$_POST['category'];
				$update="update company set companyname='".$category."' where company_id='".$id."'";
				$query=mysqli_query($db,$update);
				echo '
					<script>window.location.href="all_company.php"</script>
				';
			}
		?>
		
		
		
		
		
		<!--==================All Product Start======================-->
		<div class="all_heading">Edit Company</div>
		<form class="form-inline" action="" method="post">
			<div class="cetagory_main">
				<span>Company Name</span>
				<span><input type="text" value="<?php echo $name?>" name="category"/></span>
				<button class="btn waves-effect waves-light btn-success btn-skew" name="sbt">Add</button>
			</div>
		</form>
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
	<script>
		if(window.history.replaceState){
		window.history.replaceState(null,null,window.location.href);
		}
	</script>
</body>

</html>
