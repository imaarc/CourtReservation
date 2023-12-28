<?php 

include('../../actions/connect_db.php');

if(isset($_GET['courtID'])){

    $courtID = mysqli_real_escape_string($connect, $_GET['courtID']);

    $sql = "SELECT * FROM tbl_image_uploaded WHERE id = '$courtID'";
    $result = $connect->query($sql);

    $imageFilenames = [];
    while ($row = $result->fetch_assoc()) {
        $imageFilenames[] = $row["filename"];
    }

}

header('Content-Type: application/json');
echo json_encode($imageFilenames);


?>