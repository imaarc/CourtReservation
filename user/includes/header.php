<?php include '../actions/connect_db.php';
      include '../actions/session.php';
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="../images/balls.png" type="image/x-icon">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Court Reservation</title>
        <!-- Favicon-->
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link href="../assets/css/number.css" rel="stylesheet" />
    </head>
    <body>

         <style type="text/css">
        #activeNav a{
            color: white!important;

        }
    </style>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Court Reservation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item" <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') {echo 'id="activeNav"';}?> ><a class="nav-link" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item" <?php if(basename($_SERVER['PHP_SELF']) == 'courts.php') {echo 'id="activeNav"';}?>><a class="nav-link" href="courts.php">Courts</a></li>
                        <li class="nav-item" <?php if(basename($_SERVER['PHP_SELF']) == 'appointments.php') {echo 'id="activeNav"';}?>><a class="nav-link" href="appointments.php">Appointments</a></li>
                        <li class="nav-item ms-5"  ><a class="nav-link active" href="#!"><img src="../images/userLogo.png" width="25px"> <?=$user?></a></li>
                        <li class="nav-item " ><a class="nav-link " href="../actions/logout.php?logout">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">