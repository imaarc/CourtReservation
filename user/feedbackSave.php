<?php 
include "../actions/connect_db.php";

$courtId = $_POST['courtId'];
$userId = $_POST['userId'];
$feedback = $_POST['feedback'];



$sql = "INSERT INTO tbl_feedback( userId, courtId, feedback) VALUES ('$userId','$courtId','$feedback')";
$query = mysqli_query ($connect, $sql);

	if ($query) {
		header("location: index.php");
	}else{
		echo $sql;
	}

?>