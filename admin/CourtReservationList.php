<?php include('includes/header.php') ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Court Pending Reservations</h1> 
				    </div>
			    </div><!--//row-->
			   
                <div class="tab-content" id="orders-table-tab-content">
                    
                    <?php 
                    
                    if(isset($_GET['confirmed'])){
                        $confirmed = $_GET['confirmed'];

                        if($confirmed == 1){
                            ?>
                                <div class="alert alert-success" role="alert">
                                    Court Successfully Approved!
                                </div>
                            <?php
                        }

                    }

                    if(isset($_GET['declined'])){
                        $declined = $_GET['declined'];

                        if($declined == 1){
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    Court Declined!
                                </div>
                            <?php
                        }

                    }
                    
                    ?>

                    <div class="row g-4 mb-4">

                        <?php 
                        
                        $sql = "SELECT * FROM tbl_court INNER JOIN tbl_court_reservation ON tbl_court.courtId = tbl_court_reservation.courtId INNER JOIN tbl_user_details ON tbl_court_reservation.userId = tbl_user_details.userId WHERE tbl_court.userId = '$userId'";
                        $result = $connect->query($sql);

                        if(!empty($result)){
                            foreach($result as $row){
                                if($row['status'] != 'Declined'){
                                    ?>
                                        <div class="col-12 col-lg-4">
                                            <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                                                <div class="app-card-header p-3 border-bottom-0">
                                                    <div class="row align-items-center gx-3">
                                                        <div class="col-auto">
                                                            <div class="app-icon-holder">
                                                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-receipt" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd" d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z"/>
                                                                <path fill-rule="evenodd" d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z"/>
                                                                </svg>
                                                            </div><!--//icon-holder-->
                                                            
                                                        </div><!--//col-->
                                                        <div class="col-auto">
                                                            <h4 class="app-card-title"><?php echo $row['courtName'] ?></h4>
                                                        </div><!--//col-->
                                                    </div><!--//row-->
                                                </div><!--//app-card-header-->
                                                <div class="app-card-body px-4">
                                                    
                                                <div class="intro"><?php echo $row['courtDetails'] ?>, Location: <?php echo $row['courtLocation'] ?></div>
                                                </div><!--//app-card-body-->
                                                <div class="app-card-footer p-4 mt-auto">
                                                <div class="intro">Renter's Name: <?php echo $row['fullName'] ?></div>
                                                <div class="intro mt-2">Renter's Contact: <?php echo $row['contactNumber'] ?></div>
                                                <div class="intro mt-2">Renter's Email: <?php echo $row['emailAddress'] ?></div>
                                                <hr>
                                                <?php 
                                                
                                                if($row['status'] == 'Confirmed'){
                                                    ?>
                                                        <div class="intro"><span style="color: green;">Rented Ongoing</span></div>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <button class="ConfirmedBtn btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#ConfirmedModal" UserID ="<?php echo $row['userId'] ?>" value="<?php echo $row['courtReservationId'] ?>">Confirm Reservation</button>
                                                        <button class="DeclinedBtn btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#DeclinedModal" UserID ="<?php echo $row['userId'] ?>" value="<?php echo $row['courtReservationId'] ?>">Declined Reservation</button>
                                                    <?php
                                                }
                                                
                                                ?>
                                                </div><!--//app-card-footer-->
                                            </div><!--//app-card--> 
                                        </div><!--//col-->
                                    <?php
                                }
                            }
                        }

                        ?>
                    </div><!--//row-->
                </div>
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->    
    
    
    <!-- MODALS  -->

    <div>
        <div class="modal fade" id="ConfirmedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Are you sure you want to confirm this Pending Reservation?</h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <form action="PHP/ConfirmedReservation.php" method="POST">
                <input type="hidden" class="CourtReservationID" name="courtReservationId">
                <input type="hidden" class="UserID" name="customerId">
                <input type="hidden" value="<?php echo $userId ?>" name="userId">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="ConfirmedReservationBtn" class="btn btn-primary">Yes</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div>
        <div class="modal fade" id="DeclinedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Are you sure you want to declined this Pending Reservation?</h5>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <form action="PHP/DeclinedReservation.php" method="POST">
                <input type="hidden" class="CourtReservationID" name="courtReservationId">
                <input type="hidden" class="UserID" name="customerId">
                <input type="hidden" value="<?php echo $userId ?>" name="userId">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="DeclinedReservationBtn" class="btn btn-primary">Yes</button>
                </form>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- MODALS -->

    <script>
        $(document).ready(function () {

            $(document).on('click', '.ConfirmedBtn', function(){
                
                var courtReservationId = $(this).val();
                var CustomerID = $(this).attr('UserID');
                $('.CourtReservationID').val(courtReservationId);
                $('.UserID').val(CustomerID);

            });
        });
    </script>

    <script>    
        $(document).ready(function () {

            $(document).on('click', '.DeclinedBtn', function(){
                
                var courtReservationId = $(this).val();
                var CustomerID = $(this).attr('UserID');
                $('.CourtReservationID').val(courtReservationId);
                $('.UserID').val(CustomerID);

            });
        });
    </script>


    <?php include('includes/bootstrapCDN.php') ?>
    <?php include('includes/footer.php') ?>

