<?php
include "../actions/connect_db.php";



  $duration = 60;
  $cleanup = 0;
  $start = "9:00";
  $end = "21:00";

 function timeSlots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanUpInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for ($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanUpInterval)) {
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod > $end) {
            break;
        }
        $slots[] = $intStart->format("g:iA") . "-" . $endPeriod->format("g:iA");
    }

    return $slots;
}

$timeslots = timeslots($duration, $cleanup, $start, $end); //time generated


$values = $_POST['dateValue'];
$explode = explode("|", $values);
$dateSelected = $explode[0];
$courtId = $explode[1];

$query = "SELECT time FROM tbl_date_and_time WHERE isActive = 1 and date = '$dateSelected' and courtId = '$courtId' ";
$result = mysqli_query($connect, $query);

if ($result) {
    $timeArrayFromDb = array(); // time from db

    while ($row = mysqli_fetch_assoc($result)) {
        $timeArrayFromDb[] = $row['time'];
    }

}
  
    foreach($timeslots as $key => $ts) { 
        if (!in_array($ts, $timeArrayFromDb)) {
        ?>
                        

    <div class="form-check col-md-12 mb-1">
        <input class="form-check-input checkBoxTime ms-1 me-2" type="checkbox" name="selectedTimes[]" value="<?= $ts ?>" id="flexCheckDefault<?= $key ?>" onchange="updateCheckboxes(this, <?= $key ?>)">
            <label class="form-check-label" for="flexCheckDefault<?= $key ?>"> <?= $ts ?> </label>
                           
    </div>


<?php 

        }      
    }

?>
