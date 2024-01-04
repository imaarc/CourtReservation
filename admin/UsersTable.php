<?php include('includes/AdminHeader.php') ?>
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Users Table</h1> 
				    </div>
			    </div><!--//row-->
			   
                <div class="tab-content" id="orders-table-tab-content">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fullname</th>
                                <th>Complete Address</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM tbl_user INNER JOIN tbl_user_details ON tbl_user.userId = tbl_user_details.userId WHERE tbl_user.role = 'user'";
                                $result = $connect->query($sql);

                                if(!empty($result)){
                                    foreach($result as $row){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['fullName'] ?></td>
                                            <td><?php echo $row['address'] ?></td>
                                            <td><?php echo $row['contactNumber'] ?></td>
                                            <td><?php echo $row['emailAddress'] ?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                
                                ?>
                        </tbody>
                    </table>
                </div>
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->    
    
    
    <!-- MODALS  -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <script> 

    $('#example').DataTable({

        responsive:true

    })

    </script> 



    <?php include('includes/bootstrapCDN.php') ?>
    <?php include('includes/footer.php') ?>

