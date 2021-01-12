<?php
include_once 'SalaryAmount.php';
 abstract class SALChange implements SalaryAmount
 {
     protected $SalaryAmount;
     
     function __construct(SalaryAmount $SalaryAmount) {
         $this->SalaryAmount=$SalaryAmount;
     }


  

     abstract function doubleTotalsalary();
     
     
     
     
     
     
     
     
     
}
    
    
    
    
    
    
    








?>