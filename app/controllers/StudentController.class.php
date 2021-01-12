<?php
require_once 'LoginController.class.php';
require_once '../../app/models/StudentModel.class1.php';
require_once '../../app/views/StudentView.php';
require_once '../../app/models/ExamsModel.class.php';

$stdView = new StudentView();

$stdView->Show_AllStudent();

if(isset($_SESSION['ID']))
{

//echo $_SESSION['ID'];
$stObj= new Student($_SESSION['ID']);
   
    $stdView->ShowStudentDetails($stObj);
    
        if($stObj->payment==1){
    $stdView->ShowExamSpec($stObj);
    $stdView->ShowCourse($stObj);
    $stdView->ShowSchedule($stObj);
    $stdView->ShowQuizzes($stObj);
    $stdView->ShowAssign($stObj);
    }
 else {
        echo "you have to pay your fees";
 }

//    
}
  

