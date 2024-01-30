<?php 
	include 'connect_db.php';

	// login credentials

	$username = $_POST['username'];
	$password = $_POST['password'];

	// user details

	$name = $_POST['name'];
	$description = $_POST['description'];
	
	$location = $_POST['location'];
	$contactNo = $_POST['contactNo'];
	$emailAd = $_POST['emailAd'];
	$type = $_POST['type'];

	$typeFinal = implode(', ', $type);

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

            $sql = "INSERT INTO tbl_user( username, password, role, filename) VALUES ('$username','$password','venue', '$finalimg') ";
			$query = mysqli_query($connect, $sql);
			
		}
	}
     

	


	if ($query) {

		$idSelect = "SELECT * FROM tbl_user where isActive = 1 ORDER BY userId DESC LIMIT 1";
		$fetch = mysqli_query($connect, $idSelect)->fetch_assoc();
		$userId = $fetch['userId'];


		$insertDetails = "INSERT INTO tbl_court( userId, courtName, courtDetails, courtType, courtLocation, courtContact, courtEmail) 
							VALUES ('$userId','$name','$description','$typeFinal', '$location','$contactNo','$emailAd')";

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