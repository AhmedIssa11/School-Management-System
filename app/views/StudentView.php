<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
<?php include 'inc/header.inc.php'; ?>
<?php

require_once '../../app/models/StudentModel.class1.php';
require_once '../../app/models/ExamsModel.class.php';
require_once '../../app/models/CourseModel.class.php';
require_once '../../app/models/ScheduleModel.class.php';
require_once '../../app/controllers/StudentController.class.php';


    echo "Welcome Student";
    class StudentView
    {
        public function Show_AllStudent() {
//            $x =Student::SelectAllStudentsInDB();
//            for($i=0;$i<count($x);$i++)
//            {
//                echo("<a href=StudentController1.php>id=".$x[$i]->studentId." so the student name : ".$x[$i]->studentName."</a><br>");
//                
//                
//            }
//            
            
        }
        public function ShowStudentDetails($StdObj) 
        {
           
            ?>
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'StudentDetails')">StudentDetails</button>
  <button class="tablinks" onclick="openCity(event, 'Exams')">Exams</button>
  <button class="tablinks" onclick="openCity(event, 'Courses')">Courses</button>
<button class="tablinks" onclick="openCity(event, 'Schedule')">Schedule</button>
    <button class="tablinks" onclick="openCity(event, 'Quizzes')">Quizzes</button>
    <button class="tablinks" onclick="openCity(event, 'Assign')">Assigments</button>

</div>
<div id="StudentDetails" class="tabcontent">
    <table>
        <tr> 
                        <th>StudentId</th>
                        <th>StudentName</th>
                        <th>StudentEmail</th> 
                        <th>Student Result</th> 
                       
                    </tr>
           <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $StdObj->studentId;?></td> 
                <td><?php echo $StdObj->studentName;?></td> 
                <td><?php echo $StdObj->studentEmail;?></td> 
                <td><?php echo $StdObj->stdRes;?></td> 
                                          
            </tr>
    </table>
</div>
            <?php
            
            
            
            
            
//            echo"<table><tr><th>studentId</th><tr><td>".$StdObj->studentId."</td>";
//             echo"<table><th>studentName</th><tr><td>".$StdObj->studentName."</td>";
//              echo"<table><th>studentEmail</th><tr><td>".$StdObj->studentEmail."</td></tr>";
//              echo"<table><th>studentRes</th><tr><td>".$StdObj->stdRes."</td></tr>";
//            echo"</td><tr>";
//            echo"</table>";
            
           
            
        }
        //show exam details
          public function ShowExamSpec($StdObj){
              $x=$StdObj->ExamObjArray;
          
          ?>      
<div id="Exams" class="tabcontent">
    <table>
        <tr> 
                        <th>ExamID</th>
                        <th>ExamName</th>
                        <th>ExamDate</th> 
                        <th>ExamRes</th> 
                       
                    </tr>
                    <?php
                     for($i=0;$i<count($x);$i++){    
?>    
           <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $StdObj->ExamObjArray[$i]->ExamID;?></td> 
                <td><?php echo $StdObj->ExamObjArray[$i]->ExamName;?></td> 
                <td><?php echo $StdObj->ExamObjArray[$i]->ExamDate;?></td> 
                <td><?php echo $StdObj->ExamObjArray[$i]->ExamRes;?></td> 
                                          
            </tr>
            <?php
                     }
                     ?>
    </table>
</div>
            <?php
            
               
               
               
               
               
               
               
//                        echo"<table><tr><th>ExamID</th><tr><td>".$StdObj->ExamObjArray[$i]->ExamID."</td>";
//                         echo"<table><tr><th>ExamName</th><tr><td>".$StdObj->ExamObjArray[$i]->ExamName."</td>";
//                        echo"<table><tr><th>ExamDate</th><tr><td>".$StdObj->ExamObjArray[$i]->ExamDate."</td>";
//                         echo"<table><tr><th>ExamRes</th><tr><td>".$StdObj->ExamObjArray[$i]->ExamRes."</td>";
//            
//            echo"</td><tr>";
//            echo"</table>";
            
          }
          
          
          
