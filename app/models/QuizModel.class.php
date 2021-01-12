<?php

require '../Database.class.php';
class Quiz{
  public $QuizID;
  public $DueDate;
  public $QuizRes;
  public $teacherId;
  public $studentId;
 
   function __construct($id) {
             global $connect;
            if($id!="")
            {
                $stmt = $connect->prepare("SELECT * FROM quiz where teacherId =$id");
                $stmt->execute();
                 $row = $stmt->fetchAll();
                  foreach ($row as $x) {
                   $this->QuizID=$x["QuizID"];   
                   $this->DueDate=$x["DueDate"];
                   $this->QuizRes=$x["QuizRes"];
                   $this->studentId=$x["stdId"];
                   $this->teacherId=$id;
                }  
            }
    }

}