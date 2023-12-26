<?php 
require_once('connect_db.php');
date_default_timezone_set("Asia/Manila");
session_start();

       
       	$user = $_POST['usernameLogin'];
       	$pass = $_POST['pwdLogin'];

            $query="SELECT * FROM tbl_user WHERE username='$user' AND password='$pass' ";
            $result=mysqli_query($connect,$query);

            if(mysqli_num_rows($result)>0){
                while ($row = $result->fetch_assoc()) {

                     if($query == true){
                        $usertype= $row['role'];
                        $id= $row['userId'];
                            if($usertype == 'user'){
                                $_SESSION['username']=$row['username'];
                                 $_SESSION['userId']=$id;

                                    echo '<script>location.href="user/index.php?role='.$usertype.'";</script>';

                            }else{

                                $_SESSION['username']=$row['username'];
                                $_SESSION['userId']=$id;

                                    echo '<script>location.href="admin/index.php?role='.$usertype.'";</script>';
                            }
                     
                    
                    }else{
                        echo '<div class="text-danger text-center mt-1 mb-n2 font-weight-bold">Wrong Username or Password. </div>';
                    }
                }
            }else{
                echo '<div class="text-danger text-center mt-1 mb-n2 font-weight-bold">Wrong Username or Password.</div>';
            }
   

?>