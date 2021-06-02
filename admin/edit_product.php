<?php include('header.php')?>
					  
					  
					  
<!--=====================================Bappy Content Start================================================-->	
	<?php 
		$id=htmlspecialchars($_GET['id']);
		if(isset($_POST['sbt'])){
			$title=$_POST['title'];
			$description=$_POST['description'];
			$imagename = $_FILES['image']['name'];
			$r_price=$_POST['regular_price'];
			$c_price=$_POST['current_price'];
			if (isset ($_FILES['image'])){
              $imagename = $_FILES['image']['name'];
              $imagetype = $_FILES['image']['type'];
              $source = $_FILES['image']['tmp_name'];
              $target = "../img/product/".$imagename;
              move_uploaded_file($source, $target);

              $imagepath = $imagename;
              $save = "../img/product/" . $imagepath; //This is the new file you saving
              $file = "../img/product/" . $imagepath; //This is the original file

              list($width, $height) = getimagesize($file) ;

              $modwidth = 240;

              $modheight = 225;
              $tn = imagecreatetruecolor($modwidth, $modheight) ;
			  if($imagetype=='image/jpg'){
				$image = imagecreatefromjpeg($file) ;
			  }
			  else if($imagetype=='image/jpeg'){
				 $image = imagecreatefromjpeg($file) ;
			  }
			  else if($imagetype=='image/png'){
				 $image = imagecreatefrompng($file) ;
			  }
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

              imagejpeg($tn, $save, 100) ;
          }
          if(empty($_FILES['image']['name'])){
            $product_select="select * from products where id='".$id."'";
	    	$product_query=mysqli_query($db,$product_select);
		    $product_row=mysqli_fetch_assoc($product_query);
		    $imagename=$product_row['image'];
          }
		  $img_update="update products set title='".$title."',description='".$description."',regular_price='".$r_price."',current_price='".$c_price."',image='".$imagename."' where id='".$id."'";
		  $img_update_query=mysqli_query($db,$img_update);
		}
		$product_select="select * from products where id='".$id."'";
		$product_query=mysqli_query($db,$product_select);
		$product_row=mysqli_fetch_assoc($product_query);
		$product_title=$product_row['title'];
		$product_description=$product_row['description'];
		$product_current_price=$product_row['current_price'];
		$product_regular_price=$product_row['regular_price'];
		$product_image=$product_row['image'];
	?>
	<div class="add_product_main">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control form-control-round" value="<?php echo $product_title?>" name="title" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="description"><?php echo $product_description?></textarea>
				</div>
		    </div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Regular Price</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" value="<?php echo $product_regular_price?>" name="regular_price" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Current Price</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" value="<?php echo $product_current_price?>" name="current_price" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Image</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" name="image" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">All Complete</label>
				<div class="col-sm-10">
					<button class="btn waves-effect waves-light btn-success btn-skew" name="sbt" >Update</button>
				</div>
			</div>
	</form>
	</div>
	<div class="view_image">
		<h4>Running Image</h4>
		<img src="../img/product/<?php echo $product_image?>" alt="" height="170" width="200"/>
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
