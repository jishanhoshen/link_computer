<?php include("db.php");?>
<?php 
	if(isset($_POST['like'])){
		$like_select="select * from like_table where id='1'";
		$like_query=mysqli_query($db,$like_select);
		$like_row=mysqli_fetch_assoc($like_query);
		$current_like=$like_row['like_count'];
		$replace_like=$current_like+1;
		$like_update="update like_table set like_count='".$replace_like."'";
		$like_update_query=mysqli_query($db,$like_update);
	}
?>