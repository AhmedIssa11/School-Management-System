<?php
    require_once 'LoginController.class.php';
    require '../models/AdminModel.class.php';
    require '../views/AdminView.class.php';
    require_once '../models/salaryModel.class.php';
    require '../Decoratives/SalaryTax.php';
    
     $adView = new AdminView();
    
      if(isset($_SESSION['ID']))
    {
        $admin = new Admin($_SESSION['ID']);
        
        $row = $admin->showUserDetails(2);
        $row4 = $admin->showUserDetails(4);
        
    
    }
  
    $row2 = $admin->showTeacherSalary();
    $salview= new AdminView();
    $sal = new Salary(2);
    //
    ////user salary 
    $sal2= new SalaryTax($sal);
    $sal3= new SalaryBonus($sal);//user salary too?
    $temp=$sal2->doubleTotalsalary() ;
    
    ////teacher attend
    $data = $admin->TeacherAttend();
    ////attend code
    $code = $admin->attendCode();
    $admin->UpdateAttendance($code);

    //where is the function 
    //functions not used
    //
    echo $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') {

        $adView->showStudentData($row,$row4);
        $adView->showTeacherAttend($data);
        $adView->showAttendCode($code);
      //  $adView->showStudentData($row4);
        
        //$salview->showTeacherSalary($temp);

    } elseif ($do == 'Add') {

        $adView->AddTeacher();
      


    } elseif ($do == 'Insert1') {

        // Insert Teacher Page

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "<h1 class='text-center'>Insert Member</h1>";
            

            // Get Variables From The Form
           
            $user 	= $_POST['username'];
            $newid      = $_POST['userID'];
            $pass 	= $_POST['password'];
            $email 	= $_POST['email'];
            $name 	= $_POST['fullname'];
            $address    = $_POST['userAddress'];
            $salary     = $_POST['salary'];

            $hashPass = sha1($_POST['password']);
            $admin->AddTeacher($salary,$address,$newid,$user,$email,$hashPass,$name,2);
           // $admin->AddSupervisior($address, $newid, $user, $email, $hashPass, $name, 4);

            // Check If There's No Error Proceed The Update Operation

        }

    } elseif ($do == 'Edit') {

        //echo $userid = $_GET['userid'];
        $adView->EditTeacher();
        
    } elseif ($do == 'Update') {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // Get Variables From The Form
            $id 	= $_POST['userid'];
            $user 	= $_POST['username'];
            $email 	= $_POST['email'];
            $name 	= $_POST['fullname'];
            $salary     = $_POST['salary'];

            // Password Trick
            $pass = sha1($_POST['newpassword']);   
            
            echo $user . $id;

            $admin->UpdateTeacher($user,$email,$name,$pass,$id,$salary);
            $adView->UpdateTeacher();
        }

    } elseif ($do == 'Delete') {

        echo "<h1 class='text-center'>Delete Member</h1>";

        // Check If Get Request userid Is Numeric & Get The Integer Value Of It

        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;

        // Select All Data Depend On This ID

        // If There's Such ID Show The Form

        $admin->DeleteTeacher($userid);

        //redirectHome($theMsg, 'back');

        echo '</div>';
        
    }elseif ($do == 'Add2') {

        $adView->AddSupervisior();
      


    }elseif ($do == 'Insert2') {

        // Insert Teacher Page

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "<h1 class='text-center'>Insert Member</h1>";
            

            // Get Variables From The Form
           
            $user 	= $_POST['username'];
            $newid      = $_POST['userID'];
            $pass 	= $_POST['password'];
            $email 	= $_POST['email'];
            $name 	= $_POST['fullname'];
            $address    = $_POST['userAddress'];
           

            $hashPass = sha1($_POST['password']);
            //$admin->AddTeacher($salary,$address,$newid,$user,$email,$hashPass,$name,2);
            $admin->AddSupervisior($address, $newid, $user, $email, $hashPass, $name, 4);

            // Check If There's No Error Proceed The Update Operation

        }

    }
    
    
    
   
    

