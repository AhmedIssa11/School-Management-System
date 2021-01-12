<?php

    require '../models/AdmissionModel.class.php';
    //require '../models/StudentModel.class1.php';
    require '../views/SupervisiorView.php';
    //require '../interfaces/Imanage.php';
    
    require_once 'LoginController.class.php';
    
    $std= new Student($_SESSION['ID']);
 
    $admin = new Admission($std);
    $adView = new AdmissionView();
    $row = $admin->showUserDetails(3);
    
    $Nots = new Notification;
   // $row2 = $admin->showTeacherSalary();

   // $adView->showStudentData($row);
    
//    foreach($row as $x){
//        echo $x['userID'] . $x['userName'] . $x['userEmail'] . $x['userAddress'] . '<br>';
//    }
    
//    foreach($row2 as $x){
//        echo $x['salary'] . '<br>';
//    }
    
    
    echo $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') {

        $adView->showStudentData($row);
        
    } 
    if ($do == 'Add') {

        $adView->AddStudent();

    } elseif ($do == 'Insert') {

        // Insert Teacher Page

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "<h1 class='text-center'>Insert Member</h1>";
            

            // Get Variables From The Form

            $user 	= $_POST['username'];
            $newid	= $_POST['newid'];
            $email 	= $_POST['email'];
            $address 	= $_POST['fullname'];
            $pass       = $_POST['userpass'];

            
            $admin->AddStudent2($newid,$email,$user,$address,$pass);
            
           // $admin->AddStudent2($email,$user,$address);

            // Check If There's No Error Proceed The Update Operation

        }

    } elseif ($do == 'Edit') {

        echo $userid = $_GET['userid'];
        $adView->EditStudent();
        
    } elseif ($do == 'Update') {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Get Variables From The Form
         
            $user 	= $_POST['username'];
            $newid	= $_POST['newid'];
            $email 	= $_POST['email'];
            $address 	= $_POST['fullname'];

            
            // Password Trick
            //$pass = sha1($_POST['newpassword']);   
            
          //  echo $user . $id;

            $admin->UpdateStudent2($email,$user,$address,$newid);
            $adView->UpdateStudent();
        }

    } elseif ($do == 'Delete') {

        echo "<h1 class='text-center'>Delete Member</h1>";

        // Check If Get Request userid Is Numeric & Get The Integer Value Of It

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

        // Select All Data Depend On This ID

        // If There's Such ID Show The Form

        $admin->DeleteStudent2($userid);

        //redirectHome($theMsg, 'back');

        echo '</div>';
        
    } elseif ($do == 'Notify') {
         $adView->InsertNotification();
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Get Variables From The Form
         
            $sub 	= $_POST['username'];
            $body	= $_POST['newid'];
           
        
            //$admin->addNotification($sub,$body);
            $row=$admin->NotificationView();
            
          foreach($row as $x){
            
              $lastid= $x['ID'];
        }
            
        $row2 =$admin->Notify($lastid);//getting the last notification from db
        
        //$z= $row2['subTitle'];
        foreach($row2 as $x){
        
              $SubTitle= $x['subTitle'];
              $Body= $x['Description'];
              
        }
        
        $Nots->Update($sub,$body);
        }
    } elseif($do == 'AddCourse'){
        
        $adView->InsertCourse();
        
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Get Variables From The Form
         
            $CName 	= $_POST['username'];
            $CDesc	= $_POST['newid'];
            $CCode      = $_POST['Code'];
            $CTeacherId =$_POST['teacherid'];
            $TName      =$_POST['teachername'];
            $CYear      =$_POST['Year'];
                    
            $admin->addCourse($CCode,$CName,$CDesc,$CYear,$CTeacherId,$TName);
         } 
         
    } elseif($do == 'ShowCourse'){
        $row2=$admin->ShowCourses();
        $adView->ShowCourses($row2);
    }else if($do=='payment')
    {
        $adView->EditPayment();
        
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Get Variables From The Form
         
            $ID 	= $_POST['stid'];
            $payment	= $_POST['payment'];
        
            $admin->EditPayment($ID,$payment);
        }
        
    }


    
   
    

