<?php include('header.php')?>
					  
					  
					  
<!--=====================================Bappy Content Start================================================-->	
		<!--==================Slider Start======================-->
		<div class="all_heading">Slider Update</div>
		<div class="slider_main">
		<form method="post" enctype="multipart/form-data">
			<?php 
				if(isset($_POST['slider_1_sbt'])){
					$imagename = $_FILES['slider_1']['name'];
					$tmp = $_FILES['slider_1']['tmp_name'];
					move_uploaded_file($tmp, '../img/slider/'.$imagename);
					$img_select="select * from slider where id=1";
					$img_query=mysqli_query($db,$img_select);
					$img_row=mysqli_fetch_assoc($img_query);
					$old_img_name=$img_row['image'];
					$img_update="update slider set image='".$imagename."' where id=1";
					$img_update_query=mysqli_query($db,$img_update);
					unlink('../img/slider/'.$old_img_name);
				}
			?>
			<div class="slider_box_1">
				<div class="number">1</div>
				<div class="slider_1">
					<?php 
						$slider_1_select="select * from slider where id=1";
						$slider_1_query=mysqli_query($db,$slider_1_select);
						$slider_1_row=mysqli_fetch_assoc($slider_1_query);
						$slider_1=$slider_1_row['image'];
					?>
					<div class="image"><img src="../img/slider/<?php echo $slider_1?>" alt="" /></div>
					<div class="file"><input type="file" name="slider_1" required /></div>
					<div class="button" align="center"><button name="slider_1_sbt">Update</button></div>
				</div>
			</div>
		</form>
		
		
		
		<form method="post" enctype="multipart/form-data">
			<?php 
				if(isset($_POST['slider_2_sbt'])){
					$imagename = $_FILES['slider_2']['name'];
					$tmp = $_FILES['slider_2']['tmp_name'];
					move_uploaded_file($tmp, '../img/slider/'.$imagename);
					$img_select="select * from slider where id=2";
					$img_query=mysqli_query($db,$img_select);
					$img_row=mysqli_fetch_assoc($img_query);
					$old_img_name=$img_row['image'];
					$img_update="update slider set image='".$imagename."' where id=2";
					$img_update_query=mysqli_query($db,$img_update);
					unlink('../img/slider/'.$old_img_name);
				}
			?>
			<div class="slider_box_2">
				<div class="number">2</div>
				<div class="slider_2">
					<?php 
						$slider_2_select="select * from slider where id=2";
						$slider_2_query=mysqli_query($db,$slider_2_select);
						$slider_2_row=mysqli_fetch_assoc($slider_2_query);
						$slider_2=$slider_2_row['image'];
					?>
					<div class="image"><img src="../img/slider/<?php echo $slider_2?>" alt="" /></div>
					<div class="file"><input type="file" name="slider_2" required /></div>
					<div class="button" align="center"><button name="slider_2_sbt">Update</button></div>
				</div>
			</div>
		</form>
		
		
		<form method="post" enctype="multipart/form-data">	
			<?php 
				if(isset($_POST['slider_3_sbt'])){
					$imagename = $_FILES['slider_3']['name'];
					$tmp = $_FILES['slider_3']['tmp_name'];
					move_uploaded_file($tmp, '../img/slider/'.$imagename);
					$img_select="select * from slider where id=3";
					$img_query=mysqli_query($db,$img_select);
					$img_row=mysqli_fetch_assoc($img_query);
					$old_img_name=$img_row['image'];
					$img_update="update slider set image='".$imagename."' where id=3";
					$img_update_query=mysqli_query($db,$img_update);
					unlink('../img/slider/'.$old_img_name);
				}
			?>
			<div class="slider_box_3">
				<div class="number">3</div>
				<div class="slider_3">
					<?php 
						$slider_3_select="select * from slider where id=3";
						$slider_3_query=mysqli_query($db,$slider_3_select);
						$slider_3_row=mysqli_fetch_assoc($slider_3_query);
						$slider_3=$slider_3_row['image'];
					?>
					<div class="image"><img src="../img/slider/<?php echo $slider_3?>" alt="" /></div>
					<div class="file"><input type="file" name="slider_3" required /></div>
					<div class="button" align="center"><button name="slider_3_sbt">Update</button></div>
				</div>
			</div>
		</form>
			<div class="clear"></div>
		</div>
		<!--==================Slider End======================-->
		
		
		
		
		
		
		
		<!--==================Ads Start======================-->
		<div class="all_heading">Ads Update</div>
		<div class="latest_main">
			<table border="1">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				<?php 
					$ads_select="select * from ads where id!=4";
					$ads_query=mysqli_query($db,$ads_select);
					while($ads_row=mysqli_fetch_assoc($ads_query)){
					$ads_id=$ads_row['id'];
					$ads_title=$ads_row['title'];
					$ads_price=$ads_row['current_price'];
					$ads_image=$ads_row['image'];
				?>
				<tr>
					<td style="padding-left:2px;"><img src="../img/product/<?php echo $ads_image?>" alt="" height="60" width="60"/></td>
					<td><?php echo $ads_title?></td>
					<td><?php echo $ads_price?></td>
					<td><a href="edit_ads.php?id=<?php echo $ads_id?>">Edit</a></td>
				</tr>
				<?php }?>
			</table>
		</div>
		<!--==================Ads End======================-->
		
		
		
		
		<!--==================Latest Product Start======================-->
		<div class="all_heading">Latest Product Update</div>
		<div class="latest_main">
			<table border="1">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				<?php 
					$latest_select="select * from home_product where rule='latest'";
					$latest_query=mysqli_query($db,$latest_select);
					while($latest_row=mysqli_fetch_assoc($latest_query)){
					$latest_id=$latest_row['id'];
					$latest_title=$latest_row['title'];
					$latest_price=$latest_row['current_price'];
					$latest_image=$latest_row['image'];
				?>
				<tr>
					<td><img src="../img/product/<?php echo $latest_image?>" alt="" height="60" width="60"/></td>
					<td><?php echo $latest_title?></td>
					<td><?php echo $latest_price?></td>
					<td><a href="edit_home_page.php?id=<?php echo $latest_id?>">Edit</a></td>
				</tr>
				<?php }?>
			</table>
		</div>
		<!--==================Latest Product End======================-->
		
		
		
		
		<!--==================Single Ads Start======================-->
		<?php 
			if(isset($_POST['single_sbt'])){
			if (isset ($_FILES['single'])){
              $imagename = $_FILES['single']['name'];
              $imagetype = $_FILES['single']['type'];
              $source = $_FILES['single']['tmp_name'];
              $target = "../img/".$imagename;
              move_uploaded_file($source, $target);

              $imagepath = $imagename;
              $save = "../img/" . $imagepath; //This is the new file you saving
              $file = "../img/" . $imagepath; //This is the original file

              list($width, $height) = getimagesize($file) ;

              $modwidth = 1170;

              $modheight = 180;
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
			  else{
				  echo 'Image Not Supported';
			  }
              imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

              imagejpeg($tn, $save, 100) ;

          }
		  $img_update="update ads set image='".$imagename."' where id=4";
		  $img_update_query=mysqli_query($db,$img_update);
		}
		?>
	<form method="post" enctype="multipart/form-data">	
		<div class="all_heading" style="padding-left:468px;">Single Ads</div>
		<?php 
			$single_select="select * from ads where id=4";
			$single_query=mysqli_query($db,$single_select);
			$single_row=mysqli_fetch_assoc($single_query);
			$single_image=$single_row['image'];
		?>
		<div class="single_ads">
			<img src="../img/<?php echo $single_image?>" alt="" />
			<input type="file" name="single" required />
			<button name="single_sbt">Update</button>
		</div>
	</form>
		<!--==================Single Ads End======================-->
		
		
		
		
		
		
		<!--==================Lowest Product Start======================-->
		<div class="all_heading">Lowest Product Update</div>
		<div class="latest_main">
			<table border="1">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				<?php 
					$lowest_select="select * from home_product where rule='lowest'";
					$lowest_query=mysqli_query($db,$lowest_select);
					while($lowest_row=mysqli_fetch_assoc($lowest_query)){
					$lowest_id=$lowest_row['id'];
					$lowest_title=$lowest_row['title'];
					$lowest_price=$lowest_row['current_price'];
					$lowest_image=$lowest_row['image'];
				?>
				<tr>
					<td><img src="../img/product/<?php echo $lowest_image?>" alt="" height="60" width="60"/></td>
					<td><?php echo $lowest_title?></td>
					<td><?php echo $lowest_price?></td>
					<td><a href="edit_home_page.php?id=<?php echo $lowest_id?>">Edit</a></td>
				</tr>
				<?php }?>
			</table>
		</div>
		<!--==================Lowest Product End======================-->
		
		
		
		
		
		
		
		
		
		<!--==================Regular Product Start======================-->
		<div class="all_heading">Regular Product Update</div>
		<div class="latest_main">
			<table border="1">
				<tr>
					<th>Image</th>
					<th>Title</th>
					<th>Price</th>
					<th>Action</th>
				</tr>
				<?php 
					$regular_select="select * from home_product where rule='regular'";
					$regular_query=mysqli_query($db,$regular_select);
					while($regular_row=mysqli_fetch_assoc($regular_query)){
					$regular_id=$regular_row['id'];
					$regular_title=$regular_row['title'];
					$regular_price=$regular_row['current_price'];
					$regular_image=$regular_row['image'];
				?>
				<tr>
					<td><img src="../img/product/<?php echo $regular_image?>" alt="" height="60" width="60"/></td>
					<td><?php echo $regular_title?></td>
					<td><?php echo $regular_price?></td>
					<td><a href="edit_home_page.php?id=<?php echo $regular_id?>">Edit</a></td>
				</tr>
				<?php }?>
			</table>
		</div>
		<!--==================Regular Product End======================-->
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
