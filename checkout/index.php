<?php include('../join/db.php');?>
<?php 
	$session_id=$_SESSION['bappy_id'];
	$end_time=time()+720*60;//12 Hours
	$check_select="select * from cart where session_id='".$session_id."'";
	$check_query=mysqli_query($db,$check_select);
	$check_count=mysqli_num_rows($check_query);
	//initial variable start
	$left_menu_display='display:block';
	$main_content_display='display:block';
	$checkout_success_display='display:none';
	$login_alert_display='display:none';
	//login develop start
	if(isset($_POST['login_sbt'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$rawselect="select * from user where email='%s'&&password='%s';";
		$select=sprintf($rawselect,mysqli_real_escape_string($db,$email),mysqli_real_escape_string($db,$password));
		$query=mysqli_query($db,$select);
		$count=mysqli_num_rows($query);
		if($count>0){
			$row=mysqli_fetch_assoc($query);
			$id=$row['id'];
			echo $_SESSION['user_id']=$id;
			header('location:../checkout/');
		}else{
			$left_menu_display='display:none';
			$main_content_display='display:none';
			$checkout_success_display='display:none';
			$login_alert_display='display:block';
		}
	}
	//login develop end
	//initial variable end
	if($check_count==0){
		header('location:../cart/');
	}
	/*all display on off start*/ 
		if(isset($_SESSION['user_id'])){
		    $user_select="select * from user where id='".$_SESSION['user_id']."'";
		    $user_query=mysqli_query($db,$user_select);
		    $user_row=mysqli_fetch_assoc($user_query);
			$name_value=$user_row['name'];
			$mobile_value=$user_row['mobile'];
			$email_value=$user_row['email'];
			$tel_value=$user_row['telephone'];
			$address_value=$user_row['address'];
			$display_1='display:none';
			$display_2='display:block';
		}
		else{
			$name_value="";
			$mobile_value="";
			$email_value="";
			$tel_value="";
			$address_value="";
			$display_1='display:block';
			$display_2='display:none';
		}
	/*all display on off start*/
	if(isset($_POST['sbt'])){
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$telephone=$_POST['telephone'];
		$address=$_POST['address'];
		$rand=rand(00000000,99999999);
		$new_session=$mobile.$rand;
		//add session table data start
			$session_table_insert="insert into session(session_id,name,mobile,email,telephone,address,date,time)values('".$session_id."','".$name."','".$mobile."','".$email."','".$telephone."','".$address."','".$date."','".$time."')";
			$session_table_query=mysqli_query($db,$session_table_insert);
		//add session table data end
		//clean cart table data start
			$cart_select="select * from cart where session_id='".$session_id."'";
			$cart_query=mysqli_query($db,$cart_select);
			while($cart_row=mysqli_fetch_assoc($cart_query)){
				$cart_title=$cart_row['title'];
				$cart_code=$cart_row['code'];
				$cart_image=$cart_row['image'];
				$cart_quantity=$cart_row['quantity'];
				$cart_price=$cart_row['price'];
				$admin_insert="insert into admin_product(session_id,title,code,image,price,quantity)values('".$session_id."','".$cart_title."','".$cart_code."','".$cart_image."','".$cart_price."','".$cart_quantity."')";
				$admin_insert_query=mysqli_query($db,$admin_insert);
			}
			$delete_cart="delete from cart where session_id='".$session_id."'";
			$delete_query=mysqli_query($db,$delete_cart);
		
		//clean cart table data end
		//Set new session start
		$_SESSION['bappy_id']=$new_session;
		//Set new session end
		$left_menu_display='display:none';
		$main_content_display='display:none';
		$checkout_success_display='display:block';
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
			<li>Shopping Cart</li>
			<li><i class="fa fa-angle-double-right"></i></li>
			<li>Checkout</li>
		</ul>
		<div class="category_content login_content">
			<div class="main_content main_content_2" style="<?php echo $main_content_display?>">
				<div class="signup_main">
					<div class="login_heading"><i class="fa fa-plug" style="color:red;font-size:25px;"></i> Attention</div>
					<p style="margin-bottom:12px;"><b>Carefully Read</b></p>
					<p style="margin-bottom:15px;">Please See Your Shopping Cart Carefully If You Sure Evrything is ok Then You Checkout</p>
					<a href="../cart/">Shopping Cart</a>
				</div>
				<form method="post" autocomplete="off">
				<div class="login_main">
					<div class="login_heading">Returning Customer</div>
					<p style="margin-bottom:12px;"><b>I am a returning customer</b></p>
					<div id="form_box" style="<?php echo $display_1?>">
						<label>E-Mail Address</label><br>
						<input type="email" placeholder="E-Mail Address" name="email" required />
						<label>Password</label><br>
						<input type="password" placeholder="Password" name="password" required />
						<span>Frogotten Password</span>
						<button name="login_sbt">Login</button>
					</div>
					<div id="logged_in" style="<?php echo $display_2?>;font-size:22px;color:orange;font-weight:bold;">Logged In</div>
				</div>
				</form>
				<div class="clear"></div>
				<div class="latest_caption" style="font-size:20px;margin-top:25px;">Checkout</div>
					<div class="latest_border" style="margin-bottom:0px;"></div>
					<div class="product_header product_header_2 checkout_header" style="padding:0px 0px !important;height:30px;text-align:center;">
						<h4>Your Personal Details</h4>
					</div>
				<div class="checkout_main">
				<form method="post" autocomplete="off">
					<div class="info_child_box">
						<div class="col-md-2 col-sm-12">
							<div class="letter"><span><i class="fa fa-star"></i></span> Full Name</div>
						</div>
						<div class="col-md-10 col-sm-12" style="padding-right:0;">
							<div class="info_box"><input type="text" value="<?php echo $name_value?>" placeholder="Write Your Full Name" name="name" required /></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					<div class="info_child_box">
						<div class="col-md-2 col-sm-12">
							<div class="letter"><span><i class="fa fa-star"></i></span> Mobile </div>
						</div>
						<div class="col-md-10 col-sm-12" style="padding-right:0;">
							<div class="info_box"><input type="number" value="<?php echo $mobile_value?>" placeholder="01XXXXXXXXX" name="mobile" required /></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					
					<div class="info_child_box">
						<div class="col-md-2 col-sm-12">
							<div class="letter"> Email </div>
						</div>
						<div class="col-md-10 col-sm-12" style="padding-right:0;">
							<div class="info_box"><input type="email" value="<?php echo $email_value?>" placeholder="E-Mail Address (Optional)" name="email" /></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					<div class="info_child_box">
						<div class="col-md-2 col-sm-12">
							<div class="letter"> Telephone </div>
						</div>
						<div class="col-md-10 col-sm-12" style="padding-right:0;">
							<div class="info_box"><input type="number" value="<?php echo $tel_value?>"  placeholder="Telephone Number (Optional)" name="telephone"/></div>
						</div>
						<div class="clear"></div>
					</div>
					
					
					
					<div class="info_child_box">
						<div class="col-md-2 col-sm-12">
							<div class="letter"><span><i class="fa fa-star"></i></span> Address </div>
						</div>
						<div class="col-md-10 col-sm-12" style="padding-right:0;">
							<div class="info_box"><input type="text" value="<?php echo $address_value?>" placeholder="Your Current Address" name="address" required /></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="checkout_border"></div>
				<div class="policy_main">
					<div class="policy_content checkout_policy_content">I Write My Information and Address <b>Successfully</b> <input type="checkbox" required=""></div>
					<button class="register_ok" name="sbt">Continue</button>
					<div class="clear"></div>
				</div>
				</form>
			</div>
			
			<div class="checkout_success_main" style="<?php echo $checkout_success_display?>">
				<div class="checkout_success">
					<div class="latest_caption" style="font-family:calibri;font-weight:bold;">Your order has been placed </div>
					<div class="latest_border"></div>
					<p>Your order has been successfully processed!</p>
					<p>Please direct any questions you have to call  <span>01911048909</span></p>
					<p>Thanks for shopping with us online!</p>
				</div>
				<div class="checkout_border_2"></div>
				<button class="checkout_back" onclick="window.location.href=''">Go Back</button>
			</div>
			
			
			<div class="checkout_success_main" style="<?php echo $login_alert_display?>">
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
	</div><!--container end-->
	<!--===================================Content Area End ===========================================-->
	
	
	<!--===================================Footer Start ====================================-->
							<?php include('../join/footer.php');?>
	<!--===================================Footer End ====================================-->
	
	
	
	
	
	
	
	
    
    <!--==============================Javascript Link Start ========================================-->
    <script src="../js/bootstrap.min.js"></script>
	<script src="../js/slider.js"></script>
	<script >
	if ($(window).width() <= 700) {
    $('.category_header').css("margin-bottom","20px");
	}
	if(window.history.replaceState){
		window.history.replaceState(null,null,window.location.href);
	}
	</script>
	<!--==============================Javascript Link End ========================================-->
  </body>
</html>