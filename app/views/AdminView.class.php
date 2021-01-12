<?php

require_once '../controllers/AdminController.class.php';

class AdminView {

    function showStudentData($data,$data2){

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
                    margin: 0 auto; 
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
                <h1>Admin Dashboard</h1> 
                <!-- TABLE CONSTRUCTION--> 
                <table> 
                    <tr> 
                        <th>Teacher ID</th> 
                        <th>Teacher Name</th> 
                        <th>Teacher Email</th> 
                        <th>Teacher Address</th> 
                       
                        <th>Control</th>
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
                            <a href='../controllers/AdminController.class.php?do=Edit&userid=<?php  echo $x["userID"]; ?>'> Edit </a>          
                            <a href='../controllers/AdminController.class.php?do=Delete&userid=<?php  echo $x["userID"]; ?>'> Delete </a>
                        </td>
                        
                    </tr> 
                    
                    <?php 
                        } 
                        
                    ?> 
                    <a href="../controllers/AdminController.class.php?do=Add" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New Teacher
				    </a>
                </table> 
                  <table> 
                    <tr> 
                        <th>SuperVisior ID</th> 
                        <th>SuperVisior Name</th> 
                        <th>SuperVisiorEmail</th> 
                        <th>SuperVisior Address</th> 
                       
                        <th>Control</th>
                    </tr> 
                    <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
                    <?php   // LOOP TILL END OF DATA  
                        foreach($data2 as $x)
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
                            <a href='../controllers/AdminController.class.php?do=Edit&userid=<?php  echo $x["userID"]; ?>'> Edit </a>          
                            <a href='../controllers/AdminController.class.php?do=Delete&userid=<?php  echo $x["userID"]; ?>'> Delete </a>
                        </td>
                        
                    </tr> 
                    
                    <?php 
                        } 
                        
                    ?> 
                    <a href="../controllers/AdminController.class.php?do=Add2" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add New Teacher
				    </a>
                </table> 
                    
                
                
                
                
                
            </section> 
        </body> 
        
        </html> 
        
        <!--  -->
        <?php
    }

    function EditTeacher() {
        
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
        ?>
        <h1 class="text-center">Edit Teacher</h1>
            <div class="container">
                <form class="form-horizontal" action="?do=Update" method="POST">
                    <input type="text" name="userid" value="5" />
                    <!-- Start Username Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="username" class="form-control" value="" autocomplete="off" required="required" />
                        </div>
                    </div>
                    <!-- End Username Field -->
                    <!-- Start Password Field -->
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10 col-md-6">
                            
                            <input type="password" name="newpassword" class="form-control" autocomplete="new-password" placeholder="Leave Blank If You Dont Want To Change" />
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
                        <label class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="fullname" value="" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-group form-group-lg">
                        <label class="col-sm-2 control-label">salary</label>
                        <div class="col-sm-10 col-md-6">
                            <input type="text" name="salary" value="" class="form-control" required="required" />
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

    function updateTeacher(){

        echo "<h1 class='text-center'>Update Member</h1>";
        
        
        
        
    }

    function AddTeacher(){
        ?>
        <h1 class="text-center">Add New Teacher</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert1" method="POST" enctype="multipart/form-data">
					<!-- Start Username Field -->
                                        <div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Teacher ID</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="userID" class="form-control" autocomplete="off" required="required" placeholder="Username To Login Into Shop" />
						</div>
					</div>
                                        
                                        
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="username" class="form-control" autocomplete="off" required="required" placeholder="Username To Login Into Shop" />
						</div>
					</div>
					<!-- End Username Field -->
					<!-- Start Password Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10 col-md-6">
							<input type="password" name="password" class="password form-control" required="required" autocomplete="new-password" placeholder="Password Must Be Hard & Complex" />
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
						<label class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="fullname" class="form-control" required="required" placeholder="Full Name Appear In Your Profile Page" />
						</div>
					</div>
                                        
                                        <div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">User Address</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="userAddress" class="form-control" required="required" placeholder="Full Name Appear In Your Profile Page" />
						</div>
					</div>
                                        <div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Teacher Salary</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="salary" class="form-control" required="required" placeholder="Full Name Appear In Your Profile Page" />
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

    function InsertTeacher(){
        echo "<h1 class='text-center'>Insert Member</h1>";
        
    }
    
      function AddSupervisior(){
        ?>
        <h1 class="text-center">Add New SuperVisior</h1>
			<div class="container">
				<form class="form-horizontal" action="?do=Insert2" method="POST" enctype="multipart/form-data">
					<!-- Start Username Field -->
                                        <div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">supervisior ID</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="userID" class="form-control" autocomplete="off" required="required" placeholder="Username To Login Into Shop" />
						</div>
					</div>
                                        
                                        
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="username" class="form-control" autocomplete="off" required="required" placeholder="Username To Login Into Shop" />
						</div>
					</div>
					<!-- End Username Field -->
					<!-- Start Password Field -->
					<div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10 col-md-6">
							<input type="password" name="password" class="password form-control" required="required" autocomplete="new-password" placeholder="Password Must Be Hard & Complex" />
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
						<label class="col-sm-2 control-label">Full Name</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="fullname" class="form-control" required="required" placeholder="Full Name Appear In Your Profile Page" />
						</div>
					</div>
                                        
                                        <div class="form-group form-group-lg">
						<label class="col-sm-2 control-label">User Address</label>
						<div class="col-sm-10 col-md-6">
							<input type="text" name="userAddress" class="form-control" required="required" placeholder="Full Name Appear In Your Profile Page" />
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
  
    public function showTeacherSalary($temp) 
        {
           
            ?>
    <table>
        <tr> 
                        <th>salary</th>
                        
                       
                    </tr>
           <tr> 
                <!--FETCHING DATA FROM EACH  
                    ROW OF EVERY COLUMN--> 
                <td><?php echo $temp?></td> 
              
                                          
            </tr>
    </table>
            <?php
  }

  function showTeacherAttend($data)
  {
    $dataCalculated = array();
    foreach( $data as $row ) {
      // We create the first array level, if this is the first time
        array_push($dataCalculated, $row['id'], $row['date']);
    }
      ?>
    <section> 
        <h1>Teacher Attendance Table</h1> 
        <!-- TABLE CONSTRUCTION--> 
        <table> 
            <tr> 
                <th>Teacher ID</th> 
                <?php
                   ?>
                   <th>Teacher Name</th>
                   <?php
                    foreach($data as $x)
                    {
                        ?>
                        
                        <th><?php echo $x['date'];?></th> 
                        <?php
                    } 
                ?>
            </tr> 
            <!-- PHP CODE TO FETCH DATA FROM ROWS--> 
            <?php   // LOOP TILL END OF DATA  
            foreach($data as $x)
            {
                ?> 
                <tr>    
                    <!--FETCHING DATA FROM EACH  
                        ROW OF EVERY COLUMN--> 
                        <td><?php echo $x['id'];?></td> 
                        <td><?php echo "";?></td> 
                        <td><?php echo $x['attendState'];?></t  d>
                </tr> 
        
            <?php 
            }     
            ?> 
        </table> 
    </section>
    <?php
    }

    function showAttendCode($data){ 
        ?>
        <br><br>
        <h1>Attandence Code</h1>
        <h2><?php echo $data;?></h2>
        
        <?php
    }


}