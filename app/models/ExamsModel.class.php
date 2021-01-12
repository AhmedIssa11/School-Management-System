<?php
require '../Database.class.php';


class Exams {
    public $ExamID;
    public $ExamName;
    public $ExamDate;
    public $ExamRes;
    public $StudentID;
        function __construct($id) {
             global $connect;
            if($id!="")
            {
                $stmt = $connect->prepare("SELECT * FROM exams where ExamID=$id");
                $stmt->execute();
                 $row = $stmt->fetchAll();
                  
                 foreach ($row as $x) {
                   $this->ExamID=$x["ExamID"];   
                   $this->ExamName=$x["ExamName"];
                   $this->ExamDate=$x["ExamDate"];
                   $this->ExamRes=$x["ExamRes"];
                   $this->StudentID=$id;
                
                   
                 }  
            }
            
    }
        
    
}
