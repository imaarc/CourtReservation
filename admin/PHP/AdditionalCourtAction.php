<?php 

include('../../actions/connect_db.php');

if(isset($_POST['SubmitAdditionalCourt'])){
 
    $courtName = $_POST['courtName'];
    $courtDetails = $_POST['courtDetails'];
  
    $courtLocation = $_POST['courtLocation']; 
    $courtContact = $_POST['courtContact'];
    $courtEmail = $_POST['courtEmail'];
    $userId = $_POST['userId'];
    $courtRates = $_POST['courtRates'];

    $type = $_POST['type'];

    $typeFinal = implode(', ', $type);



    $sql = "INSERT INTO tbl_court (`userId`, `courtName`, `courtDetails`,`courtRates`, `courtType`, `courtLocation`, `courtContact`, `courtEmail`)
    VALUES ('$userId', '$courtName', '$courtDetails','$courtRates', '$typeFinal', '$courtLocation', '$courtContact', '$courtEmail')";

    if($connect->query($sql) === TRUE){
        header("Location: ../CourtManagement.php?success=1");
    }else{
        echo "Error: " . $sql . "<br>" . $connect->error;
    }


}

?>