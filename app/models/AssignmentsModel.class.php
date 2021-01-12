<?php

require '../Database.class.php';
class Assignments {
  public $TeacherID;
  public $courseId;
  public $DueDate;
  public $AssignFile;
  public $AssignID;
  public $assignStatus;
  public $assignSolution;
   function __construct($id) {
             global $connect;
            if($id!="")
            {
                $stmt = $connect->prepare("SELECT * FROM assignments where TeacherID =$id");
                $stmt->execute();
                 $row = $stmt->fetchAll();
                  foreach ($row as $x) {
                   $this->assignStatus=$x["assignStatus"];   
                   $this->courseId=$x["CourseId"];
                   $this->DueDate=$x["DueDate"];
                   $this->AssignFile=$x["AssignFile"];
                   $this->AssignID=$x["AssignID"];
                   $this->assignSolution=$x["assignSolution"];
                   $this->TeacherID=$id;
                }  
            }
    }

}