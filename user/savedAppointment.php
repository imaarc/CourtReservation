<?php 
	include "../actions/connect_db.php";

	$courtId = $_POST['courtId'];
	$userId = $_POST['userId'];
	$selectDate = $_POST['selectDate'];
	$selectTime = $_POST['selectTime'];

	$sqlInsert = "INSERT INTO tbl_court_reservation( courtId, userId, status) VALUES ('$courtId', '$userId',  'Pending')";
	$query = mysqli_query($connect, $sqlInsert);

	$selectId = "SELECT * FROM tbl_court_reservation where isActive = 1 ORDER BY courtReservationId DESC LIMIT 1 ";
	$querySelectId = mysqli_query($connect, $selectId);
	$fetchId = $querySelectId->fetch_assoc();

	$id = $fetchId['courtReservationId'];

	if ($query) {
		foreach($selectTime as $times){
			
			$sqlDateTimeInsert = " INSERT INTO tbl_date_and_time( courtReservationId,courtId, date, time ) VALUES ('$id','$courtId','$selectDate','$times')";
			echo $sqlDateTimeInsert;
			$querySqlDateTimeInsert = mysqli_query($connect, $sqlDateTimeInsert);
		}

		header("location: index.php?msg=1");
	}


 ?>