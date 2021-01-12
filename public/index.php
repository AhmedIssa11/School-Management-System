<?php

include_once '../app/config/config.php';
include '../app/views/inc/headerind.inc.php';
include '../app/views/inc/footerind.inc.php';
include '../app/Database.class.php';

include_once '../app/models/StudentModel.class.php';
include_once '../app/models/AdmissionModel.class.php';
require_once '../app/models/AdminModel.class.php';

/*
    Auto Load Classes 
*/

// spl_autoload_register(function($class) {

//     require 'classes/' . $class . '.php';

// });

// $student = new Student();
// $admission = new Admission();
// echo $student->getUserID();

// echo $student->countStudent();

// $x = $student->showStudentDetails();
// foreach ($x as $user){
//     echo $user['studentId'] . $user['studentName'] . $user['studentEmail'] . '<br>';
// }

// $x = $student->showStudentCourses(2);
// foreach ($x as $user){
//     echo $user['stdid'] . $user['courseName'] . $user['courseCode'] . '<br>';
// }

// $x = $student->showStudentShud(1);
// foreach ($x as $user){
//     echo $user['day'] . $user['Time Slot'] . $user['roomID'] . $user['courseID'] . $user['groupType'] . $user['groupNo'] .'<br>';
// }

// echo $admission->studentLv;

// $std = new Student();
// $adm = new Admission($std);
// $adm = new Admin();

// $adm->AddTeacher(2000,'ayman ezat');  

// echo "Hello Wolrd!";
// $db = new Database();
// echo "<pre>"; echo print_r($obj); echo "</pre>";
// echo var_dump(phpinfo());
?>