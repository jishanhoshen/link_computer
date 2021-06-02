<?php include('../join/db.php');?>
<?php 
    $id=htmlspecialchars($_GET['id']);
    $delete="delete from admin where id='".$id."'";
    $query=mysqli_query($db,$delete);
    header('location:edit_admin.php');
?>