<?php

class AdmissionView {

    function showStudentData($data){

        ?>
<?php include 'inc/header.inc.php'; ?>
        <!--  -->
        <!DOCTYPE html> 
        <html lang="en"> 
        
        <head> 
            <meta charset="UTF-8"> 
            <title>GFG User Details</title> 
            <!-- CSS FOR STYLING THE PAGE --> 
            <style> 
                table { 
                    margin: 3px auto; 
                    font-size: large; 
                    border: 1px solid black; 
                } 
        
                h1 { 
                    text-align: center; 
                    color: #006600; 
                    font-size: xx-large; 
                    font-family: 'Gill Sans', 'Gill Sans MT',  
                    ' Calibri', 'Trebuchet MS', 'sans-serif'; 
                } 
        
                td { 
                    background-color: #E4F5D4; 
                    border: 1px solid black; 
                } 
        
                th, 
                td { 
                    font-weight: bold; 
                    border: 1px solid black; 
                    padding: 10px; 
                    text-align: center; 
                } 
        
                td { 
                    font-weight: lighter; 
                } 
            </style> 
        </head> 
        
        <body> 
            <section> 
                <h1>Supervisor Dashboard</h1> 
                <!-- TABLE CONSTRUCTION--> 
                <table> 
                    <tr> 
                        <th>Student ID</th> 
                        <th>Student Name</th> 
                        <th>Student Email</th> 
                        <th>Student Address</th> 
                    </tr> 
                    <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                    <?php   // LOOP TILL END OF DATA  
                        foreach($data as $x)
                        {
                    ?> 
                    <tr> 
                        <!--FETCHING DATA FROM EACH  
                            ROW OF EVERY COLUMN--> 
                        <td><?php echo $x['userID'];?></td> 
                        <td><?php echo $x['userName'];?></td> 
                        <td><?php echo $x['userEmail'];?></td> 
                        <td><?php echo $x['userAddress'];?></td> 
                        
                      
                        <td>
                            <a  type="button" class="btn btn-primary" href='../controllers/AdmissionController.class.php?do=Edit&userid=<?php  echo $x["userID"]; ?>'> Edit </a>          
                            <a  type="button" class="btn btn-primary btn-danger" href='../controllers/AdmissionController.class.php?do=Delete&userid=<?php  echo $x["userID"]; ?>'> Delete </a>
                        </td>
                    </tr> 
                    <?php 
                        } 
                    ?> 
          
                </table> 
                          <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="../controllers/AdmissionController.class.php?do=Add" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New Student
				    </a>
                    
                    <a href="../controllers/AdmissionController.class.php?do=Notify" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New Notification
				    </a>
                    <a href="../controllers/AdmissionController.class.php?do=AddCourse" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New Course
				    </a>
                              
                    <a href="../controllers/AdmissionController.class.php?do=ShowCourse" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Show Courses
				    </a>
                              
                                         
                    <a href="../controllers/AdmissionController.class.php?do=payment" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Edit Payment
				    </a>
                              
                                         
                                                   
            
                              
                    </div>
            </section> 
           
        </body> 
        
        </html> 
        
        <!--  -->
        <?php
    }
    
////////////////////////    
    function ShowCourses($data)
    {
            ?>
<?php include 'inc/header.inc.php'; ?>
        <!--  -->
        <!DOCTYPE html> 
        <html lang="en"> 
        
        <head> 
            <meta charset="UTF-8"> 
            <title>GFG User Details</title> 
            <!-- CSS FOR STYLING THE PAGE --> 
            <style> 
                table { 
                    margin: 3px auto; 
                    font-size: large; 
                    border: 1px solid black; 
                } 
        
                h1 { 
                    text-align: center; 
                    color: #006600; 
                    font-size: xx-large; 
                    font-family: 'Gill Sans', 'Gill Sans MT',  
                    ' Calibri', 'Trebuchet MS', 'sans-serif'; 
                } 
        
                td { 
                    background-color: #E4F5D4; 
                    border: 1px solid black; 
                } 
        
                th, 
                td { 
                    font-weight: bold; 
                    border: 1px solid black; 
                    padding: 10px; 
                    text-align: center; 
                } 
        
                td { 
                    font-weight: lighter; 
                } 
            </style> 
        </head> 
        
        <body> 
            <section> 
                
                <!-- TABLE CONSTRUCTION--> 
                <table> 
                    <tr> 
                        <th>Course Code</th> 
                        <th>Course Name</th> 
                        <th>Course Description</th> 
                        <th>Course Year</th> 
                          
                    </tr> 
                    <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                    <?php   // LOOP TILL END OF DATA  
                        foreach($data as $x)
                        {
                    ?> 
                    <tr> 
                        <!--FETCHING DATA FROM EACH  
                            ROW OF EVERY COLUMN--> 
                        <td><?php echo $x['courseCode'];?></td> 
                        <td><?php echo $x['courseName'];?></td> 
                        <td><?php echo $x['CourseDesc'];?></td> 
                        <td><?php echo $x['courseYear'];?></td> 
                        
                        
                      
                        
                    </tr> 
                    <?php 
                        } 
                    ?> 
          
                </table> 
               
            </section> 
           
        </body> 
        
        </html> 
        
        <!--  -->
        <?php
    
    }
            function EditStudent() {
        
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
        ?>
        <h1 class="text-center">Edit Student</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <input type="hidden" name="userid" value="5" />
                    <!-- Start Username Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Student Name</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="username" class="form-control" value="" autocomplete="off" required="required" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Student Id</label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="newid" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Dont Want To Change" />
                        </div>
                    </div>
                    <!-- End Password Field -->
                    <!-- Start Email Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="email" name="email" value="" class="form-control" required="required" />
                        </div>
                    </div>
                    <!-- End Email Field -->
                    <!-- Start Full Name Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Student Address</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="fullname" value="" class="form-control" required="required" />
                        </div>
                    </div>
                    <!-- End Full Name Field -->
                    <!-- Start Submit Field -->
                    <div class="form-group form-group-lg">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Save" class="btn btn-primary btn-lg" />
                        </div>
                    </div>
                    <!-- End Submit Field -->
                </form>
            </div>
            <?php
    }

