<?php include "includes/header.php" ?>

<div class="row gx-4 gx-lg-5 courtList">

	<h1 class="my-5 mx-auto">Court List</h1>

            <?php 
            $select = "SELECT * FROM tbl_court where isActive = 1";
            $query = mysqli_query($connect, $select);

            while ( $row = $query->fetch_assoc()){ ?> 

                 <div class="col-md-12 mb-5 ">



                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="card-title"><?=$row['courtName']?></h2>
                                <div class="d-flex justify-content-between">
                                     <p class="card-text"><i><?=$row['courtType']?></i></p>
                                     <p class="card-text"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #dc3545;"></i><?=$row['courtLocation']?></p>
                                </div>
                                    
                                <p class="card-text"><?=$row['courtDetails']?></p>
                                <p><i class="fa-solid fa-peso-sign me-2" style="color: #dc3545;"></i>P<?=$row['courtRates']?>.00/hr</p>
                                <p><i class="fa-solid fa-envelope me-2" style="color: #dc3545;"></i> <?=$row['courtEmail']?> </p>
                                <p><i class="fa-solid fa-address-book me-2" style="color: #dc3545;"></i> <?=$row['courtContact']?> </p>
                                
                            </div>
                            <div class="card-footer"><a class="btn btn-danger btn-sm" href="courtDetails.php?id=<?=$row['courtId']?>">More Info</a></div>
                        </div>

                 </div>

            <?php } ?>

        </div>

<?php include "includes/footer.php" ?>