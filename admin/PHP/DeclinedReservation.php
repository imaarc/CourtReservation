<?php 
include('../../actions/connect_db.php');


if(isset($_POST['DeclinedReservationBtn'])){

    $courtReservationId = $_POST['courtReservationId'];
    $customerId = $_POST['customerId'];
    $description = 'Your reservation has been declined!';
    $userId = $_POST['userId'];

    $sql = "UPDATE tbl_court_reservation SET isActive = 0 WHERE courtReservationId = '$courtReservationId'";

    if($connect->query($sql) === TRUE){

        $sqldelete = "delete from tbl_date_and_time where courtReservationId = '$courtReservationId' ";
        mysqli_query($connect, $sqldelete);


        $notificationSQL = "INSERT INTO tbl_notification (`userId`,`id`,`description`,`NotificationStatus`) VALUES('$userId','$customerId','$description',1)";
        $result = $connect->query($notificationSQL);
        header("Location: ../CourtReservationList.php?declined=1");
    }else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

}


?>