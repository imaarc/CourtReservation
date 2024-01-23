<?php include('includes/header.php') ?>

<?php 
    if(isset($_GET['courtId'])){
        $courtId = $_GET['courtId'];
    }
    
    // Check if "View All" button is clicked
    $limitClause = isset($_GET['viewAll']) ? '' : 'LIMIT 5';
?>

<div class="app-wrapper">
    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">
            <div class="row g-3 mb-4 align-items-center justify-content-between">
                <div class="col-auto">
                    <h1 class="app-page-title mb-0">Feedbacks</h1> <hr>
                    <!-- Add a link to view all feedbacks without the limit -->
                    <a href="?courtId=<?php echo $courtId; ?>&viewAll=1" class="btn btn-primary btn-sm text-white">View All</a>
                </div>
            </div><!--//row-->

            <div class="tab-content" id="orders-table-tab-content">
                <div class="row g-4 mb-4 ">
                    <?php 
                    
                    $sql = "SELECT * FROM tbl_feedback INNER JOIN tbl_user_details on tbl_feedback.userId = tbl_user_details.userId WHERE tbl_feedback.courtId = '$courtId' $limitClause";
                    $result = $connect->query($sql);

                    if(!empty($result)){
                        foreach($result as $row){
                            ?>
                                <div class="col-md-5 m-5 card my-5 p-3">
                                    <p class="m-0 p-0">Fullname: <strong><span><?php echo $row['fullName'] ?></span></strong>   </p>
                                    <p class="m-0 p-0">Address: <strong> <?php echo $row['address'] ?></strong> </p>
                                    <p class="m-0 p-0">Contact Number: <strong><?php echo $row['contactNumber'] ?></strong>  </p>
                                    <p class="m-0 p-0">Email Address: <strong><?php echo $row['emailAddress'] ?></strong>  </p>

                                    <div class="my-3">
                                        <strong><p>Feedback</p></strong>
                                        <div class="">
                                            <textarea class="form-control" disabled   style="height: 200px;">
                                            <?php echo $row['feedback'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div><!--//container-fluid-->
    </div><!--//app-content-->
</div><!--//app-wrapper-->    

<?php include('includes/bootstrapCDN.php') ?>
<?php include('includes/footer.php') ?>
