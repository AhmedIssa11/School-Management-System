<?php 

require_once 'User.class.php';
//require '../Database.class.php';
require '../singleton.php';
require 'ExamsModel.class.php';
require 'CourseModel.class.php';
require 'ScheduleModel.class.php';


class Student 
{
    public $studentId;
    public $studentName;
    public $studentEmail;
    public $stdRes;
    public $ExamObjArray;
    public $courseObjArray;
    public $scheduleObjArray;
    private $studentLv ;
    private $studentBooks = 'test';
    public $QuizObjArray;
    public $QuizDueObjArray;
    public $payment;
    public $assignmentObjArray;
    public $assignmentFileArray;
    public $assignmentDueArray;


    function getStdLevel() {
        return $this->studentLv;
    }

    function getStdBooks(){
        return $this->studentBooks;
    }

   
    
    function __construct($id)
    {
        $Db= DbConnection::getInstance();
        $connect = $Db->getConnection();

        if($id!="")
        {
           
          //  echo "id is  ".$id;
            //where studentId=$id
           
            
            $stmt = $connect->prepare("SELECT * FROM student where studentId = $id ");
                
		$stmt->execute();
                 $row = $stmt->fetchAll();
//                 echo $row["Level"];
                foreach ($row as $x) {
                  //  ECHO "GOOD";
                   $this->studentName=$x["studentName"];
                   $this->studentEmail=$x["studentEmail"];
                   $this->studentLv=$x["Level"];
                   
                   $this->stdRes=$x["stdRes"];
                   $this->studentId=$id;
                   $this->payment=$x["payment"];
                   //echo "result ".$this->stdRes;
                   
                   /////////////////////////////////////////////////
                   
                   //array of exams
                   $stmt2 = $connect->prepare("SELECT * FROM exams WHERE Year=$this->studentLv");
                   
                   $stmt2->execute();
                    $row2 = $stmt2->fetchAll();
                   $i=0;
                   
                   foreach ($row2 as $x2)
                   {
                       $this->ExamObjArray[$i]= new Exams($x2["ExamID"]);
                       $i++;
                   }
                 
                   //////////////////////////////////////////////////
//                  //  array of courses
                   $stmt3 = $connect->prepare("SELECT * FROM course where courseYear = $this->studentLv");
                //   echo 'student lvl = '.$this->studentLv;
                   $stmt3->execute();
                    $row3 = $stmt3->fetchAll();
                   $i=0;
                   
                   foreach ($row3 as $x3)
                   {
                       $this->courseObjArray[$i]= new Course($x3["courseCode"]);
                       $i++;
                   }
//                   
                   //////////////////////////////////////////////////////
                   // array of shedules
                     $stmt4 = $connect->prepare("SELECT * FROM schedule where stdid=$id");
                   $stmt4->execute();
                    $row4 = $stmt4->fetchAll();
                   $i=0;
                   
                   foreach ($row4 as $x4)
                   {
                       $this->scheduleObjArray[$i]= new Schedule($x4["stdid"]);
                       $i++;
                   }
                   
                   //////quizzes
                   $stmt5 = $connect->prepare("SELECT  * FROM quiz WHERE QYear=$this->studentLv");
                   $stmt5->execute();
                   $row5 = $stmt5->fetchAll();
                   $i=0;
                    foreach ($row5 as $x5)
                   {
                       $this->QuizObjArray[$i]= $x5["QuizName"];//added now
                       $this->QuizDueObjArray[$i]= $x5["DueDate"];//added now
                       $i++;
                   }
                   
                   $stmt6 = $connect->prepare("SELECT  * FROM assignments WHERE year=$this->studentLv");
                   $stmt6->execute();
                   $row6 = $stmt6->fetchAll();
                  $i=0;
                    foreach ($row6 as $x6)
                   {
                       $this->assignmentObjArray[$i]= $x6["CourseId"];//added now
                       $this->assignmentFileArray[$i]= $x6["AssignFile"];//added now
                       $this->assignmentDueArray[$i]= $x6["DueDate"];//added now
                       
                       $i++;
                   }  
                   
                }   

            }            
    }
 
   
//    function countStudent() {
//
//		$connect = $Db->getConnection();
//
//		$stmt = $connect->prepare("SELECT COUNT(studentid) FROM student");
//
//		$stmt->execute();
//
//		return $stmt->fetchColumn();
//    }
//    
//    function showStudentDetails() {
//
//		$connect = $Db->getConnection();
//
//		$stmt = $connect->prepare("SELECT * FROM student");
//
//		$stmt->execute();
//
//        $row = $stmt->fetchAll();
//
//		return $row;
//    }
//
//    function showStudentCourses($id) {
//
//		$connect = $Db->getConnection();
//
//		$stmt = $connect->prepare("SELECT * FROM course WHERE stdid = $id");
//
//		$stmt->execute();
//
//        $row = $stmt->fetchAll();
//
//		return $row;
//    }
//
//    function showStudentShud($id) {
//
//		$connect = $Db->getConnection();
//
//		$stmt = $connect->prepare("SELECT * FROM schedule WHERE stdid = $id");
//
//		$stmt->execute();
//
//                $row = $stmt->fetchAll();
//
//		return $row;
//    }
//    function ShowQuizzes($id){ 
//        
//        
//        $connect = $Db->getConnection();
//
//		$stmt = $connect->prepare("SELECT * FROM quiz WHERE QYear = $this->studentLv");
//
//		$stmt->execute();
//
//                $row = $stmt->fetchAll();
//
//		return $row;
//        
//        
//        
//        
//    }
    
   
        
        
}
    
    
    
    
    
    
    
    
    
    
