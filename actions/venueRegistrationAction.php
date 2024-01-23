<?php 
	include 'connect_db.php';

	// login credentials

	$username = $_POST['username'];
	$password = $_POST['password'];

	// user details

	$name = $_POST['name'];
	$description = $_POST['description'];
	
	$location = $_POST['location'];
	$contactNo = $_POST['contactNo'];
	$emailAd = $_POST['emailAd'];
	$type = $_POST['type'];

	$typeFinal = implode(', ', $type);

	

	$sql = "INSERT INTO tbl_user( username, password, role) VALUES ('$username','$password','venue') ";
	$query = mysqli_query($connect, $sql);

	if ($query) {

		$idSelect = "SELECT * FROM tbl_user where isActive = 1 ORDER BY userId DESC LIMIT 1";
		$fetch = mysqli_query($connect, $idSelect)->fetch_assoc();
		$userId = $fetch['userId'];


		$insertDetails = "INSERT INTO tbl_court( userId, courtName, courtDetails, courtType, courtLocation, courtContact, courtEmail) 
							VALUES ('$userId','$name','$description','$typeFinal', '$location','$contactNo','$emailAd')";

		$queryDetailsInsert = mysqli_query($connect, $insertDetails);
		if ($queryDetailsInsert) {
			header('location:../index.php');
		}else{
			echo 'error '.$insertDetails. 'into'. $connect->error;
		}
	}else{
		echo 'error '.$sql. 'into'. $connect->error;
	}


 ?>