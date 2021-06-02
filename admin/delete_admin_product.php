<?php include('../join/db.php')?>
<?php 
	$id=htmlspecialchars($_GET['session_id']);
	$delete_1="delete from session where session_id='".$id."'";
	$delete_1_query=mysqli_query($db,$delete_1);
	$delete_2="delete from admin_product where session_id='".$id."'";
	$delete_2_query=mysqli_query($db,$delete_2);
	header('location:order.php');
?>