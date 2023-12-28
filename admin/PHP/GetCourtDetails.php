<?php 

include('../../actions/connect_db.php');

if(isset($_GET['courtID'])){
    $courtID = mysqli_real_escape_string($connect, $_GET['courtID']);

    $query = "SELECT * FROM tbl_court WHERE courtId='$courtID'";
    $query_run = mysqli_query($connect, $query);

    if(mysqli_num_rows($query_run) == 1){
        $courtID = mysqli_fetch_array($query_run);

        $res = [
            'status' => 200,
            'message' => 'student fetch Succesfully by ID',
            'data' => $courtID
        ];
        echo json_encode($res);
        
    }
    else
    {
        $res = [
            'status' => 404,
            'message' => 'courtID ID not found',
        ];
        echo json_encode($res);
        
    }

}


?>