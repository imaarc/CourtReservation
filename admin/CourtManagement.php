<?php include('includes/header.php') ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Court Management</h1> 
                        <button type="button" class="btn btn-sm btn-success mt-3" data-toggle="modal" data-target="#AddCourtModal">Add Court</button>
				    </div>
			    </div><!--//row-->
                
                <?php 
                
                if(isset($_GET['success'])){
                    $success = $_GET['success'];

                    if($success == 1){
                        ?>
                            <div class="alert alert-success" role="alert">
                            Additional Court Successfully Added!
                            </div>
                        <?php
                    }
                }

                if(isset($_GET['updatesuccess'])){
                    $updatesuccess = $_GET['updatesuccess'];

                    if($updatesuccess == 1){
                        ?>
                            <div class="alert alert-primary" role="alert">
                            Court Details Updated Successfully!
                            </div>
                        <?php
                    }
                }

                ?>
			   
                <div class="tab-content" id="orders-table-tab-content">

                    <div class="row g-4 mb-4">

                        <?php 
                        
                        $sql = "SELECT * FROM tbl_court WHERE isActive = 1 AND userId = '$userId'";
                        $result = $connect->query($sql);

                        if(!empty($result)){
                            foreach($result as $row){
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
                                            <button class="ManageBtn btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#ManageCourtModal" value="<?php echo $row['courtId'] ?>">Manage Court</button>
                                            <button class="UploadPicsBtn btn app-btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadPicsModal" value="<?php echo $row['courtId'] ?>">Upload Pics</button>
                                            <button class="ViewDetailsBtn btn app-btn-secondary" data-bs-toggle="modal" data-bs-target=".ViewDetailsModal" value="<?php echo $row['courtId'] ?>">View Details</button>
                                            </div><!--//app-card-footer-->
                                        </div><!--//app-card-->
                                    </div><!--//col-->
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

    <!-- ADD COURT MODAL -->
    <div>
        <div class="modal fade" id="AddCourtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Additional Court</h5>
            </div>
            <form action="PHP/AdditionalCourtAction.php" method="POST">

                <div class="modal-body">

                    <div class="email mb-3">
                        <label class="sr-only" for="signup-email">Venue name</label>
                        <input id="signup-name" name="courtName" type="text" class="form-control signup-name" placeholder="Venue name" required="required">
                    </div>

                    <div class="email mb-3 form-floating">
                        <textarea name="courtDetails" id="description" type="text" class="form-control" placeholder="Description"></textarea>
                        <label class="sr-only" for="description">Description</label>
                    </div>

                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="courtType">
                        <option value="Basketball">Basketball</option>
                        <option value="Tennis">Tennis</option>
                        <option value="Volleyball">Volleyball</option>
                        <option value="Badminton">Badminton</option>
                        <option value="Soccer">Soccer</option>
                        <option value="Golf">Golf</option>
                        </select>
                        <label for="floatingSelect">Type</label>
                    </div>

                    <div class="email mb-3">
                        <label class="sr-only" for="signup-email">Location</label>
                        <input id="signup-name" name="courtLocation" type="text" class="form-control signup-name" placeholder="Location" required="required">
                    </div>

                    <div class="email mb-3">
                        <label class="sr-only" for="signup-email">Contact No.</label>
                        <input id="signup-name" name="courtContact" type="number" class="form-control signup-name" placeholder="Contact No." required="required">
                    </div>

                    <div class="email mb-3">
                        <label class="sr-only" for="signup-email">Email Address</label>
                        <input id="signup-name" name="courtEmail" type="email" class="form-control signup-name" placeholder="Email Address" required="required">
                    </div>

                    <input type="hidden" name="userId" value="<?php echo $userId ?>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="SubmitAdditionalCourt" class="btn btn-primary">Submit Data</button>
                </div>

            </form>
            </div>
        </div>
        </div>
    </div>
    <!-- ADD COURT MODAL -->   
    
    <!-- MANAGE COURT MODAL -->

    <div>
        <div class="modal fade" id="ManageCourtModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Court Details</h5>
            </div>
            <form action="PHP/UpdateCourtDetails.php" method="POST">
            <div class="modal-body">

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Venue name</label>
                    <input id="courtNameQuery" name="courtName" type="text" class="form-control signup-name" placeholder="Venue name" required="required">
                </div>

                <div class="email mb-3 form-floating">
                    <textarea name="courtDetails" id="courtDetailsQuery" type="text" class="form-control" placeholder="Description"></textarea>
                    <label class="sr-only" for="description">Description</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="courtTypeQuery" aria-label="Floating label select example" name="courtType">
                    <option value="Basketball">Basketball</option>
                    <option value="Tennis">Tennis</option>
                    <option value="Volleyball">Volleyball</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Soccer">Soccer</option>
                    <option value="Golf">Golf</option>
                    </select>
                    <label for="floatingSelect">Type</label>
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Location</label>
                    <input id="courtLocationQuery" name="courtLocation" type="text" class="form-control signup-name" placeholder="Location" required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Contact No.</label>
                    <input id="courtContactQuery" name="courtContact" type="number" class="form-control signup-name" placeholder="Contact No." required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Email Address</label>
                    <input id="courtEmailQuery" name="courtEmail" type="email" class="form-control signup-name" placeholder="Email Address" required="required">
                </div>

                <input type="hidden" name="courtId" id="CourtIDManageEdit">
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="UpdateButtonCourtDetails" class="btn btn-primary">Save changes</button>
                </div>
            </form>
            </div>
        </div>
        </div> 
    </div>
    
    <!-- MANAGE COURT MODAL -->

    <!-- UPLOAD PICS MODAL -->

    <div>
        <div class="modal fade" id="uploadPicsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Pictures</h5>
            </div>
            <form action="PHP/UploadCourtPictures.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Upload Pictures</label>
                    <input type="file" name="images[]" multiple accept="image/*">
                    <input type="hidden" name="userId" value="<?php echo $userId ?>">
                    <input type="hidden" name="courtId" id="courtIDPics">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="" class="btn btn-primary">Upload Picture</button>
            </div>
            </div>
            </form>
        </div>
        </div>
    </div>

    <!-- UPLOAD PICS MODAL -->

    <!-- VIEW DETAILS MODAL -->

    <div>
        <div class="modal fade ViewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Court Details</h5>
            </div>
            <div class="modal-body">

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Venue name</label>
                    <input id="courtNameQueryDetails" name="courtName" type="text" class="form-control signup-name" placeholder="Venue name" required="required">
                </div>

                <div class="email mb-3 form-floating">
                    <textarea name="courtDetails" id="courtDetailsQueryDetails" type="text" class="form-control" placeholder="Description"></textarea>
                    <label class="sr-only" for="description">Description</label>
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="courtTypeQueryDetails" aria-label="Floating label select example" name="courtType">
                    <option value="Basketball">Basketball</option>
                    <option value="Tennis">Tennis</option>
                    <option value="Volleyball">Volleyball</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Soccer">Soccer</option>
                    <option value="Golf">Golf</option>
                    </select>
                    <label for="floatingSelect">Type</label>
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Location</label>
                    <input id="courtLocationQueryDetails" name="courtLocation" type="text" class="form-control signup-name" placeholder="Location" required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Contact No.</label>
                    <input id="courtContactQueryDetails" name="courtContact" type="number" class="form-control signup-name" placeholder="Contact No." required="required">
                </div>

                <div class="email mb-3">
                    <label class="sr-only" for="signup-email">Email Address</label>
                    <input id="courtEmailQueryDetails" name="courtEmail" type="email" class="form-control signup-name" placeholder="Email Address" required="required">
                </div>

                <hr>
                <h6>Uploaded Pictures</h6>
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Images will be loaded dynamically here -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- VIEW DETAILS MODAL -->

    <!-- JQUERY -->

    <script>
        $(document).ready(function(){

            $(document).on('click','.UploadPicsBtn',function(){

                var courtID = $(this).val();
                $('#courtIDPics').val(courtID);

            });

        });
    </script>

    <script>

        $(document).on('click', '.ManageBtn', function(){

            var courtID = $(this).val();

            $.ajax({

                type: "GET",
                url: "PHP/GetCourtDetails.php?courtID=" + courtID,
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 422) {

                        alert(res.message);
                    }else if(res.status == 200){

                        $('#CourtIDManageEdit').val(res.data.courtId);
                        $('#courtNameQuery').val(res.data.courtName);
                        $('#courtDetailsQuery').val(res.data.courtDetails);
                        $('#courtTypeQuery').val(res.data.courtType);
                        $('#courtLocationQuery').val(res.data.courtLocation);
                        $('#courtContactQuery').val(res.data.courtContact);
                        $('#courtEmailQuery').val(res.data.courtEmail);
                        $('#ManageCourtModal').modal('show');
                            
                    }
                }

            });

        });

    </script>

    <script>

    $(document).on('click', '.ViewDetailsBtn', function(){

        var courtID = $(this).val();

        $.ajax({

            type: "GET",
            url: "PHP/GetCourtDetails.php?courtID=" + courtID,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 422) {

                    alert(res.message);
                }else if(res.status == 200){

                    $('#CourtIDManageEdit').val(res.data.courtId);
                    $('#courtNameQueryDetails').val(res.data.courtName);
                    $('#courtDetailsQueryDetails').val(res.data.courtDetails);
                    $('#courtTypeQueryDetails').val(res.data.courtType);
                    $('#courtLocationQueryDetails').val(res.data.courtLocation);
                    $('#courtContactQueryDetails').val(res.data.courtContact);
                    $('#courtEmailQueryDetails').val(res.data.courtEmail);
                    $('.ViewDetailsModal').modal('show');
                        
                }
            }

        });

        $.ajax({
            
            url: 'PHP/GetImages.php?courtID=' + courtID,
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Populate the carousel with images
                var carouselInner = $('#imageCarousel .carousel-inner').empty();
                $.each(data, function (index, filename) {
                    var activeClass = index === 0 ? 'active' : '';
                    var imgTag = '<div class="carousel-item ' + activeClass + '"><img src="uploaded_pics/' + filename + '" class="d-block w-100" style="height:400px;text-align:center;" alt="Image"></div>';
                    carouselInner.append(imgTag);
                });

                // Activate the carousel
                $('#imageCarousel').carousel();
            },
            error: function (xhr, status, error) {
                console.error('Error fetching images:', error);
            }

        });

    });

    </script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.ViewDetailsBtn', function(){
                
                var courtId = $(this).val();

            // Fetch images with AJAX

            });
        });
    </script>

    <?php include('includes/bootstrapCDN.php') ?>
    <?php include('includes/footer.php') ?>

