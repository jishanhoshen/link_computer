<?php 
	session_start();
	unset($_SESSION['admin']);
	unset($_SESSION['main']);
	header('location:index.php');
?>