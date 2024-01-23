<?php include "includes/header.php" ?>

<?php

if (isset($_GET['id'])) {
	$courtId = $_GET['id'];
}

 $sql = "SELECT * FROM tbl_court where courtId = '$courtId' and isActive = 1 ";
 $query = mysqli_query($connect, $sql);
 $fetch = $query->fetch_assoc();
 
 ?>

			<div class="row gx-4 gx-lg-5 align-items-center my-5">

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


                <div class="col-lg-12">
                    <h1 class="font-weight-light"> <?=$fetch['courtName']?> </h1>
                    <div class="d-flex justify-content-between">
                    	<p><i><?=$fetch['courtType']?></i></p>
                    	<p><i class="fa-solid fa-peso-sign me-2" style="color: #dc3545;"></i>P<?=$fetch['courtRates']?>.00/hr</p>
                    </div>
                    
                    <p><?=$fetch['courtDetails']?></p>
                    <div class="d-flex justify-content-between">
                    	<p class="card-text"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #dc3545;"></i><?=$fetch['courtLocation']?></p>
                    	<p><i class="fa-solid fa-envelope me-2" style="color: #dc3545;"></i> <?=$fetch['courtEmail']?> </p>
                        <p><i class="fa-solid fa-address-book me-2" style="color: #dc3545;"></i> <?=$fetch['courtContact']?> </p>
                    </div>
                    <div class="d-flex justify-content-end mb-5 mt-5">
                    	 <a class="btn btn-danger " href="courtAppointmentv2.php?courtId=<?=$courtId?>">BOOK AN APPOINTMENT</a>
                    </div>
                </div>

                <hr>

                <h2>Feedbacks</h2>

                <?php
                	$sql1 = "SELECT * FROM tbl_feedback tf join tbl_user tu on tf.userId = tu.userId where tf.courtId = '$courtId' ";
                	$query1 = mysqli_query($connect, $sql1);

                	while($row = $query1->fetch_assoc()){ ?>

                		<h4> <?=$row['username'] ?></h4>
                		<p> <i><?=$row['feedback'] ?></i> </p>

                	<?php }
                ?>
            </div>

<?php include "includes/footer.php" ?>