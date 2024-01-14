<?php 
include('../../actions/connect_db.php');

if(isset($_POST['SuccessAppointmentBtn'])){

    $courtReservationId = $_POST['courtReservationId'];
    $customerId = $_POST['customerId'];
    $description = 'Success Appointment';
    $userId = $_POST['userId'];

    $sql = "UPDATE tbl_court_reservation SET status = 'Success Appointment' WHERE courtReservationId = '$courtReservationId'";

    if($connect->query($sql) === TRUE){

        $notificationSQL = "INSERT INTO tbl_notification (`userId`,`id`,`description`,`NotificationStatus`) VALUES('$userId','$customerId','$description',1)";
        $result = $connect->query($notificationSQL);

        header("Location: ../CourtReservationList.php?SuccessAppointment=1");
    }else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }

}

?>