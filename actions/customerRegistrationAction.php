<?php 
	include 'connect_db.php';

	// login credentials

	$username = $_POST['username'];
	$password = $_POST['password'];

	// user details

	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$contactNumber = $_POST['contactNo'];
	$emailAddress = $_POST['emailAd'];

	

	$sql = "INSERT INTO tbl_user( username, password, role) VALUES ('$username','$password','user') ";
	$query = mysqli_query($connect, $sql);

	if ($query) {

		$idSelect = "SELECT * FROM tbl_user where isActive = 1 ORDER BY userId DESC LIMIT 1";
		$fetch = mysqli_query($connect, $idSelect)->fetch_assoc();
		$userId = $fetch['userId'];


		$insertDetails = "INSERT INTO tbl_user_details( userId, fullName, address, contactNumber, emailAddress) VALUES ('$userId','$fullname','$address','$contactNumber','$emailAddress')";
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