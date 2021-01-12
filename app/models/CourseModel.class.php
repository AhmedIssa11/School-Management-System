<?php

require '../Database.class.php';
class Course {
  public $stdid;
  public $courseCode;
  public $courseName;
  public $CourseDesc;
  public $NumTeachers;
  public $CourseMatrial;
  public $teacherenrolled;
   function __construct($id) {
             global $connect;
            if($id!="")
            {
               
                $stmt = $connect->prepare("SELECT * FROM course where courseCode = '$id'");
                $stmt->execute();
                 $row = $stmt->fetchAll();
                  foreach ($row as $x) {
                   $this->courseCode=$x["courseCode"];   
                   $this->courseName=$x["courseName"];
                   $this->CourseDesc=$x["CourseDesc"];
                   $this->NumTeachers=$x["NumTeachers"];
                   $this->CourseMatrial=$x["CourseMatrial"];
                   $this->teacherenrolled=$x["teacherEnrolled"];
                   $this->stdid=$id;
                }  
            }
    }

}