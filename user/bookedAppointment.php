<?php

$selectDate = $_GET['selectDate'];
$selectedTimes = $_GET['selectedTimes'];
$courtId = $_GET['courtId'];

	function sumTimeSlots($timeSlots)
{
    $totalMinutes = 0;

    foreach ($timeSlots as $timeSlot) {
        list($start, $end) = explode('-', $timeSlot);

        $startTime = DateTime::createFromFormat('h:ia', trim($start));
        $endTime = DateTime::createFromFormat('h:ia', trim($end));

        if ($startTime !== false && $endTime !== false) {
            $diff = $endTime->diff($startTime);
            $totalMinutes += ($diff->h * 60) + $diff->i;
        }
    }

    $totalHours = floor($totalMinutes / 60);
    $remainingMinutes = $totalMinutes % 60;

    return sprintf("%02d:%02d", $totalHours, $remainingMinutes);
}

$totalTime = sumTimeSlots($selectedTimes);

// Extract hours as an integer
$totalHours = (int) explode(":", $totalTime)[0];
    


?>


<?php include 'includes/header.php' ?>

<?php

 $sql = "SELECT * FROM tbl_court where courtId = '$courtId' and isActive = 1 ";
 $query = mysqli_query($connect, $sql);
 $fetch = $query->fetch_assoc();

 $rate = $fetch['courtRates'];

 $totalPayment = $totalHours * $rate;

 ?>


<div class="row gx-4 gx-lg-5 align-items-center my-5">

	<h1 class="text-center mb-5">Reservation Details</h1>


                <div id="carouselExampleInterval" class="carousel slide col-lg-6 mb-5" data-bs-ride="carousel">
				    <div class="carousel-inner">

				        <?php 
				        $getImages = "SELECT * FROM tbl_image_uploaded where isActive = 1 and id = '$courtId' ";
				        $queryGetImages = mysqli_query($connect, $getImages);

				        $firstItem = true; // Flag to track the first item

				        while($row = $queryGetImages->fetch_assoc()) {
				            // Add the "active" class to the first item
				            $activeClass = $firstItem ? 'active' : '';
				        ?>

				            <div class="carousel-item <?= $activeClass ?>" data-bs-interval="10000">
				                <img src="../admin/uploaded_pics/<?= $row['filename'] ?>" class="d-block w-100" alt="..." height="550">
				            </div>

				        <?php
				            $firstItem = false; // Set the flag to false after the first item
				        } 
				        ?>

				    </div>
				    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
				        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				        <span class="visually-hidden">Previous</span>
				    </button>
				    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
				        <span class="carousel-control-next-icon" aria-hidden="true"></span>
				        <span class="visually-hidden">Next</span>
				    </button>
				</div>


                <div class="col-lg-6">

                    <h1 class="font-weight-light"> <?=$fetch['courtName']?> </h1>
                    <div class="d-flex justify-content-between">
                    	<p><i><?=$fetch['courtType']?></i></p>
                    	<p><i class="fa-solid fa-dollar-sign me-2" style="color: #dc3545;"> </i>P<?=$fetch['courtRates']?>.00/hr</p>
                    </div>
                    
                    <p><?=$fetch['courtDetails']?></p>
                    <div class="d-flex justify-content-between">
                    	<p class="card-text"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #dc3545;"></i><?=$fetch['courtLocation']?></p>
                    	<p><i class="fa-solid fa-envelope me-2" style="color: #dc3545;"></i> <?=$fetch['courtEmail']?> </p>
                        <p><i class="fa-solid fa-address-book me-2" style="color: #dc3545;"></i> <?=$fetch['courtContact']?> </p>
                    </div>
                    <hr class="my-3">

                    <div class="mb-3">
                    	<p>Selected Date: <b><?=$selectDate?></b></p>
                    	<p>Selected Time/s: <br>
                    		<?php
                    			foreach($selectedTimes as $selectTime){ ?>
								<b class="ms-5"><?=$selectTime?></b><br>
                    		<?php } ?>
                    	</p>
                    	<p>Total time: <b><?=$totalHours?> hr/s</b></p>
                    </div>

                    <hr class="my-3">
                    <div class="mb-3 d-flex justify-content-end">
                    	<div>
                    		<p>Total time: <b><?=$totalHours?> hr/s</b></p>
                    		<p>Rate: <b><?=$fetch['courtRates']?>.00/hr</b></p>
                    		<hr>
							<p>Total Payment: <b>P <?=$totalPayment?>.00</b></p>

							<form action="savedAppointment.php" method="POST">

								<input type="hidden" name="courtId" value="<?=$courtId?>">
								<input type="hidden" name="userId" value="<?=$userId?>">
								<input type="hidden" name="selectDate" value="<?=$selectDate?>">
								<input type="hidden" name="totalPayment" value="<?=$totalPayment?>">

								<?php foreach ($selectedTimes as $time): ?>
							        <input type="hidden" name="selectTime[]" value="<?=$time?>">
							    <?php endforeach; ?>
							    

								<button type="submit" value="submit" class="btn btn-danger w-100">Confirm Reservation</button>
								
							</form>

							
                    	</div>


                    	
                    </div>
                </div>

                

            </div>



<?php include 'includes/footer.php' ?>