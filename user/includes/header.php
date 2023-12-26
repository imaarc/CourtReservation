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
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
            <div class="container px-5">
                <a class="navbar-brand" href="#!">Court Reservation</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Courts</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Appointments</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container px-4 px-lg-5">
            <!-- Heading Row-->
            <div class="row gx-4 gx-lg-5 align-items-center my-5">

                <div id="carouselExampleInterval" class="carousel slide col-lg-7" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="10000">
                      <img src="images/basketball.jpeg" class="d-block w-100" alt="..." height="300">
                    </div>
                    <div class="carousel-item" data-bs-interval="2000">
                      <img src="images/volleyball.jpeg" class="d-block w-100" alt="..." height="300">
                    </div>
                    <div class="carousel-item">
                      <img src="images/badminton.jpeg" class="d-block w-100" alt="..." height="300">
                    </div>
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

                <div class="col-lg-5">
                    <h1 class="font-weight-light"> Welcome to CourtSync </h1>
                    <p>At CourtSync, we understand that victory starts with the perfect court. Whether you're a seasoned athlete or just looking to break a sweat with friends, we've crafted a seamless reservation platform to elevate your game. Dive into a world where booking your victory is as easy as 1-2-3.</p>
                    <a class="btn btn-danger" href="#!">Find Courts</a>
                </div>
            </div>

            <!-- Call to Action-->
            <div class="card text-white bg-danger my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">Your Premier Destination for Effortless Sports Court Reservations!</p></div>
            </div>