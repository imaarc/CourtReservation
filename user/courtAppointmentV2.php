<?php include 'includes/header.php' ?>


<?php 
	if (isset($_GET['courtId'])) {
		$courtId = $_GET['courtId'];
	}
 ?>

 <?php 

 function build_calendar($month, $year, $courtId){
 	$daysOfTheWeek = array('Sunday','Monday', 'Tuesday', 'Wednesday','Thursday',  'Friday', 'Saturday');

 	$firstDayofTheMonth = mktime(0,0,0,$month, 1, $year);

 	$numberDays = date('t', $firstDayofTheMonth);

 	$dateComponents = getdate($firstDayofTheMonth);

 	$monthName = $dateComponents['month'];

 	$dayOfWeek = $dateComponents['wday'];

 	$dateToday = date('Y-m-d');

 	// table

 	$calendar = "<table class='table table-bordered'>";
 	$calendar.= "<center><h2 class='mb-5'>$monthName $year</h2>";

 	$calendar.= "<a class='btn btn-danger me-2' href='?courtId=".$courtId."&month=".date('m', mktime(0,0,0, $month-1, 1,$year))."&year=".date('Y', mktime(0,0,0, $month-1, 1,$year)). "'>Previous Month </a> ";

 	 $calendar.= "<a class='btn btn-danger me-2' href='?courtId=".$courtId."&month=".date('m')."&year=".date('Y'). "'>Current Month </a> ";

 	$calendar.= "<a class='btn btn-danger me-2' href='?courtId=".$courtId."&month=".date('m', mktime(0,0,0, $month+1, 1,$year))."&year=".date('Y', mktime(0,0,0, $month+1, 1,$year)). "'>Next Month </a></center><br><br> ";

 	$calendar.="<tr>";

 	foreach($daysOfTheWeek as $day){
 		$calendar .="<th class='header'>$day</th> ";
 	}

 	$calendar.="</tr><tr>";

 	if ($dayOfWeek>0) {
 		for($k=0;$k<$dayOfWeek;$k++){
 			$calendar.="<td></td>";
 		}
 	}

 	$currentDay = 1;

 	$month = str_pad($month, 2,"0", STR_PAD_LEFT);

 	while ($currentDay <= $numberDays) {

 		if ($dayOfWeek == 7) {
 			$dayOfWeek = 0;
 			$calendar.="<tr></tr>";
 		}

 		$currentDayRel = str_pad($currentDay, 2,"0", STR_PAD_LEFT);
 		$date ="$year-$month-$currentDayRel";


 		// ------------------

 		  $duration = 60;
		  $cleanup = 0;
		  $start = "9:00";
		  $end = "21:00";

 		$timeSlots = timeSlots($duration, $cleanup, $start, $end);
		$timeSlotsFromDb = timeSlotsFromDb($date, $courtId);

		$countDifference = count($timeSlotsFromDb) - count($timeSlots);
		//-----------------------------

		



 		$dayName = strtolower(date('l', strtotime($date)));
 		$eventNum = 0;
 		$today = $date == date('Y-m-d')?"background-color:#e7e7e7;color:white":"";

 		if ($countDifference ===0 ) {
 			$calendar.="<td><h4>$currentDay <br><br> <button class='btn btn-danger text-white'>Fully Booked</button></h4>";
 		}
 		else if ($date <= date('Y-m-d')) {
 			$calendar.="<td><h4>$currentDay <br><br> <button class='btn btn-warning text-white'>N/A</button></h4>";
 		}else{
 			$calendar.="<td style='$today'><h4>$currentDay <br><br> <button  value='$date'  class='btn btn-primary dateBtn' data-date='$date|$courtId' data-bs-toggle='modal' data-bs-target='#timeModal'>Book Now! </button></h4>";
 		}

 	
 		
 		
 		$calendar.="</td>";

 		$currentDay++;
 		$dayOfWeek++;
 	}

 	if ($dayOfWeek !=7) {
 		$remainingDays = 7-$dayOfWeek;
 			for($i=0;$i<$remainingDays;$i++){
 				$calendar.="<td></td>";
 			}
 	}

 	$calendar.="</tr>";
 	$calendar.="</table>";

 	echo $calendar;

 }

 ?>

 <?php

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

	

	function timeSlotsFromDb ($date, $courtId){
		global $connect;
		$query = "SELECT time FROM tbl_date_and_time WHERE isActive = 1 and date = '$date' and courtId = '$courtId' ";
		$result = mysqli_query($connect, $query);

		if ($result) {
		    $timeArrayFromDb = array(); // time from db

		    while ($row = mysqli_fetch_assoc($result)) {
		        $timeArrayFromDb[] = $row['time'];
		    }

		}

		return $timeArrayFromDb;
	}


 ?>


  <div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Available Time</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body ">
      	<h4 >Selected Date: <span id="selectedDate"></span></h4>
      	<form action="bookedAppointment.php" method="GET">

      		    <input type="hidden" name="courtId" value="<?=$courtId?>">
      			<input type="hidden" name="selectDate" value="">

  				<div class="row p-3 timeSlotDiv">
  					
  				</div>

  				<button type="submit"  value="submit" class="btn btn-primary w-100 my-3" >Confirm Details</button>
  		</form>

      </div>
    </div>
  </div>
</div>
 


 <div class="row gx-4 gx-lg-5 align-items-center mb-5">
  <h1 class="text-center mb-3 mt-2">Availability Calendar</h1>

  	<div class="container mb-5">
  		<div class="row mb-5">
  			<div class="col-md-12 mb-5">

  				<?php 

  				$dateComponents = getdate();

  				if(isset($_GET['month']) && isset($_GET['year'])){
					$month = $_GET['month']; 			     
					$year = $_GET['year'];
				}else{
					$month = $dateComponents['mon']; 			     
					$year = $dateComponents['year'];
				}

  				echo build_calendar($month, $year, $courtId);

  				?>
  				
  			</div>
  		</div>
  	</div>



 </div>



<script>
function updateCheckboxes(checkbox, index) {
    // Get all checkboxes
    var checkboxes = document.querySelectorAll('.checkBoxTime');

    // If the clicked checkbox is checked, check all checkboxes between the first and last checkboxes
    if (checkbox.checked) {
        // Find the index of the first checked checkbox
        var firstCheckedIndex = Array.from(checkboxes).findIndex(c => c.checked);

        // Find the index of the last checked checkbox
        var lastCheckedIndex = Array.from(checkboxes).lastIndexOf(checkbox);

        // Check all checkboxes between the first and last checked checkboxes
        for (var i = firstCheckedIndex; i <= lastCheckedIndex; i++) {
            checkboxes[i].checked = true;
        }
    }
}
</script>


  


<?php include 'includes/footer.php' ?>

