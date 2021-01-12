<?php
require_once '../../app/models/User.class.php';
//require_once '../../app/models/StudentModel.class1.php';
require_once '../Database.class.php';

class teacher extends User {

    public $teacherName;
    public $teacherID;
    public $salary;
    public $courseArray;
    public $assignArray;
    public $quizArray;
    public $code;
    
    function __construct($id) {
        
        global $connect;
        if($id!="")
        {
            $stmt = $connect->prepare("SELECT * FROM teacher where teacherID=$id");
            $stmt->execute();
            $row = $stmt->fetchAll();
          
            foreach($row as $x)
            {
                $this->teacherName=$x["teacherID"];
                $this->teacherID=$id;
                $this->salary=$x["salary"];
                
                
                $stmt3 = $connect->prepare("SELECT * FROM course where teacherEnrolled=$id");
                $stmt3->execute();
                  $row3 = $stmt3->fetchAll();
                   $i=0;
                   
                   foreach ($row3 as $x3)
                   {
                       $this->courseArray[$i]= new Course($x3["teacherEnrolled"]);
                       $i++;
                   }
                 
                $stmt4= $connect->prepare("SELECT * FROM assignments where TeacherID=$id");
                $stmt4->execute();
                $row4 = $stmt4->fetchAll();
                 $i=0;
                   
                foreach ($row4 as $x4)
                {
                       $this->assignArray[$i]= new Assignments($x4["TeacherID"]);
                       $i++;
                }
                   
                $stmt5 = $connect->prepare("SELECT * FROM quiz where teacherId=$id");
                $stmt5->execute();
                $row5 = $stmt5->fetchAll();
                $i=0;
                   
                foreach ($row5 as $x5)
                {
                       $this->quizArray[$i]= new Quiz($x5["teacherId"]);
                       $i++;
                }
                   
            }
           
        }
        ;
    }


    function setcode($val)
    {
        $this->code=$val;
    }
    
    function getcode()
    {
            global $connect;
       
         $stmt = $connect->prepare("SELECT * FROM attendance WHERE id = 191536");
        $stmt->execute();
       

           
        $row = $stmt->fetchAll();
       
        
       
        return $row;
        
    }

    public function enterStdResult($RES,$ID){
    
        global $connect;

        $stmt = $connect->prepare("UPDATE student SET stdRes = '$RES' WHERE studentId ='$ID'");

	    $stmt->execute();	
    }



    public function deleteAssignment($assignID)
    {
        global $connect;

        $stmt = $connect->prepare("DELETE FROM assignments WHERE AssignID = '$assignID' ");
       
	    $stmt->execute();  
    }
    
    
    public function makeAssign($TeacherId,$CourseID,$DueDate,$AssignFile){
    
        global $connect;
	
        $stmt = $connect->prepare(" INSERT INTO assignments(TeacherID, CourseId, DueDate, AssignFile) VALUES ('$TeacherId','$CourseID','$DueDate','$AssignFile')");
       
	    $stmt->execute();  
   
    }
   
    public function makeExams($exID,$exName,$exDate,$stID){
    
         global $connect;

        $stmt = $connect->prepare("INSERT INTO exams(ExamID, ExamName, ExamDate,StudentID ) VALUES ('$exID','$exName','$exDate','$stID')");
       
	    $stmt->execute();  
    }
    
    

    public function putExamsMark($res,$id){
    
        global $connect;

	
        $stmt = $connect->prepare("UPDATE exams SET ExamRes = '$res' where StudentID = '$id'");
       
	    $stmt->execute();  
        
    }
    
    public function viewSalary(){
        
        global $connect;

		$stmt = $connect->prepare("SELECT salary FROM teacher WHERE teacherID = 15");

                
		$stmt->execute();
        return $stmt->fetchColumn();
                         
    }

    public function addCourseMatirial($link,$id){
    
        global $connect;

		$stmt = $connect->prepare("UPDATE course SET CourseMatrial= '$link' WHERE  CourseCode= '$id'");
                
		$stmt->execute();
               
    }
    
    function showCourseDetails($id){
        
        global $connect;

           $stmt = $connect->prepare("SELECT * FROM course where teacherEnrolled  = '$id'");

           $stmt->execute();

           $row = $stmt->fetchAll();
       
           return $row;
        
        
   }
    
   

   function showAssignmentsDetails($id){
        
    global $connect;

       $stmt = $connect->prepare("SELECT * FROM assignments where TeacherID = '$id'");

       $stmt->execute();

       $row = $stmt->fetchAll();
   
       return $row;
    
    
   }
    
    public function ShowQuiz($id){
        
        global $connect;

		$stmt = $connect->prepare("SELECT * FROM quiz where teacherId = '$id'");
                
		$stmt->execute();   
                
                
              $row = $stmt->fetchAll();
     
                return $row;
    
    }
    
     public function MarkQuiz($res,$id){
        
        global $connect;

		$stmt = $connect->prepare("UPDATE quiz SET QuizRes= '$res' WHERE QuizID= '$id'");
                
                
		$stmt->execute();          
    }
}