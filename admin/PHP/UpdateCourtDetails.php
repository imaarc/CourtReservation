<?php 
include('../../actions/connect_db.php');

if(isset($_POST['UpdateButtonCourtDetails'])){

    $courtName = $_POST['courtName'];
    $courtDetails = $_POST['courtDetails'];
    $courtType = $_POST['courtType'];
    $courtLocation = $_POST['courtLocation'];
    $courtContact = $_POST['courtContact'];
    $courtEmail = $_POST['courtEmail'];
    $courtId = $_POST['courtId'];
    $courtRates = $_POST['courtRates'];

    $sql = "UPDATE tbl_court SET courtName = '$courtName', courtDetails = '$courtDetails',  courtLocation = '$courtLocation', courtContact = '$courtContact', courtEmail = '$courtEmail', courtRates = '$courtRates' WHERE courtId = '$courtId'";

    if($connect->query($sql) === TRUE){
        header("Location: ../CourtManagement.php?updatesuccess=1");
    }else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }


}


?>