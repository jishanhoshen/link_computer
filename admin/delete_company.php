<?php include('../join/db.php');?>
<?php 
    $id=htmlspecialchars($_GET['id']);
    $delete="delete from company where company_id='".$id."'";
    $query=mysqli_query($db,$delete);
    header('location:all_company.php');
?>