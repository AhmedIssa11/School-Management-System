<?php
include_once 'SalaryAmount.php';
include_once 'SALChange.php';
include_once 'SalaryTax.php';
class SalaryBonus extends SALChange
{
   
    function doubleTotalsalary() {
        return $this->SalaryAmount->doubleTotalsalary()+300;
    }
 
            
    
   
    
    
    
  
    
    
    
    
}











?>