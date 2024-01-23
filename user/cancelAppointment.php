<?php 
	include "../actions/connect_db.php";

	$courtId = $_GET['courtReservationId'];

	$sqlInsert = "update tbl_court_reservation set isActive = 0 where courtReservationId= '$courtId' ";
	$query = mysqli_query($connect, $sqlInsert);

	

	if ($query) {

		$sqldelete = "delete from tbl_date_and_time where courtReservationId = '$courtId' ";
	 mysqli_query($connect, $sqldelete);

		header("location: index.php?msg=1");
	}


 ?>