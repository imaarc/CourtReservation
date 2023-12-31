<?php
include "../actions/connect_db.php";

$dateSelected = $_POST['dateSelected'];

$query = "SELECT date, time FROM tbl_date_and_time WHERE isActive = 1 and date = '$dateSelected' ";
$result = mysqli_query($connect, $query);

$availability = array();

while ($row = mysqli_fetch_assoc($result)) {
    $date = $row['date'];
    $time = $row['time'];

    

    // If the date already exists in the $availability array, append the time slot
    if (array_key_exists($date, $availability)) {
        $availability[$date][] =  $time;
    } else {
        // If the date doesn't exist, create a new array with the date and time slot
        $availability[$date] = array($time);
    }
}

echo json_encode($availability, JSON_PRETTY_PRINT);
?>
