  <?php include "includes/header.php" ?> 

  
  
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Overview</h1>
			        
			    <div class="row g-4 mb-4">
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Total Sales For This Month</h4>

  								<?php 
								
								$sqlMonthlySales = "SELECT SUM(payment) as SumPayments FROM tbl_court_reservation INNER JOIN tbl_court on tbl_court.courtId = tbl_court_reservation.courtId WHERE tbl_court.userId = '$userId' AND MONTH(tbl_court_reservation.dateAdded) = MONTH(NOW())";
								$result = $connect->query($sqlMonthlySales);

								if(!empty($result)){
									foreach($result as $row){
										?>
											<div class="stats-figure"><?php echo $row['SumPayments'] ?></div>
										<?php
									}
								}
								
								?>

						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Courts Reserved This Month</h4>

								<?php 
								
								$sqlMonthlySales = "SELECT COUNT(courtReservationId) as TotalReserved FROM tbl_court_reservation INNER JOIN tbl_court on tbl_court.courtId = tbl_court_reservation.courtId WHERE tbl_court.userId = '$userId' AND MONTH(tbl_court_reservation.dateAdded) = MONTH(NOW())";
								$result = $connect->query($sqlMonthlySales);

								if(!empty($result)){
									foreach($result as $row){
										?>
											<div class="stats-figure"><?php echo $row['TotalReserved'] ?></div>
										<?php
									}
								}
								
								?>

						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
				    <div class="col-6 col-lg-4">
					    <div class="app-card app-card-stat shadow-sm h-100">
						    <div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">Courts</h4>

								<?php 
								
								$sqlMonthlySales = "SELECT COUNT(courtId) as TotalCourt FROM tbl_court WHERE isActive = 1";
								$result = $connect->query($sqlMonthlySales);

								if(!empty($result)){
									foreach($result as $row){
										?>
											<div class="stats-figure"><?php echo $row['TotalCourt'] ?></div>
										<?php
									}
								}
								
								?>


							    <div class="stats-meta">
								    Active</div>
						    </div><!--//app-card-body-->
						    <a class="app-card-link-mask" href="#"></a>
					    </div><!--//app-card-->
				    </div><!--//col-->
			    </div><!--//row-->

				<?php 
				
				$SqlChartMonthlySales = "SELECT 
				MONTHNAME(tbl_court_reservation.dateAdded) as monthname, 
				SUM(payment) as MonthlySales 
				FROM 
					tbl_court_reservation 
				INNER JOIN 
					tbl_court ON tbl_court.courtId = tbl_court_reservation.courtId 
				WHERE 
					tbl_court.userId = '$userId' 
				GROUP BY 
					YEAR(tbl_court_reservation.dateAdded), MONTH(tbl_court_reservation.dateAdded)";
			
				$result = $connect->query($SqlChartMonthlySales);

				foreach($result as $data){

					$amount[] = $data['MonthlySales'];
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

	const labels = ['Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec'];
	const data = {
	labels: labels,
	datasets: [{
		label: 'Monthly Sales',
		data: <?php echo json_encode($amount) ?>,
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

