<?php 

include('../../actions/connect_db.php');


    if(isset($_FILES["images"]["name"])){
        $uploadFolder = "../uploaded_pics/";

        $courtId = $_POST['courtId'];
        $userId  = $_POST['userId'];
    
        // Create the uploads folder if it doesn't exist
        if (!file_exists($uploadFolder)) {
            mkdir($uploadFolder, 0755, true);
        }   
    
        foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
            $fileName = $_FILES["images"]["name"][$key];
            $filePath = $uploadFolder . $fileName;
    
            // Move the uploaded file to the destination folder
            move_uploaded_file($tmp_name, $filePath);
    
            // Insert file information into the database
            $sqlUpload = "INSERT INTO tbl_image_uploaded (userId,id,filename,isActive) VALUES ('$userId','$courtId','$fileName',1)";
            $connect->query($sqlUpload);

            header("location: ../CourtManagement.php");
    
        }

        header("Location:../CourtManagement.php?SuccessPicture=1");
    
    }


?>