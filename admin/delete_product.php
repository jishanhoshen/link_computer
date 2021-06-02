<?php include('../join/db.php');?>
<?php 
	$id=htmlspecialchars($_GET['id']);
	$delete="delete from products where id='".$id."'";
	$query=mysqli_query($db,$delete);
	header('location:all_product.php');
?>