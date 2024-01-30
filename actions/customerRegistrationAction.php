<?php 
	include 'connect_db.php';

	// login credentials

	$username = $_POST['username'];
	$password = $_POST['password'];

	// user details

	$fullname = $_POST['fullname'];
	$address = $_POST['address'];
	$contactNumber = $_POST['contactNo'];
	$emailAddress = $_POST['emailAd'];

	  $extension=array('jpeg','jpg','png','gif');
    foreach ($_FILES['image']['tmp_name'] as $key => $value) {
        $filename=$_FILES['image']['name'][$key];
        $filename_tmp=$_FILES['image']['tmp_name'][$key];
        echo '<br>';
        $ext=pathinfo($filename,PATHINFO_EXTENSION);

        $finalimg='';
        if(in_array($ext,$extension))
        {
            if(!file_exists('images/'.$filename))
            {
            move_uploaded_file($filename_tmp, 'images/'.$filename);
            $finalimg=$filename;
            }else
            {
                 $filename=str_replace('.','-',basename($filename,$ext));
                 $newfilename=$filename.time().".".$ext;
                 move_uploaded_file($filename_tmp, 'images/'.$newfilename);
                 $finalimg=$newfilename;
            }
            //insert

            $sql = "INSERT INTO tbl_user( username, password, role, filename) VALUES ('$username','$password','user', '$finalimg') ";
			$query = mysqli_query($connect, $sql);
			
        }
    }

	

	

	if ($query) {

		$idSelect = "SELECT * FROM tbl_user where isActive = 1 ORDER BY userId DESC LIMIT 1";
		$fetch = mysqli_query($connect, $idSelect)->fetch_assoc();
		$userId = $fetch['userId'];


		$insertDetails = "INSERT INTO tbl_user_details( userId, fullName, address, contactNumber, emailAddress) VALUES ('$userId','$fullname','$address','$contactNumber','$emailAddress')";
		$queryDetailsInsert = mysqli_query($connect, $insertDetails);
		if ($queryDetailsInsert) {
			header('location:../index.php');
		}else{
			echo 'error '.$insertDetails. 'into'. $connect->error;
		}
	}else{
		echo 'error '.$sql. 'into'. $connect->error;
	}


 ?>