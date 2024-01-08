<?php 
include('../../actions/connect_db.php');

if(isset($_POST['UpdateButtonProfile'])){

    $fullName = $_POST['fullName'];
    $address = $_POST['address'];
    $contactNumber = $_POST['contactNumber'];
    $emailAddress = $_POST['emailAddress'];
    $userId = $_POST['userId'];

    $updateSql = "UPDATE tbl_user_details SET fullName = '$fullName', address = '$address', contactNumber = '$contactNumber', emailAddress = '$emailAddress' WHERE userId = '$userId'";
    $result = $connect->query($updateSql);


    header("Location:../Account.php?SuccessUpdate=1");


}


?>