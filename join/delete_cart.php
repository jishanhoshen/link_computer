<?php include('db.php');?>
<?php 
	if(isset($_GET['id'])){
		$id=htmlspecialchars($_GET['id']);
		$delete="delete from cart where id='".$id."'";
		$query=mysqli_query($db,$delete);
	}
	header('location:../cart/');
?>