<?php

require_once '../../app/models/User.class.php';
require_once '../../app/models/StudentModel.class1.php';
require_once '../Database.class.php';
require_once '../../app/PhpMailer/PHPMailerAutoload.php';
require_once '../interfaces/Imanage.php';

class Admission  extends User implements Imanage
{


   private $stdLevel;
   private $stdBooks;
   
    public function __construct(Student $std)
    {
        $this->std = $std;
        $stdLevel = $this->std->getStdLevel();
        $stdBooks = $this->std->getStdBooks();
    }

    function setStdlevel($stdLevel){

        $this->stdLevel=$stdLevel;
    }
    
    function setStdBooks($stdBooks){

        $this->stdBooks=$stdBooks;
    }
            
    function AddStudent($stdLevel,$stdBooks,$userID) {

		global $connect;

		$stmt = $connect->prepare("INSERT INTO admission (stdLevel,stdBooks,stdid)VALUES('$stdLevel','$stdBooks','$userID')");

		$stmt->execute();
    }
    
    
   function AddStudent2($newid,$stdEmail,$stdName,$address,$pass) {

		global $connect;
                $hash= sha1($pass);

		$stmt = $connect->prepare("INSERT INTO users(userID,userEmail,userName,useraddress,userPassword,userType,fullName)VALUES('$newid','$stdEmail','$stdName','$address','$hash','3','')");
	        
                $stmt->execute();
                $stmt2 = $connect->prepare("INSERT INTO student(studentId,studentEmail,studentName,stdRes,Level)VALUES('$newid','$stdEmail','$stdName','0','0')");
                $stmt2->execute();
    }
 
    function addtostudenttable()
    {
        
    }
    function DeleteStudent($userID){

        global $connect;

        $stmt =$connect->prepare("DElETE FROM admission where stdid= '$userID'" );

        $stmt->execute();
      
    }

    
    function DeleteStudent2($userID){

        global $connect;

        $stmt =$connect->prepare("DElETE FROM users where userID= '$userID'" );
        $stmt2 = $connect->prepare("DELETE FROM student where studentId='$userID'");
        $stmt->execute();
        $stmt2->execute();
      
    }


    function UpdateStudent($stdLevel,$userID){
        global $connect;

        $stmt =$connect->prepare("Update admission Set stdLevel='$stdLevel' where stdid= '$userID'" );
        
        $stmt->execute();
    }
    
    
    
function UpdateStudent2($stdEmail,$stdName,$address,$userID){
        global $connect;

        $stmt =$connect->prepare("Update users Set userEmail='$stdEmail', userName='$stdName' , userAddress='$address'  where userID= '$userID'" );
        $stmt2=$connect->prepare("Update student Set studentEmail='$stdEmail', studentName='$stdName' where studentId='$userID'");
        $stmt->execute();
        $stmt2->execute();
    }
    
    
    
    
    
     function addNotification($notSub,$notBody){
     
        global $connect;
        
        $stmt = $connect->prepare(" INSERT INTO notifications(subTitle, Description) VALUES ('$notSub','$notBody')");

	$stmt->execute();
    
        
        
    }
   	

    function getCourses($year)
    {
        global $connect;
        $stmt = $connect->prepare("");
        $stmt->execute();
        $row = $stmt->fetchAll();
        return $row;
    }
//courseCode
//courseName
//CourseDesc
//teacherEnrolled

    
    function addCourse($ccode,$cname,$descc,$year,$teacherID,$teachername){
           global $connect;
        $enrolled=$teacherID." - ".$teachername;
        $stmt = $connect->prepare(" INSERT INTO course( courseCode, courseName, CourseDesc,courseYear,teacherEnrolled) VALUES ('$ccode','$cname','$descc','$year','$enrolled')");

	$stmt->execute();
        
    }
            function NotificationView(){
     
          global $connect;

	    $stmt = $connect->prepare("SELECT * FROM notifications");

	    $stmt->execute();

        $row = $stmt->fetchAll();
        
        return $row;
    
        
        
    }
    function removeNotification($id){
         global $connect;
        
       $stmt = $connect->prepare(" DELETE FROM notifications WHERE ID='$id' ");

	$stmt->execute();
    
        
        
    }
    
    function notify($userType){
        //send mail
            global $connect;

	    $stmt = $connect->prepare("SELECT * FROM users WHERE userType = '$userType' ");

	    $stmt->execute();

        $row = $stmt->fetchAll();
        
        return $row;
        
    }

     function ShowCourses(){ 
        
        
       global $connect;

		$stmt = $connect->prepare("SELECT * FROM course");

		$stmt->execute();

                $row = $stmt->fetchAll();

		return $row;
                    
        
     }
     
     
      function EditPayment($ID,$payment){
        global $connect;
         
           
        $stmt=$connect->prepare("Update student Set payment='$payment' where studentId='$ID'");
       
        $stmt->execute();
    }
  /*
   
   *   function ReadAdmission($stdLevel,$stdBooks){
    
   *     global $connect;
     
   *    $stmt =$connect->prepare("DElETE FROM admission where stdLevel= $stdLevel" );
     
   *    $stmt =$connect->prepare("DElETE FROM admission where stdLevel= $stdBooks" );
     
   *    $stmt->execute();
    
   * }*/
}
    