public function ShowCourse($StdObj){
              $x=$StdObj->courseObjArray;
          
               
                ?>
<div id="Courses" class="tabcontent">
    <table>
        <tr> 
                        <th>courseCode</th>
                        <th>courseName</th>
                        <th>CourseDesc</th> 
                        <th>NumTeachers</th> 
                        <th>CourseMatrial</th>
                        <th>teacherEnrolled</th> 
                       
                    </tr>
                    <?php
                     for($i=0;$i<count($x);$i++){    
               
               ?>
           <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $StdObj->courseObjArray[$i]->courseCode;?></td> 
                <td><?php echo $StdObj->courseObjArray[$i]->courseName;?></td> 
                <td><?php echo $StdObj->courseObjArray[$i]->CourseDesc;?></td> 
                <td><?php echo $StdObj->courseObjArray[$i]->NumTeachers;?></td>
                 <td><?php echo $StdObj->courseObjArray[$i]->CourseMatrial;?></td> 
                  <td><?php echo $StdObj->courseObjArray[$i]->teacherenrolled;?></td> 
                                          
            </tr>
            <?php
                     }
                     ?>
    </table>
</div>
            <?php
               
               
               
               
               
               
               
               
               
               
//               
//                        echo"<table><tr><th>Coursecode</th><tr><td>".$StdObj->courseObjArray[$i]->courseCode."</td>";
//                        echo"<table><tr><th>CourseName</th><tr><td>".$StdObj->courseObjArray[$i]->courseName."</td>";
//                        echo"<table><tr><th>CourseDesc</th><tr><td>".$StdObj->courseObjArray[$i]->CourseDesc."</td>";
//                        echo"<table><tr><th>NumTeachers</th><tr><td>".$StdObj->courseObjArray[$i]->NumTeachers."</td>";
//                        echo"<table><tr><th>CourseMatrial</th><tr><td>".$StdObj->courseObjArray[$i]->CourseMatrial."</td>";
//                        
//                        
//                        
//                        
//                       
//            echo"</td><tr>";
//            echo"</table>";
            
           
        }
           public function ShowSchedule($StdObj)
          {
             $x=$StdObj->scheduleObjArray;
           for($i=0;$i<count($x);$i++){    
               
                  ?>
<div id="Schedule" class="tabcontent">
    <table>
        <tr> 
                        <th>day</th>
                        <th>TimeSlot</th>
                        <th>roomID</th> 
                        <th>courseID</th> 
                        <th>groupType</th> 
                        <th>groupNo</th> 
                        
                       
                    </tr>
           <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $StdObj->scheduleObjArray[$i]->day;?></td> 
                <td><?php echo $StdObj->scheduleObjArray[$i]->TimeSlot;?></td> 
                <td><?php echo $StdObj->scheduleObjArray[$i]->roomID;?></td> 
                <td><?php echo$StdObj->scheduleObjArray[$i]->courseID;?></td>
                 <td><?php echo $StdObj->scheduleObjArray[$i]->groupType;?></td> 
                  <td><?php echo $StdObj->scheduleObjArray[$i]->groupNo;?></td> 
                                          
            </tr>
    </table>
</div>
            <?php
               
               
               
               
               
               
               
               
             
//               
//                        echo"<table><tr><th>day</th><tr><td>".$StdObj->scheduleObjArray[$i]->day."</td>";
//                        echo"<table><tr><th>TimeSlot</th><tr><td>".$StdObj->scheduleObjArray[$i]->TimeSlot."</td>";
//                        echo"<table><tr><th>roomID</th><tr><td>".$StdObj->scheduleObjArray[$i]->roomID."</td>";
//                        echo"<table><tr><th>courseID</th><tr><td>".$StdObj->scheduleObjArray[$i]->courseID."</td>";
//                        echo"<table><tr><th>groupType</th><tr><td>".$StdObj->scheduleObjArray[$i]->groupType."</td>";
//                        echo"<table><tr><th>groupNo</th><tr><td>".$StdObj->scheduleObjArray[$i]->groupNo."</td>";
//                        
//                        
//                        
//                        
//                       
//            echo"</td><tr>";
//            echo"</table>";
//           
//           
           
           
           
        }
        
      
        
    }    
    
    
    
    
    
    
    function ShowQuizzes($StdObj){ 
            ?>
<div id="Quizzes" class="tabcontent">
    <table>
 
        <tr> 
                        <th>Quiz </th>
                        <th>Quiz Due Date</th>
            
        </tr>
        <?php
                    $x=$StdObj->QuizObjArray;
           for($i=0;$i<count($x);$i++){  
            ?>        
    
           <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                         
                        <td><?php echo $StdObj->QuizObjArray[$i];?></td> 
                
                        <td><?php echo $StdObj->QuizDueObjArray[$i];?></td>          
            </tr>
   
    <?php
           }
           ?>
             </table>
</div>
    <?php
        }
    
    
    
    function ShowAssign($StdObj){ 
            ?>
<div id="Assign" class="tabcontent">
    <table>
 
        <tr> 
                        <th>Course Name</th>
                        <th>Assignment File</th>
                        <th>Due date</th>
            
        </tr>
        <?php
                    $x=$StdObj->assignmentFileArray;
                   
           for($i=0;$i<count($x);$i++){  
            ?>        
    
           <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                         
                        <td><?php echo $StdObj->assignmentObjArray[$i];?></td> 
                       <!-- <td><a >//<?php //echo $StdObj->assignmentFileArray[$i];?> </a></td> -->
                        
                        <td><?php echo $StdObj->assignmentFileArray[$i];?></td>  
                        
                        <td><?php echo $StdObj->assignmentDueArray[$i];?></td>    
                        
            </tr>
   
    <?php
           }
           ?>
             </table>
</div>
    <?php
        }
    
        

        
        
        
        
}