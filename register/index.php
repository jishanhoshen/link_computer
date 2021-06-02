<?php include('../join/db.php');?>
<?php 
	$session_id=$_SESSION['bappy_id'];
	//initial variable start
	$alert_display='display:none';
	$main_display='display:block';
	$left_menu_display='display:block';
	$alert_content='';
	//initial variable end
	if(isset($_POST['sbt'])){
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$telephone=$_POST['telephone'];
		$address=$_POST['address'];
		$password=$_POST['password'];
		$confirm_password=$_POST['confirm_password'];
		if($password===$confirm_password){
			$insert="insert into user(name,mobile,email,telephone,address,password)values('".$name."','".$mobile."','".$email."','".$telephone."','".$address."','".$password."')";
			$query=mysqli_query($db,$insert);
			if($query){
				$alert_display='display:block';
				$main_display='display:none';
				$left_menu_display='display:none';
				$alert_content='<div class="checkout_success">
					<div class="latest_caption" style="font-family:calibri;font-weight:bold;">Register Successfully </div>
					<div class="latest_border"></div>
					<p>Please go to <a href="../login"><span>login page.</span></a> </p>
				</div>
				<div class="checkout_border_2"></div>
				<a href=""><button class="checkout_back">Go Back</button></a>';
			}
		}else{
			$alert_display='display:block';
			$main_display='display:none';
			$left_menu_display='display:none';
			$alert_content='<div class="checkout_success">
				<div class="latest_caption" style="font-family:calibri;font-weight:bold;">Your Password not match </div>
				<div class="latest_border"></div>
				<p>Please press this button <a href=""><span>Click</span></a> and try again  </p>
			</div>
			<div class="checkout_border_2"></div>
			<a href=""><button class="checkout_back">Go Back</button></a>';
		}
	}
	//alert div start
	
	//alert div end
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
			<li>Account</li>
			<li><i class="fa fa-angle-double-right"></i></li>
			<li>Register</li>
		</ul>
		<div class="category_content">
			<div class="main_content main_content_2" style="<?php echo $main_display?>">
				<div class="main_title main_title_2">Account</div>
				<div class="latest_border" style="height:4px;width:70px;"></div>
				<p>if you alredy have a account? please go to <a href="../login">login page.</a></p>
				<div class="product_header product_header_2">
					<h4>Your Personal Details</h4>
				</div><!--Product Header End-->
				<form method="post" autocomplete="off">
				<div class="info_main">
					<div class="info_child">
						<div class="info_child_box">
							<div class="col-md-2 col-sm-12">
								<div class="letter"><span><i class="fa fa-star"></i></span> Full Name</div>
							</div>
							<div class="col-md-10 col-sm-12" style="padding-right:0;">
								<div class="info_box"><input type="text" placeholder="Write Your Full Name" name="name" required /></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="info_child_box">
							<div class="col-md-2 col-sm-12">
								<div class="letter"><span><i class="fa fa-star"></i></span> Mobile </div>
							</div>
							<div class="col-md-10 col-sm-12" style="padding-right:0;">
								<div class="info_box"><input type="number" placeholder="01XXXXXXXXX" name="mobile" required /></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="info_child_box">
							<div class="col-md-2 col-sm-12">
								<div class="letter"><span><i class="fa fa-star"></i></span></span> Email </div>
							</div>
							<div class="col-md-10 col-sm-12" style="padding-right:0;">
								<div class="info_box"><input type="email" placeholder="E-Mail Address"  name="email" required /></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="info_child_box">
							<div class="col-md-2 col-sm-12">
								<div class="letter"> Telephone </div>
							</div>
							<div class="col-md-10 col-sm-12" style="padding-right:0;">
								<div class="info_box"><input type="number" placeholder="Telephone Number (Optional)" name="telephone" /></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="info_child_box">
							<div class="col-md-2 col-sm-12">
								<div class="letter"><span><i class="fa fa-star"></i></span> Address </div>
							</div>
							<div class="col-md-10 col-sm-12" style="padding-right:0;">
								<div class="info_box"><input type="text" placeholder="Your Current Address" name="address" required /></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<div class="clear"></div>
					<h4 class="h4_second">Your Password</h4>
				</div>
				<div class="clear"></div>
				<div class="info_child_2">
					<div class="info_child_box">
						<div class="col-md-3 col-sm-12">
							<div class="letter"><span><i class="fa fa-star"></i></span> Password </div>
						</div>
						<div class="col-md-9 col-sm-12" style="padding-right:0;">
							<div class="info_box"><input type="password" placeholder="Password" name="password" required /></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="info_child_box">
						<div class="col-md-3 col-sm-12">
							<div class="letter"><span><i class="fa fa-star"></i></span> Password Confirm </div>
						</div>
						<div class="col-md-9 col-sm-12" style="padding-right:0;">
							<div class="info_box"><input type="password" placeholder="Password Confirm" name="confirm_password" required /></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="policy_main">
					<div class="policy_content">I have read and agree to the <b>Privacy Policy</b> <input type="checkbox" required /></div>
					<button class="register_ok" name="sbt">Continue</button>
					<div class="clear"></div>
				</div>
				</form>
			</div>
			
			
			<div class="checkout_success_main" style="<?php echo $alert_display?>">
				<?php echo $alert_content?>
			</div>
			
			
			
			<div class="left_menu" style="<?php echo $left_menu_display?>">
				<div class="title">ACCOUNT</div>
				<div class="category_list">
					<ul>
						<li><i class="fa fa-caret-right"></i> <a href="../login/">&nbsp Login</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="../register/">&nbsp Registar</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Frogotten Password</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp My Account</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Address Book</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Wish List</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Order History</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp Return</a></li>
						<li><i class="fa fa-caret-right"></i> <a href="">&nbsp News Letter</a></li>
						
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!--===================================Content Area End ===========================================-->
	
	
	
	
	
	<!--===================================Footer Start ====================================-->
							<?php include('../join/footer.php');?>
	<!--===================================Footer End ====================================-->
	
	
	
	
	
	
	
	
	
    
    <!--==============================Javascript Link Start ========================================-->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/slider.js"></script>
	<script>
		if(window.history.replaceState){
			window.history.replaceState(null,null,window.location.href);
		}
	</script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>