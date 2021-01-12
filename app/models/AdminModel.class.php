<?php 

require_once 'User.class.php';
require '../../app/Database.class.php';

class Admin extends User {

    
    function __construct($id) {
        if($id!="")
        {   
            global $connect;
            $stmt = $connect->prepare("SELECT * FROM users where userID = $id AND userType = 1 ");
            $stmt->execute();
            $row= $stmt->fetchAll();
            $i=0;
            foreach ($row as $x)
            {
            $this->adminid=$id;
            $this->adminname=$x["userName"];
            }
         }
    }
    
    function UpdateAttendance($code)
    {
        global $connect;
        
         $stmt = $connect->prepare("UPDATE attendance SET code='$code' ");
        $stmt->execute();
        
    }
    
    
    function AddTeacher($salary,$Address,$newid,$username,$userEmail,$userPassword,$fullName,$userType) {

        global $connect;

        $stmt = $connect->prepare("INSERT INTO users ( userID,userName,userEmail,userPassword,fullName,userType,userAddress)VALUES('$newid','$username','$userEmail','$userPassword','$fullName','$userType','$Address')");
        $stmt2 = $connect->prepare("INSERT INTO teacher (teacherName,teacherID,salary)VALUES('$username','$newid','$salary')");

        $stmt->execute();
        $stmt2->execute();
    }
    
    function AddSupervisior($Address,$newid,$username,$userEmail,$userPassword,$fullName,$userType) {

        global $connect;

        $stmt = $connect->prepare("INSERT INTO users ( userID,userName,userEmail,userPassword,fullName,userType,userAddress)VALUES('$newid','$username','$userEmail','$userPassword','$fullName','$userType','$Address')");
        
      
        $stmt->execute();
      
    }
    
    function DeleteTeacher($userID){

        global $connect;

        $stmt = $connect->prepare("DELETE FROM users where userID = '$userID'" );
        $stmt2 = $connect->prepare("DELETE FROM teacherID where teacherID = '$userID'" );

        $stmt->execute();
        $stmt2->execute();
      
    }

    function UpdateTeacher($username,$userEmail,$fullName,$pass,$id,$salary)
    {
        global $connect;

        $stmt = $connect->prepare("UPDATE users SET userName = '$username', userEmail = '$userEmail', fullName = '$fullName', userPassword = '$pass' WHERE userID = '$id'");
        $stmt2 = $connect->prepare("UPDATE teacher SET teacherName = '$username',salary ='$salary' WHERE teacherID = '$id'");
        $stmt->execute();
        $stmt2->execute();
    }

    function EditTeacherSalary($UserID,$teacherSalary){
        global $connect;

        $stmt =$connect->prepare("UPDATE teacher SET salary='$teacherSalary' WHERE teacherID = '$UserID'" );
        
        $stmt->execute();
    }
    
    
    function showTeacherSalary(){
            
        global $connect;

        $stmt = $connect->prepare("SELECT salary FROM teacher");

        $stmt->execute();

        $row = $stmt->fetchAll();

        return $row;  
    }

    function TeacherAttend(){
            
        global $connect;

        $stmt = $connect->prepare("SELECT * FROM attendance");

        $stmt->execute();

        $row = $stmt->fetchAll();

        return $row;  
    }

    function attendCode(){
        // Random string generator
        $bytes = random_bytes(3);
        $code = bin2hex($bytes);
        return $code;
        
    }
    
}