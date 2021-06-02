<?php include('../join/db.php');?>
<?php 
    $id=htmlspecialchars($_GET['id']);
    $delete="delete from category where category_id='".$id."'";
    $query=mysqli_query($db,$delete);
    header('location:all_cetagory.php');
?>