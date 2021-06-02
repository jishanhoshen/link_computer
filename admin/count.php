<?php include('../join/db.php')?>
<?php 
	$select="select sum(quantity) from admin_product";
	$query=mysqli_query($db,$select);
	$row=mysqli_fetch_assoc($query);
	echo $count=$row['sum(quantity)'];
	if($count==0){
		echo $count=0;
	}
?>