    function updateStudent(){

        echo "<h1 class='text-center'>Update Member</h1>";
    }
function AddStudent(){
        ?>
        <h1 class="text-center">Add New Member</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert" method="POST" enctype="multipart/form-data">
					<!-- Start Username Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Student Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="username" class="form-control" autocomplete="off" required="required" placeholder="Username To Login Into Shop" />
						</div>
					</div>
					<!-- End Username Field -->
					<!-- Start Password Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Student Id</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="newid" class="password form-control" required="required" autocomplete="new-password" placeholder="Password Must Be Hard & Complex" />
							<i class="show-pass fa fa-eye fa-2x"></i>
						</div>
					</div>
					<!-- End Password Field -->
					<!-- Start Email Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10 col-md-6">
							<input type="email" name="email" class="form-control" required="required" placeholder="Email Must Be Valid" />
						</div>
					</div>
					<!-- End Email Field -->
					<!-- Start Full Name Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Student Address</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="address" class="form-control" required="required" placeholder="Full Name Appear In Your Profile Page" />
						</div>
					</div>
                                        
                                        <div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Student password</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="userpass" class="password form-control" required="required" autocomplete="new-password" placeholder="Password Must Be Hard & Complex" />
						</div>
					</div>
                                        
                                        

					<!-- End Avatar Field -->
					<!-- Start Submit Field -->
					<div class="form-group form-group-lg">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" value="Add Member" class="btn btn-primary btn-lg" />
						</div>
					</div>
					<!-- End Submit Field -->
				</form>
			</div>
            <?php
    }
    
    
    
    function InsertStudent(){
        echo "<h1 class='text-center'>Insert Member</h1>";
        
    }
 
    
    
    
    


function InsertNotification() {
        
       
        ?>
    <?php require_once '../views/inc/header.inc.php' ?>
        <h1 class="text-center">Add notification</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=Notify" method="POST">
                    <input type="hidden" name="userid" value="5" />
                    <!-- Start Username Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Notification subtitle</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="username" class="form-control" value="" autocomplete="off" required="required" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Notification Body</label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="newid" class="form-control" required="required" />
                        </div>
                    </div>
                    
                                        <div class="form-group form-group-lg">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Notify" class="btn btn-primary btn-lg" />
                        </div>
                    </div>
                    <!-- End Submit Field -->
                </form>
            </div>
            <?php
    }



    //$x = new AdmissionView;
    //$x->InsertNotification();



function InsertCourse() {
        
       
        ?>
    <?php require_once '../views/inc/header.inc.php' ?>
        <h1 class="text-center">Add Course</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=AddCourse" method="POST">
                    <input type="hidden" name="userid" value="5" />
                    <!-- Start Username Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Course Name</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="username" class="form-control" value="" autocomplete="off" required="required" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Course Description </label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="newid" class="form-control" required="required" />
                        </div>
                    </div>
                    
                    
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Course Code </label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="Code" class="form-control" required="required" />
                        </div>
                    </div>
                    
                    
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Course Teacher ID </label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="teacherid" class="form-control" required="required" />
                        </div>
                    </div>
                    
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Course Teacher Name </label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="teachername" class="form-control" required="required" />
                        </div>
                    </div>
                    
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Course Year </label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="Year" class="form-control" required="required" />
                        </div>
                    </div>
                    
                    
                                        <div class="form-group form-group-lg">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="AddCourse" class="btn btn-primary btn-lg" />
                        </div>
                    </div>
                    <!-- End Submit Field -->
                </form>
            </div>
            <?php
    }
    
    
    
    function EditPayment() {
        
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
        ?>
        <?php require_once '../views/inc/header.inc.php' ?>
        <h1 class="text-center">Edit Payment </h1>
            <div class="container">
                <form class="form-horizontal" action="?do=payment" method="POST">
                    <input type="hidden" name="userid" value="5" />
                    <!-- Start Username Field -->
                  
                    <!-- End Username Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Student Id</label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="text" name="stid" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Dont Want To Change" />
                        </div>
                    </div>
                    <!-- End Password Field -->
                    <!-- Start Email Field -->
                
                    <!-- End Email Field -->
                    <!-- Start Full Name Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Payment Status</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="payment" value="" class="form-control" required="required" />
                        </div>
                    </div>
                    <!-- End Full Name Field -->
                    <!-- Start Submit Field -->
                    <div class="form-group form-group-lg">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Save" class="btn btn-primary btn-lg" />
                        </div>
                    </div>
                    <!-- End Submit Field -->
                </form>
            </div>
            <?php
    }



    
    
    
    
}//end of class





