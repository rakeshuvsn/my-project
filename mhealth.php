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
$res=mysqli_query($link,"SELECT * FROM users WHERE u_id=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res);
?>


<!DOCTYPE html>
<html>
    <head>
        <title>M.A. in Mental Health Counseling</title>
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
                          <a href="Student.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Student </a>
                        </li>
                        <li >
                        <a href="faculty.php"><i class="glyphicon glyphicon-user"></i>&nbsp;Faculty </a>
                        </li>
                        <li>
                          <a href="majors.php"><i class="glyphicon glyphicon-book"></i>&nbsp;majors </a>
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

                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                             <legend>Majors Offering</legend>
                              <div class="list-group">
                                <a href="majors.php" class="list-group-item ">
                                  MS in Computer Science
                                </a>
                                <a href="mba.php" class="list-group-item">Masters in Business Administration</a>
                                <a href="comm.php" class="list-group-item">M.A.in Communication</a>
                                <a href="museum.php" class="list-group-item">Master's in Museum Studies</a>
                                <a href="infos.php" class="list-group-item">MS in Information Systems</a>
                                <a href="mhealth.php" class="list-group-item active">M.A.in Mental Health Counseling</a>
                                <a href="acco.php" class="list-group-item">MS in Accounting</a>
                              </div>
                            </div>

                            <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">


                            <div class="row" style="     padding-top:50px; ">
                            <div >
                              <img src="./images/mental.jpg" class="img-responsive" style="  padding-bottom:50px ">
                              
                            </div>
                            </div>
                              

                              <h2>MASTER OF ARTS IN MENTAL HEALTH COUNSELING </h2>

                              <p>The Mission of the Marist College MA in Mental Health Counseling (MHC) Program is to prepare counselors-in-training for a professional career in the practice of mental health counseling. The Program provides students with the knowledge, skills, and training necessary to meet the NY State Education Department's education requirements to be eligible to become a Licensed Mental Health Counselor.</p>

                              <h3>Course Requirements</h3>
                              <p>Candidates for the Master of Arts in Mental Health Counseling must complete the following: </p>



                              <ol>
                                  <li>Foundations & Ethics of Professional Counseling </li>
                                  <li>Counseling Theory & Practice</li>
                                  <li>Counseling Techniques </li>
                                  <li>Assessment in Counseling </li>
                                  <li>Group Counseling</li>
                                  <li>Psychopharmacology </li>
                                  <li>Family & Couples Counseling </li>
                                  <li>Counseling Internship</li>
                                  <li>Research in Counseling</li>
                                  <li>Counselor Supervision</li>
                              </ol>
                          
                              <legend>DIRECTOR, MA IN Mental Health Councelling </legend>
                             



                           <center> <div class="row" >
                            <div >
                              <img src="./images/fac4.jpg" class="img-responsive">
                              
                            
                          
                             <!-- <h4> DIRECTOR, SOFTWARE DEVELOPMENT PROGRAM,COMPUTER SCIENCE</h4>-->

                              <b>Ryan Owens, Ph.D.
                              (845) 575-3002, ext. 3612 or 2523
                              ryan.owens@marist.edu </b>

                              </div>
                            </div>
                            </div></center>


                            </div>
                        
                            
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