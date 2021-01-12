<?php
include_once '../Decoratives/SalaryAmount.php';
require_once 'User.class.php';
require '../../app/Database.class.php';
  class Salary implements SalaryAmount

{
      public $salaryamount;
      private $teacherid;
    
     function __construct($id)
    {
         global $connect;
          if($id!="")
           {
              $stmt = $connect->prepare("SELECT salary FROM teacher where teacherID=$id");
            
              $stmt->execute();
              $row = $stmt->fetchAll();
              foreach($row as $x)
              {
                  $this->salaryamount=$x['salary'];
                  $this->teacherid=$id;
              }
                 
                 
           }
     
         
         
    }
     
     
    
             
     
     function AddSalary(){
         
         
         
     }
     
     function editSalary(){
         
         
     }
     
     function doubleTotalsalary() {
      
         return $this->salaryamount;
       
        
     }
     
    
    
    
    
    
}







?>