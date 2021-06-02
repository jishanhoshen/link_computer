<?php include('header.php')?>
					  
					  
					  
<!--=====================================Bappy Content Start================================================-->	
	<?php 
		if(isset($_POST['sbt'])){
			$title=$_POST['title'];
			$keyword=$_POST['keyword'];
			$description=$_POST['description'];
			$imagename = $_FILES['image']['name'];
			$r_price=$_POST['regular_price'];
			$c_price=$_POST['current_price'];
			$category=$_POST['category'];
			$company=$_POST['company'];
			//Code set start
			$all_select="select * from products";
			$all_query=mysqli_query($db,$all_select);
			$all_count=mysqli_num_rows($all_query);
			$rand=rand(0000,9999);
			$code=$all_count.$rand;
			//Code set end
			$code_check="select * from products where code='".$code."'";
			$code_query=mysqli_query($db,$code_check);
			$code_check_count=mysqli_num_rows($code_query);
			if($code_check_count==0){
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
				else{
					echo 'Image Not Supported';
				}
				imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
	
				imagejpeg($tn, $save, 100) ;
				$insert="insert into products(title,keyword,description,regular_price,current_price,category,code,image,company)values('".$title."','".$keyword."','".$description."','".$r_price."','".$c_price."','".$category."','".$code."','".$imagename."','".$company."')";
				$insert_query=mysqli_query($db,$insert);
				if($insert_query){
					$alert_display='display:block';
					$alert_content='Product Add Success ';
				}
				else{
				    $alert_display='display:block';
				    $alert_content='Something Is Wrong ';
			        }
			}
		}
		else{
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
				else{
					echo 'Image Not Supported';
				}
				imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;
	
				imagejpeg($tn, $save, 100) ;
				$code=rand(0000,9999);
				$insert="insert into products(title,keyword,description,regular_price,current_price,category,code,image,company)values('".$title."','".$keyword."','".$description."','".$r_price."','".$c_price."','".$category."','".$code."','".$imagename."','".$company."')";
				$insert_query=mysqli_query($db,$insert);
				if($insert_query){
					$alert_display='display:block';
					$alert_content='Product Add Success ';
				}
				else{
				    $alert_display='display:block';
				    $alert_content='Something Is Wrong ';
			        }
			}
		}
	}
	?>
	<div class="add_product_main">
		<form method="post" enctype="multipart/form-data">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Title</label>
				<div class="col-sm-10">
					<input type="text" class="form-control form-control-round" name="title" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keyword</label>
				<div class="col-sm-10">
					<input type="text" class="form-control form-control-round" name="keyword" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Description</label>
				<div class="col-sm-10">
					<textarea class="form-control" name="description" required ></textarea>
				</div>
		    </div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Regular Price</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="regular_price" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Current Price</label>
				<div class="col-sm-10">
					<input type="number" class="form-control" name="current_price" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Cetagory</label>
				<div class="col-sm-10">
					<select name="category" id="" class="form-control" required />
						<option value="">Select Category</option>
						<?php 
							$category_select="select * from category";
							$category_query=mysqli_query($db,$category_select);
							while($category_row=mysqli_fetch_assoc($category_query)){
							$category_name=$category_row['categoryname'];
						?>
						<option value="<?php echo $category_name?>"><?php echo $category_name?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Company</label>
				<div class="col-sm-10">
					<select name="company" id="" class="form-control" required />
						<option value="">Select Company</option>
						<?php 
							$company_select="select * from company";
							$company_query=mysqli_query($db,$company_select);
							while($company_row=mysqli_fetch_assoc($company_query)){
							$company_name=$company_row['companyname'];
						?>
						<option value="<?php echo $company_name?>"><?php echo $company_name?></option>
						<?php }?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Image</label>
				<div class="col-sm-10">
					<input type="file" class="form-control" name="image" required />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">All Complete</label>
				<div class="col-sm-10">
					<button class="btn waves-effect waves-light btn-success btn-skew" name="sbt">Add</button>
				</div>
			</div>
	</form>
	</div>
<!--=====================================Bappy Content End================================================-->			
<div class="alert" style="<?php echo $alert_display?>">
<?php echo $alert_content?>
<button onclick="window.location.href=''">Go Back</button>
</div>		  
					  
					  
					  
					  
					  
	
    
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
