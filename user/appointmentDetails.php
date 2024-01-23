<?php include "includes/header.php" ?>

<div class="row gx-4 gx-lg-5 align-items-center my-5">

	<h1 class="text-center mb-5">Appointments Details</h1>

	<?php 

	$courtId = $_GET['courtId'];
	$courtReservationId = $_GET['courtReservationId'];
	$userId = $_GET['userId'];

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
			AND tcr.courtReservationId = '$courtReservationId'

			    ";
	$query = mysqli_query ($connect, $sql);

	//echo $sql;

	$fetch = $query->fetch_assoc();
	$totalPayment = $fetch['totalPayment']*1;
	$payment = $fetch['payment']*1;
	$status = $fetch['status'];

		?>

		<div class="col-md-12 mb-5 ">

                        <div class="card h-100">
                            <div class="card-body">

                            	<div id="carouselExampleInterval" class="carousel slide col-lg-12 mb-5" data-bs-ride="carousel">
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
                            	<div class="d-flex justify-content-between">
								<h2 class="card-title"><?=$fetch['courtName']?></h2>
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
                                     <p class="card-text"><i><?=$fetch['courtType']?></i></p>
                                     <p class="card-text"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #dc3545;"></i><?=$fetch['courtLocation']?></p>
                                </div>
                                    
                                <p class="card-text"><?=$fetch['courtDetails']?></p>
                                <div class="d-flex justify-content-between">
                                	<p><i class="fa-solid fa-peso-sign me-2" style="color: #dc3545;"></i> P<?=$fetch['courtRates']?>.00/hr</p>
	                                <p><i class="fa-solid fa-envelope me-2" style="color: #dc3545;"></i> <?=$fetch['courtEmail']?> </p>
	                                <p><i class="fa-solid fa-address-book me-2" style="color: #dc3545;"></i> <?=$fetch['courtContact']?> </p>
                                </div>

                                <hr>
                                <h4>Reservation Details</h4>

                                <div>

                                	<p>Reservation Date:  <?=$fetch['date']?></p>
	                                <p> Start Time: <?php echo $fetch['start_time'] ?> - End Time : <?php echo $fetch['end_time'] ?> </p>
	                                <p>Total Payment: P <?=$fetch['payment']?>.00 / P <?=$fetch['totalPayment']?>.00</p>
                                	
                                </div>
                                <?php
                                if ($payment < $totalPayment) { ?>
                                	<hr>
                                	<h4>Payment Form</h4>

                                <form  class="w-50 mx-auto" action="savePayment.php" method="POST" enctype="multipart/form-data">
                                	<input type="hidden" name="courtReservationId" value="<?=$courtReservationId?>">
                                	<input type="hidden" name="userId" value="<?=$userId?>">
                                	<div class="d-flex justify-content-center">
                                		<img class="mx-auto" src="images/qr_gcash.jpg" width="200">
                                	</div>
                                	<div class="text-center">
                                		<p>09123456789</p>
                                	</div>

                                	<hr>

                                	<div class="mb-3">
									  <label for="exampleFormControlInput1" class="form-label">Amount to be paid</label>
									  <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="amountToBePaid" required="required">
									</div>

									<div class="mb-3">
									  <label for="exampleFormControlInput1" class="form-label">Gcash Name</label>
									  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="gcashName" required="required">
									</div>

									<div class="mb-3">
									  <label for="exampleFormControlInput1" class="form-label">Gcash Number</label>
									  <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="gcashNumber" required="required">
									</div>

                                	<div class="mt-3">
                                		<label>Upload Receipt</label>
                                		<div class="input-group mb-3">
										  <label class="input-group-text" for="inputGroupFile01" >Upload</label>
										  <input type="file" class="form-control" id="inputGroupFile01" name="image[]">
										</div>
                                	</div>

                                	<button class="w-100 btn btn-primary" type="submit" >Save Payment</button>
                                </form>
                                <?php }
                                ?>
                                

                                
                            </div>

                            
                            
                        </div>

                 </div>

                 <div class="my-5"></div>
</div>

<?php include "includes/footer.php" ?>
