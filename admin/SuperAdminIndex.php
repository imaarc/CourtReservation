<?php include "includes/AdminHeader.php" ?> 
  
<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Overview</h1>
			        
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Users</h4>

  								<?php 
								
								$sqlMonthlySales = "SELECT
								COUNT(userId) as Users FROM tbl_user WHERE role = 'user' ";
								$result = $connect->query($sqlMonthlySales);

								if(!empty($result)){
									foreach($result as $row){
										?>
											<div class="stats-figure"><?php echo $row['Users'] ?></div>
										<?php
									}
								}
								
								?>

						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-6">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Courts</h4>

								<?php 
								
								$sqlMonthlySales = "SELECT
								COUNT(courtId) as Courts FROM tbl_court";
								$result = $connect->query($sqlMonthlySales);

								if(!empty($result)){
									foreach($result as $row){
										?>
											<div class="stats-figure"><?php echo $row['Courts'] ?></div>
										<?php
									}
								}
								
								?>

						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->

                <?php 
				
				$SqlUsers = "SELECT
                COUNT(userId) as Users FROM tbl_user WHERE role = 'user' ";
			
				$result = $connect->query($SqlUsers);

                $SqlVenues = "SELECT
                COUNT(userId) as Venues FROM tbl_user WHERE role = 'venue' ";
			
				$resultVenues = $connect->query($SqlVenues);

				foreach($result as $data){

					$users[] = $data['Users'];
				}

                foreach($resultVenues as $data){

					$venues[] = $data['Venues'];
				}


				
				
				?>



				<div class="row g-4 mb-4">
					<div class="col-lg-12">
						<div class="row">
							<div>
							<canvas id="myChart"></canvas>
							</div>
						</div>
					</div>
				</div>
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	
	    
    </div><!--//app-wrapper-->    		
	
	<script>

	const labels = ['Users','Venue Partners'];
	const data = {
	labels: labels,
	datasets: [{
		label: 'Monthly Sales',
		data: [<?php echo json_encode($users) ?>, <?php echo json_encode($venues) ?>],
		backgroundColor: [
		'rgba(255, 99, 132, 0.2)',
		'rgba(153, 102, 255, 0.2)',
		'rgba(255, 205, 86, 0.2)',
		'rgba(75, 192, 192, 0.2)',
		'rgba(54, 162, 235, 0.2)',
		'rgba(153, 102, 255, 0.2)',
		'rgba(201, 203, 207, 0.2)'
		],
		borderColor: [
		'rgb(255, 99, 132)',
		'rgb(255, 159, 64)',
		'rgb(255, 205, 86)',
		'rgb(75, 192, 192)',
		'rgb(54, 162, 235)',
		'rgb(153, 102, 255)',
		'rgb(201, 203, 207)'
		],
		borderWidth: 1
	}]
	};

	const config = {
	type: 'bar',
	data: data,
	options: {
		scales: {
		y: {
			beginAtZero: true
		}
		}
	},
	};


	var myChart = new Chart(
	document.getElementById('myChart'),
	config
	);
	</script>				


<?php include "includes/footer.php" ?>

