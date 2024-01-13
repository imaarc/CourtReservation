<?php 
	include "../actions/connect_db.php";

	$category = $_POST['category'];

	$select = "SELECT * FROM tbl_court WHERE isActive = 1 AND REPLACE(courtType, ' ', '') LIKE '%$category%';";
     $query = mysqli_query($connect, $select);

            while ( $row = $query->fetch_assoc()) { 
            		$name = $row['courtName'];
            		$courtType = $row['courtType'];
            		$courtLocation = $row['courtLocation'];
            		$courtDetails = $row['courtDetails'];
            		$courtEmail = $row['courtEmail'];
            		$courtContact = $row['courtContact'];
            		$courtId = $row['courtId'];
                    $courtRates = $row['courtRates'];

                
            		echo '
            		<div class="col-md-4 mb-5 ">
                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="card-title">'.$name.'</h2>
                                <div class="d-flex justify-content-between">
                                     <p class="card-text"><i>'.$courtType.'</i></p>
                                     <p class="card-text"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #dc3545;"></i></i>'.$courtLocation.'</p>
                                </div>
                                    
                                <p class="card-text">'.$courtDetails.'</p>
                                <p><i class="fa-solid fa-dollar-sign me-2" style="color: #dc3545;"> </i>P'.$courtRates.'.00/hr</p>
                                <p><i class="fa-solid fa-envelope me-2" style="color: #dc3545;"></i> '.$courtEmail.' </p>
                                 <p><i class="fa-solid fa-address-book me-2" style="color: #dc3545;"></i> '.$courtContact.' </p>
                                
                            </div>
                            <div class="card-footer"><a class="btn btn-danger btn-sm" href="courtDetails.php?id='.$courtId.'">More Info</a></div>
                        </div>
                        </div>
                        ';

                
           }  

 ?>