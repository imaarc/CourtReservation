<?php
    session_start();

    if(!isset($_SESSION['username']))
    {	
    	header('location: index.php');
    	exit;
    }else{
    	$user = $_SESSION['username'];
        $userId = $_SESSION['userId'];

    }
    
    	?>