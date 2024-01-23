<?php include "includes/header.php" ?>

<div class="row gx-4 gx-lg-5 align-items-center my-5">

	<h1 class="text-center mb-5">Appointments</h1>

	<?php 

	$sql = "SELECT
			    *,
			    DATE_FORMAT(MIN(STR_TO_DATE(SUBSTRING_INDEX(tdat.time, '-', 1), '%l:%i%p')), '%l:%i%p') AS start_time,
			    DATE_FORMAT(MAX(STR_TO_DATE(SUBSTRING_INDEX(tdat.time, '-', -1), '%l:%i%p')), '%l:%i%p') AS end_time
			FROM
			    tbl_court_reservation tcr
			    JOIN tbl_court tc ON tcr.courtId = tc.courtId
			    JOIN tbl_date_and_time tdat ON tcr.courtReservationId = tdat.courtReservationId
			WHERE
			    tcr.userId = '$userId'
			AND tcr.isActive = 1
			GROUP BY
			    tdat.date, tdat.courtReservationId";
	$query = mysqli_query ($connect, $sql);
	while($row = $query->fetch_assoc()){ 
		$totalPayment = $row['totalPayment']*1;
		$payment = $row['payment']*1;
		$status = $row['status'];
 
		?>
		
		<div class="col-md-12 mb-5 ">

                        <div class="card h-100">
                            <div class="card-body">
                            	<div class="d-flex justify-content-between">
								<h2 class="card-title"><?=$row['courtName']?></h2>
                            		 <?php
		                            if ($payment == 0) { ?>
		                              <span class='badge bg-danger  my-2 mx-2 '>Not Paid</span>
		                           <?php }else if ($totalPayment == $payment){ ?>
		                              <span class='badge bg-success  my-2 mx-2'>Paid</span>
		                            <?php }else if($totalPayment > $payment && $payment != 0){ ?>
		                                <span class='badge bg-warning text-white mx-2 my-2'>Partial</span>
		                            <?php } ?>
                            		
                            	</div>
                                
                                <div class="d-flex justify-content-between">
                                     <p class="card-text"><i><?=$row['courtType']?></i></p>
                                     <p class="card-text"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #dc3545;"></i><?=$row['courtLocation']?></p>
                                </div>
                                    
                                <p class="card-text"><?=$row['courtDetails']?></p>
                                <div class="d-flex justify-content-between">
                                	<p><i class="fa-solid fa-peso-sign me-2" style="color: #dc3545;"></i> P<?=$row['courtRates']?>.00/hr</p>
	                                <p><i class="fa-solid fa-envelope me-2" style="color: #dc3545;"></i> <?=$row['courtEmail']?> </p>
	                                <p><i class="fa-solid fa-address-book me-2" style="color: #dc3545;"></i> <?=$row['courtContact']?> </p>
                                </div>

                                <hr>
                                <h4>Reservation Details</h4>

                                <div>

                                	<p>Reservation Date:  <?=$row['date']?></p>
	                                <p> Start Time: <?php echo $row['start_time'] ?> - End Time : <?php echo $row['end_time'] ?> </p>
	                                <p>Total Payment: P <?=$row['payment']?>.00 / P <?=$row['totalPayment']?>.00</p>
                                	
                                </div>
                                
                            </div>



                            <div class="d-flex justify-content-end">
                           
	                            <?php
	                            if ($payment == 0) { 
	                            if ($status == 'Pending Reservation') { ?>
	                             	<a href="#" class='btn btn-secondary text-white mx-2 my-2' disabled>Pending Reservation</a>
	                            	 <a href="cancelAppointment.php?courtReservationId=<?=$row['courtReservationId']?>" class='btn btn-primary  my-2 mx-2 '>Cancel Reservation</a>
	                          <?php }else if($status == 'Pending Payment'){ ?>
	                          		<a href="appointmentDetails.php?courtId=<?=$row['courtId']?>&courtReservationId=<?=$row['courtReservationId']?>&userId=<?=$userId?>" class='btn btn-primary  my-2 mx-2 '>Proceed to payment</a>
	                         <?php } ?>
	                              
	                           <?php }else if ($payment >= $totalPayment){ ?>
	                           		 <?php if ($status == 'Success Appointment'){ ?>
									<a href="feedback.php?courtId=<?=$row['courtId']?>&courtReservationId=<?=$row['courtReservationId']?>&userId=<?=$userId?>" class='btn btn-warning text-white my-2 mx-2 '>Give a feedback</a>
									<?php }else{ ?>
	                            	<a href="appointmentDetails.php?courtId=<?=$row['courtId']?>&courtReservationId=<?=$row['courtReservationId']?>&userId=<?=$userId?>" class='btn btn-success  my-2 mx-2'>Appointment Details</a>
	                            <?php } }else if($totalPayment > $payment && $payment != 0){ ?>
								<a href="appointmentDetails.php?courtId=<?=$row['courtId']?>&courtReservationId=<?=$row['courtReservationId']?>&userId=<?=$userId?>" class='btn btn-success  my-2 mx-2'>Appointment Details</a>
	                           <?php } ?>

                             </div>
                            
                        </div>

                 </div>

	<?php } ?>
	


</div>

<?php include "includes/footer.php" ?>