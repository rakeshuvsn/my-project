<?php
session_start();
//include_once 'js/dbconnect.php';

$link = mysqli_connect("localhost", "rakeshcollege", "Babblu1993", "rakeshcollege");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}

 if (isset($_POST["passwordChange"])){
	$sql = 'SELECT password FROM users where u_id ='. $_SESSION['user'];

	 $retval = mysqli_query($link,$sql);
                           
       if(! $retval )
       {
          die('Could not get data: ' . mysql_error());
       }

	    $row = mysqli_fetch_array($retval);

	    $currentPwd = md5(mysqli_real_escape_string($link,$_POST['current']));

	    if($currentPwd === $row['password']){
	    	$newPwd = md5(mysqli_real_escape_string($link,$_POST['newPassword']));
	    	$sql = "UPDATE USERS SET PASSWORD='".$newPwd."' where u_id=". $_SESSION['user'];
	    	if(mysqli_query($link,$sql))
				 {

          ?>

           <script>alert('Password changed ');</script>

          <?php
				 }else{
          ?>
           <script>alert('Error occured! please try again');</script>
          <?php
				 }


	    }else{
        ?>
          <script>alert('Incorrect Password');</script>

        <?php
	    }


}
  


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Your Profile at marist</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="description" content="Demo project">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="./css/custom.css">
        
    </head>
    <body>

        <div class="wrapper">
        <div class="box">
           <div class="row row-offcanvas row-offcanvas-left">  
                <div class="column col-sm-12 col-xs-12" id="main">
                <!-- top nav -->
                <div class="navbar navbar-blue navbar-static-top">  
                    <div class="navbar-header">
                      <div class="row">
                      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse" >
                        <span class="sr-only">Toggle</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <img src="./images/logo.png" class="navbar-brand logo" alt="">
                      </div>
                    </div>
                     <div class="collapse navbar-collapse" role="navigation">
                    <ul class="nav navbar-nav" >
                        <li>
                          <a href="index.php"><i class="glyphicon glyphicon-home"></i>&nbsp;Home</a>
                        </li>
                        <li>
                          <a href="student.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Student </a>
                        </li>
                        <li >
                        <a href="faculty.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Faculty </a>
                        </li>
                        <li>
                          <a href="majors.php"><i class="glyphicon glyphicon-book"></i>&nbsp;Majors </a>
                        </li>
                        
                       <li>
                         <a href="feestructure.php"><i class="glyphicon glyphicon-usd"></i>&nbsp;Fee Structure</a>
                       </li>


                       <li>
                         <a href="fee.php"><i class="glyphicon glyphicon-usd"></i>&nbsp; Payment </a>
                       </li>
                     
                        </ul>
                      <ul class="nav navbar-nav pull-right" >
                        <li>
                         <a href="yourprofile.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Your Profile</a>
                       </li>
                       <li>
                         <a  href="logout.php?logout" class="clickable"><i class="glyphicon glyphicon-off"></i>&nbsp;Logout</a>
                       </li>
                      </ul>
                    </div>
                </div>
                <!-- /top nav -->
                    <div class="padding">
                        <div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
                            <!-- content -->                      
                            <div class="row" id="content">
                              <div class="container">
                            <!-- Write Here -->


                             <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-1 col-lg-offset-1">
                             <div class="table-responsive">
                             <?php
                       
                            if(isset ($_SESSION['user']) ){
                                                    $sql = 'SELECT * FROM users where u_id ='. $_SESSION['user'];
                                                    
                           //mysql_select_db('maristcollege');
                           $retval = mysqli_query($link,$sql);
                           
                           if(! $retval )
                           {
                              die('Could not get data: ' . mysql_error());
                           }
                           
                          echo "<table class='table table-hover'>
                        <tr>
                        <th>user ID</th>
                        <th>user Name</th>
                        <th>Email</th>
                        
                        
                        </tr>";
                         
                        while($row = mysqli_fetch_array($retval))
                          {
                          echo "<tr>";
                          echo "<td>" . $row['u_id'] . "</td>";
                           echo "<td>" . $row['u_name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            

                          
                         
                          echo "</tr>";
                          }
                        echo "</table>";
                           
                          // mysqli_close($link);
                        }
                           ?>
                           </div>

                           <form action="" method="POST" role="form">
                           	<legend>Change Password</legend>
                           
                           	<div class="form-group">
                           		<label for="">Current Password</label>
                           		<input type="text" class="form-control" id="current" name="current" placeholder="Input field">
                           	</div>
                           	<div class="form-group">
                           		<label for="">New Password</label>
                           		<input type="text" class="form-control" id="newPassword" name="newPassword" placeholder="Input field">
                           	</div>
                           	<div class="form-group">
                           		<label for="">Confirm Password</label>
                           		<input type="text" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Input field">
                           	</div>
                           
                           	
                           
                           	<button type="submit" name="passwordChange" class="btn btn-primary">Submit</button>
                           </form>
                            
                        </div>
                            <!-- end Here -->
                           </div><!--/row-->
                        </div><!-- /col-9 -->
                </div><!-- /padding -->
             </div>
         </div>
        </div>
    </div>

     <div class="row text-center" id="footer" >    
                             <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 col-md-offset-1 navbar-brand">
                              	Marist
                             </div>
                             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 footer-nav">
                               <ul class ="footer-links" >
                                 <li><a href="README.md">About</a></li>
                                 <li> <a href="team.php">Team</a></li>
                                
                               
                                <ul class="footer-links pull-right" style="padding-left:200px"  >
                                <li><a href="presentation.php">Presentation</a></li>
                                </ul>

                                </ul>
                             </div>
  
                        </div>   
    	
    
    </body>
    
</html>