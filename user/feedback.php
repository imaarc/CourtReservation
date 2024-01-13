<?php include 'includes/header.php' ?>

<?php 
	$courtId = $_GET['courtId'];
	$courtReservationId = $_GET['courtReservationId'];
	$userId = $_GET['userId'];
 ?>


<div class="row gx-4 gx-lg-5 align-items-center my-5">

	<h1 class="text-center mb-5">Give a feedback to your experience</h1>

	<div class="card my-5" style="margin-bottom:200px!important;">
		<div class="card-body">

			<form class="" method="POST" action="feedbackSave.php">
				<div class="my-5">

					<input type="hidden" name="userId" value="<?=$userId?>">
					<input type="hidden" name="courtId" value="<?=$courtId?>">

					<div class="form-floating">
					  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 200px" name="feedback"></textarea>
					  <label for="floatingTextarea2">Tell us your experience</label>
					</div>
					<div  class="d-flex justify-content-center">
						<button class="btn btn-primary my-3 w-75 " type="submit" >Submit</button>
					</div>
					
					
				</div>
				
			</form>

			
			
		</div>
	</div>
</div>

<?php include 'includes/footer.php' ?>