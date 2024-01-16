<?php
	
	include "../actions/connect_db.php";

	$courtReservationId = $_POST['courtReservationId'];
	$userId = $_POST['userId'];
	$amountToBePaid = $_POST['amountToBePaid'];
	$gcashName = $_POST['gcashName'];
	$gcashNumber = $_POST['gcashNumber'];
    $image = $_POST['image'];



	$extension=array('jpeg','jpg','png','gif');

    foreach ($_FILES['image']['tmp_name'] as $key => $value) {

        $filename=$_FILES['image']['name'][$key];
        $filename_tmp=$_FILES['image']['tmp_name'][$key];
        echo '<br>';
        $ext=pathinfo($filename,PATHINFO_EXTENSION);

      

        $finalimg='';
        if(in_array($ext,$extension))
        {
            if(!file_exists('images/'.$filename))
            {
            move_uploaded_file($filename_tmp, 'images/'.$filename);
            $finalimg=$filename;
            }else
            {
                 $filename=str_replace('.','-',basename($filename,$ext));
                 $newfilename=$filename.time().".".$ext;
                 move_uploaded_file($filename_tmp, 'images/'.$newfilename);
                 $finalimg=$newfilename;


            }
            //insert

            $insertpp = "INSERT INTO tbl_receipt( userId, courtReservationId, file, gcashName, gcashNumber) VALUES ('$userId','$courtReservationId','$finalimg','$gcashName','$gcashNumber') ";
             mysqli_query($connect, $insertpp);

             echo $insertpp;

        }
    }

    $sql = "SELECT * FROM tbl_court_reservation where courtReservationId = '$courtReservationId' ";
    $query = mysqli_query($connect, $sql);
    $fetch = $query->fetch_assoc();

    $payment = $fetch['payment'];
    $courtId = $fetch['courtId'];

    $finalTotal = ($payment*1) + ($amountToBePaid*1) ;

    $update = "UPDATE tbl_court_reservation set payment = '$finalTotal' where courtReservationId = '$courtReservationId' ";
    $q = mysqli_query($connect, $update);

    $sql1 = "SELECT * FROM tbl_court_reservation where courtReservationId = '$courtReservationId' ";
    $query1 = mysqli_query($connect, $sql1);
    $fetch1 = $query1->fetch_assoc();

     $payment1 = $fetch1['payment'];

    $totalPayment = $fetch1['totalPayment'];

    if ($payment1 >= $totalPayment1) {
    	$update1 = "UPDATE tbl_court_reservation set status = 'Fully Paid' where courtReservationId = '$courtReservationId' ";
    	$q1 = mysqli_query($connect, $update1);
    }

    

    if ($q) {
    	header("location: appointmentDetails.php?courtId=$courtId&courtReservationId=$courtReservationId&userId=$userId");
    }else{
    	echo $update;
    }




?>