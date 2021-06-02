<?php include('../join/db.php');?>
<?php 
	$session_id=$_SESSION['bappy_id'];
	//initial variable start
	$main_display='display:block';
	$left_display='display:block';
	$alert_display='display:none';
	//initial variable end
	if(isset($_SESSION['user_id'])){
		header('location:../');
	}
	if(isset($_POST['sbt'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$rawselect="select * from user where email='%s'&&password='%s';";
		$select=sprintf($rawselect,mysqli_real_escape_string($db,$email),mysqli_real_escape_string($db,$password));
		$query=mysqli_query($db,$select);
		$count=mysqli_num_rows($query);
		if($count>0){
			$row=mysqli_fetch_assoc($query);
			$id=$row['id'];
			$_SESSION['user_id']=$id;
			header('location:../');
		}else{
			$main_display='display:none';
			$left_display='display:none';
			$alert_display='display:block';
		}
	}
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
			<li>Login</li>
		</ul>
		<div class="category_content login_content">
		<form method="post" autocomplete="off">
			<div class="main_content main_content_2" style="<?php echo $main_display?>">
				<div class="signup_main">
					<div class="login_heading">New Customer</div>
					<p style="margin-bottom:12px;"><b>Register</b></p>
					<p style="margin-bottom:15px;">If you new customer in this site please make an account Its making your shopping faster</p>
					<a href="../register/" >Continue</a>
				</div>
				<div class="login_main">
					<div class="login_heading">Returning Customer</div>
					<p style="margin-bottom:12px;"><b>I am a returning customer</b></p>
						<label>E-Mail Address</label><br>
						<input type="email" placeholder="E-Mail Address" name="email" required />
						<label>Password</label><br>
						<input type="password" placeholder="Password" name="password" required />
						<span>Frogotten Password</span>
						<button name="sbt">Login</button>
				</div>
				<div class="clear"></div>
			</div>
		</form>
		
		
		<div class="checkout_success_main" style="<?php echo $alert_display?>">
			<div class="checkout_success">
				<div class="latest_caption" style="font-family:calibri;font-weight:bold;">Wrong Emai Or Password</div>
				<div class="latest_border"></div>
				<p>Your email id or password invalid</p>
				<p>Please <span onclick="window.location.href=''" style="cursor:pointer;">Click</span> this button and try again</p>
				<p>Thanks for shopping with us online!</p>
			</div>
			<div class="checkout_border_2"></div>
			<button class="checkout_back" onclick="window.location.href=''">Go Back</button>
		</div>
		
			
			<div class="left_menu" style="<?php echo $left_display?>">
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
	<script >
	if(window.history.replaceState){
		window.history.replaceState(null,null,window.location.href);
	}
	if ($(window).width() <= 700) {
		$('.category_header').css("margin-bottom","20px");
	}
	</script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>