<?php 
include('../../actions/connect_db.php');


if(isset($_POST['ChangePasswordBtn'])){

    $currentPassword = $_POST['currentPassword'];
    $NewPassword = $_POST['NewPassword'];
    $ConfirmPassword = $_POST['ConfirmPassword'];
    $userId = $_POST['userId'];

    $sqlSelectCurrentPassword = "SELECT * FROM tbl_user WHERE `password` = '$currentPassword' AND userId = '$userId'";
    $resultsqlSelectCurrentPassword = $connect->query($sqlSelectCurrentPassword);
    $rowCount = mysqli_num_rows($resultsqlSelectCurrentPassword);
    

    if($rowCount == 0 ){

        header("Location:../Account.php?WrongCurrent=1");

    }else{

        if($NewPassword != $ConfirmPassword){

            header("Location:../Account.php?WrongConfirm=1");

        }else{

            $UpdatePassword = "UPDATE tbl_user SET password = '$NewPassword' WHERE userId = '$userId'";
            $UpdateResult = $connect->query($UpdatePassword);
    
            header("Location:../Account.php?PasswordSuccess=1");

        }

    }

}

?>