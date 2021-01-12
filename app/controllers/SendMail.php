<?php
    require_once '../../app/models/User.class.php';
    require_once '../../app/PhpMailer/PHPMailerAutoload.php';
    
   
?>
<html>
    <body>
        <?php include '../views/inc/header.inc.php'; ?>
<!--<form  action="SendMail.php" method="get">

		<h2 >write ur name </h2>
		Name: <input class type="text" name="user" placeholder="Username" autocomplete="off">
		<input type="submit">	
</form>-->

      <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form action="SendMail.php" id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope-square"></i></span>
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>  
    <?php 
   // $user= $_GET["user"];
    $user = $_GET["user"];
    echo $user;
     $test = new User();
    $row=$test->Mail($user);//get user mail from db
    
    
    
    foreach($row as $x){
        $sentence= "your password is : " . $x['userPassword'];
        $userEmail=  $x['userEmail'];
    }
    
    
    
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
    $mail->Subject= 'password reset';
    $mail->Body= $sentence ." and ur email is ".$userEmail;
    $mail->AddAddress($userEmail);
    
    $mail->Send();
    
    
    
    
    
    
    
    
     ?>
       
    </body>
</html>
   
    

