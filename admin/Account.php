<?php include('includes/header.php') ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">My Account</h1> 
				    </div>
			    </div><!--//row-->
			   
                <div class="tab-content" id="orders-table-tab-content">
                    

                    <?php 
                    
                    if(isset($_GET['SuccessUpdate'])){

                        $SuccessUpdate = $_GET['SuccessUpdate'];

                        if($SuccessUpdate == 1){
                            ?>
                                <div class="alert alert-success" role="alert">
                                    Updated Profile!
                                </div>
                            <?php
                        }

                    }
                    
                    ?>

                    <div class="row g-4 mb-4">

                            <?php 
                            
                            $sql = "SELECT * FROM tbl_user INNER JOIN tbl_user_details ON tbl_user.userId = tbl_user_details.userId WHERE tbl_user.userId = '$userId'";
                            $result = $connect->query($sql);

                            if(!empty($result)){
                                foreach($result as $row){
                                    ?>

                                        <div class="col-auto">
                                                </div><!--//col-->
                                            </div><!--//row-->
                                        </div><!--//app-card-header-->
                                        <div class="app-card-body px-4 w-100">
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Name</strong></div>
                                                        <div class="item-data"><?php echo $row['fullName'] ?></div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Address</strong></div>
                                                        <div class="item-data"><?php echo $row['address'] ?></div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Contact Number</strong></div>
                                                        <div class="item-data"><?php echo $row['contactNumber'] ?></div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Email</strong></div>
                                                        <div class="item-data"><?php echo $row['emailAddress'] ?></div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                        </div><!--//app-card-body-->
                                        <div class="app-card-footer p-4 mt-auto">
                                        <button class="ManageBtn btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#ManageCourtModal" value="<?php echo $row['userId'] ?>">Manage Profile</button>
                                        </div><!--//app-card-footer-->

                                    <?php
                                }
                            }
                            
                            ?>
                    </div><!--//row-->
                </div>
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->    
    
    
    <!-- MODALS  -->

    <!-- MANAGE COURT MODAL -->

        <div>
        <div class="modal fade" id="ManageCourtModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
            </div>
            <form action="PHP/UpdateProfile.php" method="POST">
            <div class="modal-body">

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Full Name</label>
                    <input id="FullName" name="fullName" type="text" class="form-control signup-name" placeholder="Venue name" required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Address</label>
                    <input id="address" name="address" type="text" class="form-control signup-name" placeholder="Location" required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Contact No.</label>
                    <input id="contactNumber" name="contactNumber" type="number" class="form-control signup-name" placeholder="Contact No." required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Email Address</label>
                    <input id="emailAddress" name="emailAddress" type="email" class="form-control signup-name" placeholder="Email Address" required="required">
                </div>

                <input type="hidden" name="userId" id="userIDManageProfile">
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="UpdateButtonProfile" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    
    <!-- MANAGE COURT MODAL -->


    <!-- JQUERY -->

    <!-- MANAGE BUTTON JQUERY -->
    <script>

    $(document).on('click', '.ManageBtn', function(){

        var userId = $(this).val();

        $.ajax({

            type: "GET",
            url: "PHP/GetProfileDetails.php?userID=" + userId,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 422) {

                    alert(res.message);
                }else if(res.status == 200){

                    $('#userIDManageProfile').val(res.data.userId);
                    $('#FullName').val(res.data.fullName);
                    $('#address').val(res.data.address);
                    $('#contactNumber').val(res.data.contactNumber);
                    $('#emailAddress').val(res.data.emailAddress);
                    $('#ManageCourtModal').modal('show');
                        
                }
            }

        });

    });

    </script>

    <?php include('includes/bootstrapCDN.php') ?>
    <?php include('includes/footer.php') ?>

