<?php include('header.php')?>
<?php 
    if(!isset($_SESSION['main'])){
        echo '<script>window.location.href="login_2.php"</script>';
    }
    if(isset($_POST['admin_sbt'])){
        $name=$_POST['user_name'];
        $user_name=$_POST['name'];
        $password=$_POST['password'];
        $insert="insert into admin(name,user_name,password,image)values('".$name."','".$user_name."','".$password."','')";
        $query=mysqli_query($db,$insert);
    }
?>
<!--=====================================Bappy Content Start================================================-->	
	<form method="post" enctype="multipart/form-data">
		
		
		
		
		
		
		
		
		
		
		<!--==================All Product Start======================-->
		<div class="all_heading" style="padding-left:427px;">All Company</div>
		<form class="form-inline" action="" method="post">
			<div class="cetagory_main" style="padding-left:155px;">
				<span>Insert Admin</span>
				<span><input type="text" placeholder="Name" name="name" required /></span>
				<span><input type="text" placeholder="User Name" name="user_name" required /></span>
				<span><input type="text" placeholder="Password" name="password" required /></span>
				<button class="btn waves-effect waves-light btn-success btn-skew" name="admin_sbt">Add</button>
			</div>
		</form>
		<div class="cetagory_table">
			<table border="1" style="margin-left:135px;">
				<tr>
					<th style="width:12%;">No</th>
					<th style="width:35%;">Name</th>
					<th style="width:30%;">User Name</th>
					<th style="width:12%;">Password</th>
					<th style="width:">Action</th>
				</tr>
				<?php 
				    $i=1;
					$select="select * from admin where id!=1";
					$query=mysqli_query($db,$select);
					while($row=mysqli_fetch_assoc($query)){
					$id=$row['id'];
					$name=$row['name'];
					$user_name=$row['user_name'];
					$password=$row['password'];
				?>
				<tr>
					<td style="width:12%;"><?php echo $i?></td>
					<td style="width:35%;"><?php echo $name?></td>
					<td style="width:30%;"><?php echo $user_name?></td>
					<td style="width:12%;"><?php echo $password?></td>
					<td style="width:"><a href="delete_admin.php?id=<?php echo $id?>">Delete</a></td>
				</tr>
				<?php $i++;}?>
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
	<script>
		if(window.history.replaceState){
		window.history.replaceState(null,null,window.location.href);
		}
	</script>
</body>

</html>

