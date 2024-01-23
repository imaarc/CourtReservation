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

    
    <div class="container d-flex align-items-center justify-content-center my-3" style="height: 100vh;">
        <div class="card col-md-8 col-lg-6 col-sm-11 p-4">
            <div class="card-body">
               <div class="app-auth-body mx-auto">  
                    <div class="app-auth-branding mb-4">
                
                    <div class="auth-form-container text-start mx-auto">
                        
                            <form class="auth-form auth-signup-form" action="actions/customerRegistrationAction.php" method="POST">     
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

                            <h2 class="auth-heading text-center mb-2">Customer Details</h2>
                            <hr>

                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Fullname</label>
                                <input id="signup-name" name="fullname" type="text" class="form-control signup-name" placeholder="Fullname" required="required">
                            </div>

                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Address</label>
                                <input id="signup-name" name="address" type="text" class="form-control signup-name" placeholder="Address" required="required">
                            </div>

                            <div class="email mb-3">
                                <label class="sr-only" for="signup-email">Contact Number</label>
                                <input id="signup-name" name="contactNo" type="number" class="form-control signup-name" placeholder="Contact Number" required="required">
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

