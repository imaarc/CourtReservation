<?php include 'includes/header.php' ?>


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
                    <a class="btn btn-danger" href="#selectCategory">Find Courts</a>
                </div>
            </div>

            <!-- Call to Action-->
            <div class="card text-white bg-danger my-5 py-4 text-center">
                <div class="card-body"><p class="text-white m-0">Your Premier Destination for Effortless Sports Court Reservations!</p></div>
            </div>

            <div class="form-floating w-25 mb-3" id="selectCategory">
              <select class="form-select" id="venueCategory" aria-label="Floating label select example">
               
                <option selected value="Basketball">Basketball</option>
                <option value="Tennis">Tennis</option>
                <option value="Volleyball">Volleyball</option>
                <option value="Badminton">Badminton</option>
                <option value="Soccer">Soccer</option>
                <option value="Golf">Golf</option>
              </select>
              <label for="floatingSelect">Category</label>
            </div>

        <div class="row gx-4 gx-lg-5 courtList">

            <?php 
            $select = "SELECT * FROM tbl_court where isActive = 1";
            $query = mysqli_query($connect, $select);

            while ( $row = $query->fetch_assoc()){ ?> 

                 <div class="col-md-4 mb-5 ">

                        <div class="card h-100">
                            <div class="card-body">
                                <h2 class="card-title"><?=$row['courtName']?></h2>
                                <div class="d-flex justify-content-between">
                                     <p class="card-text"><i><?=$row['courtType']?></i></p>
                                     <p class="card-text"><i class="fa-sharp fa-solid fa-location-dot me-2" style="color: #dc3545;"></i><?=$row['courtLocation']?></p>
                                </div>
                                    
                                <p class="card-text"><?=$row['courtDetails']?></p>
                                <p><i class="fa-solid fa-dollar-sign me-2" style="color: #dc3545;"> </i>P<?=$row['courtRates']?>.00/hr</p>
                                <p><i class="fa-solid fa-envelope me-2" style="color: #dc3545;"></i> <?=$row['courtEmail']?> </p>
                                <p><i class="fa-solid fa-address-book me-2" style="color: #dc3545;"></i> <?=$row['courtContact']?> </p>
                                
                            </div>
                            <div class="card-footer"><a class="btn btn-danger btn-sm" href="courtDetails.php?id=<?=$row['courtId']?>">More Info</a></div>
                        </div>

                 </div>

            <?php } ?>

        </div>

        <?php include 'includes/footer.php' ?>

        <script>
              $(document).ready(function() {


                $("#venueCategory").on("change", function() {
                  var category = $(this).val();

                  $.ajax({
                    url:'filterCategory.php',
                    type:'POST',
                    data:{
                        category:category,
                    },
                    success:function(response){
                      //alert(response);
                        $('.courtList').html(response);
                            
                        }
                    });
                });
            });

        </script>
        
