<?php 
	include 'connect_db.php';

	$name = $_POST['signup-name'];
	$username = $_POST['signup-username'];
	$password = $_POST['signup-password'];
	$hash = md5($password);
	$status = '1';

	$sql = "INSERT INTO tbl_user (name,username,password,status) VALUES ('$name','$username','$hash','$status') ";
	$query = mysqli_query($connect, $sql);

	if ($query == true) {
		header('location:../index.php');
	}else{
		echo 'error '.$sql. 'into'. $connect->error;
	}


 ?>