<?php include("db.php");?>
<?php 
	if(isset($_POST)){
		echo $title=$_POST['title'];
		$code=$_POST['code'];
		$image=$_POST['image'];
		$price=$_POST['price'];
		$quantity=1;
		$s_id=$_POST['id'];
		$stop_time=$_POST['time'];
		$check="select * from cart where code='".$code."'&&session_id='".$s_id."'";
		$check_query=mysqli_query($db,$check);
		$check_count=mysqli_num_rows($check_query);
		if($check_count>0){
			$check_row=mysqli_fetch_assoc($check_query);
			$current_quantity=$check_row['quantity'];
			$replace_quantity=$current_quantity+$quantity;
			$replace_code=$check_row['code'];
			$current_price=$check_row['price'];
			$replace_price=$current_price+$price;
			$quantity_update="update cart set quantity='".$replace_quantity."',price='".$replace_price."',time='".$stop_time."' where code='".$replace_code."'&&session_id='".$s_id."'";
			$q_update_query=mysqli_query($db,$quantity_update);
		}
		else{
		$insert="insert into cart(title,code,image,price,quantity,name,mobile,email,address,session_id,time)values('".$title."','".$code."','".$image."','".$price."','".$quantity."','','','','','".$s_id."','".$stop_time."')";
		$send_query=mysqli_query($db,$insert);
	}
	}
?>