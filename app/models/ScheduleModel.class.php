<?php

require '../Database.class.php';
class Schedule {
  public $stdid;
  public $day;
  public $TimeSlot;
  public $roomID;
  public $courseID;
  public $groupType;
  public $groupNo;
          function __construct($id) {
             global $connect;
            if($id!="")
            {
                $stmt = $connect->prepare("SELECT * FROM schedule where stdid =$id");
                $stmt->execute();
                 $row = $stmt->fetchAll();
                  foreach ($row as $x) {
                   $this->day=$x["day"];   
                   $this->TimeSlot=$x["Time Slot"]; 
                   $this->roomID=$x["roomID"];
                   $this->courseID=$x["courseID"];
                   $this->groupType=$x["groupType"];
                   $this->groupNo=$x["groupNo"];
                   $this->stdid=$id;
                }  
            }
    }
    
}
