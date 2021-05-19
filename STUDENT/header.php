<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
session_start();
$selectquery="select * from tbl_student where std_id='".$_SESSION['user_id']."'";
//echo $selectquery;
$teamdata=mysql_query($selectquery);
  $data=mysql_fetch_array($teamdata);
  
	  $pic=$data['std_pic'];
	  $fname=$data['std_fname'];
	  $lname=$data['std_lname'];
	   $id=$data['std_id'];
	  $_SESSION['std_id']=$id;
 
	  ?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
    <style>
      input[type=reset] {
  background-color: red; /* Green */
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
      input[type=submit],[type=button] {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
input[type=text],[type=date],select,textarea {
  
  
  padding: 15px 32px;
  text-align: left;
  
  font-size: 16px;
}
    </style>
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image:url(../GUEST/uploads/<?php  echo $pic;?>);"></a><center><font color="#CCCCCC" style="font-size:25px" style="font-family:Georgia, 'Times New Roman', Times, serif" ><?php echo $fname; ?>&nbsp;<?php echo $lname; ?></font></center>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">PERSONAL DETAILS</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="update_reg.php">My Profile</a>
                </li>
                <li>
                    <a href="course.php">Qulification Details</a>
                </li>
                <li>
                    <a href="changepassword.php">CHANGE PASSWORD</a>
                </li>
	            </ul>
	          </li>
	          
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">LECTURE</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="index.php">NEW LECTURES</a>
                </li>
                <li>
                    <a href="following_lec.php">OUR LECTURES</a>
                </li>
                
              </ul>
            </li>
            <li>
                    <a href="requstaccepted.php">CLASS</a>
                </li>
	          <li>
              <a href="Online_exam/index.php">EXAM</a>
	          </li>
	         <li>
             <a href="chatactive.php">CHAT STUDENT</a>
             </li>
	        </ul>

	        <div class="footer">
	        	<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="home.php">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notification.php">Notification</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../GUEST/logindemo.php">Log out</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
<script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>