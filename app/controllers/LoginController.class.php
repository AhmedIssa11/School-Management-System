<?php
	require '../../app/Database.class.php';
	include_once '../../app/config/config.php';

        session_start();
	$noNavbar = "";
	$pageTitle = "Login";
       
	// If There Is a Opened Session Go Directly To Dashboard Without Login 
	// if(isset($_SESSION['Username'])) {
	// 	header('Location:../../public/index.php'); // Redirect To Dashboard Page
	// }       echo "Hello From DashBoard";
	//include "init.php";

	// Check if User Coming From HTTP Post Request
             
	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		@$username = $_POST['user'];
		@$password = $_POST['pass'];
		$hashedPass = sha1($password);
                

		// Check If The User Exist In The Database

		$stmt = $connect->prepare("SELECT userID, userName, userPassword FROM users WHERE userName = '$username' AND userPassword = '$hashedPass'");  // Statment

		$stmt->execute();
		$row = $stmt->fetch();
		$count = $stmt->rowCount();
                
                $stmt2 =$connect->prepare("SELECT userType FROM users WHERE userName = '$username' AND userPassword = '$hashedPass'");
                $stmt2->execute();
                $row2 = $stmt2->fetchAll();
                
                foreach ($row2 as $x){
                    $userRole = $x['userType'];
                }
                
                
                
		// If Counter > 0 This Mean That Detabase Contain Record About This Username
		if($count > 0) {

			if($userRole==1){
				
				$_SESSION['Username'] = $username; // Register Session Name
				$_SESSION['ID'] = $row['userID']; // Register Session ID
                        
                header('Location: ../../app/controllers/AdminController.class.php'); // Redirect To Dashboard Page
				exit();
        	}
			
			if($userRole==2){
				
				$_SESSION['Username'] = $username; // Register Session Name
			    $_SESSION['ID'] = $row['userID']; // Register Session ID
                        
                header('Location: ../../app/controllers/TeacherController.class.php'); // Redirect To Dashboard Page
			    exit();
            }
					
			if($userRole==3){

            	$_SESSION['Username'] = $username; // Register Session Name
			    $_SESSION['ID'] = $row['userID']; // Register Session ID
                        
                header('Location: ../../app/controllers/StudentController.class.php'); // Redirect To Dashboard Page
			    exit();
        	}
					 
			if($userRole==4){

                $_SESSION['Username'] = $username; // Register Session Name
			    $_SESSION['ID'] = $row['userID']; // Register Session ID
                        
                header('Location: ../../app/controllers/AdmissionController.class.php'); // Redirect To Dashboard Page
			    exit();
            }

		} 
            
        else {

			echo "<div class='alert alert-danger'>Username or Password is wrong</div>";
		}

	} else {

		//echo "Sorry You Can't Acess This Page Without POST Request";
	}
?>
	<!-- Test Bootstrap -->
	<!-- <div class="btn btn-danger btn-block">Test Bootstrap</div> -->
	<!-- Test Fontawsome -->
	<!-- <i class="fa fa-home fa-5x"></i> -->
 	

	
