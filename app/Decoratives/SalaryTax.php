<?php
include_once 'SalaryAmount.php';
include_once 'SALChange.php';
include_once 'SalaryBonus.php';
 class SalaryTax extends SALChange
{
   
         
    
            
      
            
            
            
    
            
    function doubleTotalsalary() {
     //   $firstobj = new SalaryBonus();
       // $firstobj= $this->sal;
       if($this->SalaryAmount->doubleTotalsalary()<15000)
       {  return $this->SalaryAmount->doubleTotalsalary()-((2.5/100)*$this->SalaryAmount->doubleTotalsalary());
        
       }  //echo $this->SalaryAmount->doubleTotalsalary()-((2.5/100)*$this->SalaryAmount->doubleTotalsalary());
        
    }
    
  
    
    
    
    
    
}
    
     









?>