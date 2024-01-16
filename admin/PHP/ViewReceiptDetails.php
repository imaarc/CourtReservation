<?php 

include('../../actions/connect_db.php');

if(isset($_GET['courtReservationId'])){
    $courtReservationId = mysqli_real_escape_string($connect, $_GET['courtReservationId']);

    $query = "SELECT * FROM tbl_receipt WHERE courtReservationId='$courtReservationId'";
    $query_run = mysqli_query($connect, $query);

    if(mysqli_num_rows($query_run) == 1){
        $courtReservationId = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'student fetch Succesfully by ID',
            'data' => $courtReservationId
        ];
        echo json_encode($res);
        
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'courtReservationId ID not found',
        ];
        echo json_encode($res);
        
    }

}


?>