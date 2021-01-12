<?php
    require_once 'LoginController.class.php';
    require '../models/TeacherModel.class.php';
    require '../views/TeacherView.php';
    
   $techView = new TeacherView();
   
    if(isset($_SESSION['ID']))
    {
        $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
        $data= new teacher($_SESSION['ID']);
        $techView->showAssignmentsDetails($data);
        $techView->showCourseDetails($data);
        $techView->ShowQuiz($data);
        $techView->AddAssignment($data);
        $techView->teacherAttend();
        //echo $code;
        if ($do == 'check') {

            $code =$data->getcode();    
            echo $code["code"];
            echo $code["id"];
            echo $code["date"];
           // echo $code;
        $id = $_POST['attendcode'];      
        echo $id;
        
        if($code == $id)
        {
            echo "done";
        
            
        }
        else
        {
            echo "no";
        }

    } 
    }
    
    
    
    
    
    
    
    /*
    
    //$row3 = $admin->makeAssign($_SESSION['ID'],$CourseID,$DueDate,$AssignFile,$AssignID);

    $adView->showCourseData($row);
    //$adview->showStudentsData($data);
    $adView->showStudentsData($row2);
    
    echo $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';

    if ($do == 'Manage') {

        $adView->showAssignments($row3);

    } elseif ($do == 'Add') {

        $adView->AddAssignment();

    } elseif ($do == 'Insert') {

        // Insert Assignment Page

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo "<h1 class='text-center'>Insert Assignment</h1>";
            

            // Get Variables From The Form

            $courseCode = $_POST['coursecode'];
            $link 	= $_POST['link'];
            $dueDate 	= $_POST['date'];

            echo $courseCode . $link . $dueDate;
            $admin->makeAssign($_SESSION['ID'],$courseCode,$dueDate,$link);

            // Check If There's No Error Proceed The Update Operation

        }

    }
   
    */

