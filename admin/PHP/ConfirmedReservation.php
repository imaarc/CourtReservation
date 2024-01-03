<?php 
include('../../actions/connect_db.php');


if(isset($_POST['ConfirmedReservationBtn'])){

    $courtReservationId = $_POST['courtReservationId'];
    $customerId = $_POST['customerId'];
    $description = 'Your reservation has been approved!';
    $userId = $_POST['userId'];

    $sql = "UPDATE tbl_court_reservation SET status = 'Confirmed' WHERE courtReservationId = '$courtReservationId'";

    if($connect->query($sql) === TRUE){

        $notificationSQL = "INSERT INTO tbl_notification (`userId`,`id`,`description`,`NotificationStatus`) VALUES('$userId','$customerId','$description',1)";
        $result = $connect->query($notificationSQL);

        header("Location: ../CourtReservationList.php?confirmed=1");
    }else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

}


?>