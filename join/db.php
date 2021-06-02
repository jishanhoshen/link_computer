<?php 
	$db=mysqli_connect("localhost","root","","linkcomp_computer_2");
	session_start();
	date_default_timezone_set('asia/dhaka');//Bangladesh Time
	$date=date('d-m-Y');
	$time=date('h:i A');
?>