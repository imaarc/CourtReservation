<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>CourtSync</title>
    <link rel="icon" href="images/balls.png" type="image/x-icon">
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">
    <link id="theme-style" rel="stylesheet" href="assets/css/number.css">

</head> 



<body class="app app-login p-0" style="background: url('images/bg.jpeg')!important;background-size: cover !important">     

    
    <div class=" d-flex align-items-center justify-content-center my-3" style="height: 100vh;">
        <div class="card col-md-8 col-lg-3 col-sm-11 p-4">
            <div class="card-body">

                <div class="app-auth-body mx-auto"> 
                
                    <div class="auth-form-container text-start mx-auto">
                        
                            <form class="auth-form auth-signup-form" action="actions/venueRegistrationAction.php" method="POST" enctype="multipart/form-data">     
                            <h2 class="auth-heading text-center mb-2">Login Credentials</h2>
                            <hr>    
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Username</label>
                                <input id="signup-name" name="username" type="text" class="form-control signup-name" placeholder="Username" required="required">
                            </div>
                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Password</label>
                                <input id="signup-email" name="password" type="password" class="form-control signup-email" placeholder="Password" required="required">
                            </div>

                            <div class="mb-3">
                              <label for="formFile" class="form-label" >Profile Picture</label>
                              <input class="form-control" type="file" id="formFile" name="image[]">
                            </div>

                            <h2 class="auth-heading text-center mb-2">Venue Details</h2>
                            <hr>

                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Venue name</label>
                                <input id="signup-name" name="name" type="text" class="form-control signup-name" placeholder="Venue name" required="required">
                            </div>

                            <div class=" form-floating">
                                <textarea name="description" id="description" type="text" class="form-control" placeholder="Description"></textarea>
                                <label  for="description">Description</label>
                            </div>

                            <!-- <div class="form-floating mb-3">
                              <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="type">
                                <option value="Basketball">Basketball</option>
                                <option value="Tennis">Tennis</option>
                                <option value="Volleyball">Volleyball</option>
                                <option value="Badminton">Badminton</option>
                                <option value="Soccer">Soccer</option>
                                <option value="Golf">Golf</option>
                              </select>
                              <label for="floatingSelect">Type</label>
                            </div> -->
                            <label>Type</label><br>
                            <label>
                                <input type="checkbox" class="form-check-input" name="type[]" value="Basketball">
                                Basketball
                            </label><br>
                            <label>
                                <input type="checkbox" class="form-check-input" name="type[]" value="Tennis">
                                Tennis
                            </label><br>
                            <label>
                                <input type="checkbox" class="form-check-input" name="type[]" value="Volleyball">
                                Volleyball
                            </label><br>
                            <label>
                                <input type="checkbox" class="form-check-input" name="type[]" value="Badminton">
                                Badminton
                            </label><br>
                            <label>
                                <input type="checkbox" class="form-check-input" name="type[]" value="Soccer">
                                Soccer
                            </label><br>
                            <br>
                            

                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Location</label>
                                <input id="signup-name" name="location" type="text" class="form-control signup-name" placeholder="Location" required="required">
                            </div>

                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Contact No.</label>
                                <input id="signup-name" name="contactNo" type="number"  class="form-control signup-name " placeholder="Contact No." required="required" >
                            </div>

                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Email Address</label>
                                <input id="signup-name" name="emailAd" type="email" class="form-control signup-name" placeholder="Email Address" required="required">
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Sign Up</button>
                            </div>
                        </form><!--//auth-form-->
                            
                        
                        <div class="auth-option text-center pt-5"> Already have an account? <a class="text-link" href="index.php" >Log in</a></div>
                    </div><!--//auth-form-container-->  
                    
                    
                    
                </div><!--//auth-body-->
                
            </div>
        </div>
    </div>
 
   


</body>
</html> 

