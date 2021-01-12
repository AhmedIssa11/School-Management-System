<?php
    require_once '../../app/models/User.class.php';
    require_once '../../app/PhpMailer/PHPMailerAutoload.php';
    
require "../Database.class.php";
require "Inotify.php";
interface Imanage{
    function addNotification($notSub,$notBody);
    function removeNotification($id);
    function notify($id);
    
}


class Notification implements Inotify{
    
   public function update($Sub,$Body)
   {
    //send notification    
       //mailing code
       
         $test = new User();
    $row=$test->Mail(3);//get user mail from db
    
    
    
    foreach($row as $x){
       
        $userEmail=  $x['userEmail'];
    
        
        
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = 'true';
    $mail->SMTPSecure='ssl';
    $mail->Host= 'smtp.gmail.com';
    $mail->Port= '465';
    $mail->isHTML();
    
    
    
    $mail->Username = 'schoolsystem973@gmail.com';
    $mail->Password = 'Soliman2020';
    $mail->SetFrom('adminstrator@schoolsystem.com');
    $mail->Subject= $Sub;
    $mail->Body= $Body;
    $mail->AddAddress($userEmail);
    
    $mail->Send();
    
    
        
        
        
        
    }
    
    
    
       
   }
   
}














?>