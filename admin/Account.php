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
                    
                    if(isset($_GET['WrongCurrent'])){

                        $WrongCurrent = $_GET['WrongCurrent'];

                        if($WrongCurrent == 1){
                            ?>
                                <div class="alert alert-danger" role="alert">
                                Wrong Confirmation or Current Password
                                </div>
                            <?php
                        }

                    }

                    if(isset($_GET['WrongConfirm'])){

                        $WrongConfirm = $_GET['WrongConfirm'];

                        if($WrongConfirm == 1){
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    Wrong Confirmation or Current Password
                                </div>
                            <?php
                        }

                    }

                    if(isset($_GET['PasswordSuccess'])){

                        $PasswordSuccess = $_GET['PasswordSuccess'];

                        if($PasswordSuccess == 1){
                            ?>
                                <div class="alert alert-success" role="alert">
                                   Password Succesfully Updated!
                                </div>
                            <?php
                        }

                    }
                    
                    ?>

                    <div class="row g-4 mb-4">

                            <?php 
                            
                            $sql = "SELECT * FROM tbl_user WHERE tbl_user.userId = '$userId'";
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
                                                        <div class="item-label"><strong>Username</strong></div>
                                                        <div class="item-data"><?php echo $row['username'] ?></div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Role</strong></div>
                                                        <div class="item-data"><?php echo $row['role'] ?></div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Verified</strong></div>
                                                        <div class="item-data">
                                                            
                                                        <?php if($row['isVerified'] == 1){
                                                            ?>
                                                            Verified Account
                                                            <?php

                                                        }else{
                                                            ?>
                                                            Not Verified Account
                                                            <?php
                                                        }

                                                        ?>
                                                        
                                                        </div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                            </div><!--//item-->
                                            <div class="item border-bottom py-3">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <div class="item-label"><strong>Date Registration</strong></div>
                                                        <div class="item-data"><?php echo $row['dateAdded'] ?></div>
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
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            </div>
            <form action="PHP/ChangePassword.php" method="POST">
            <div class="modal-body">

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Current Password</label>
                    <input name="currentPassword" type="text" class="form-control " placeholder="Current Password" required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">New Password</label>
                    <input name="NewPassword" type="text" class="form-control " placeholder="New Password" required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Confirm Password</label>
                    <input name="ConfirmPassword" type="text" class="form-control " placeholder="Confirm Password" required="required">
                </div>

                <input type="hidden" name="userId" value="<?php echo $userId ?>">
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="ChangePasswordBtn" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    
    <!-- MANAGE COURT MODAL -->


    <!-- JQUERY -->



    <?php include('includes/bootstrapCDN.php') ?>
    <?php include('includes/footer.php') ?>

