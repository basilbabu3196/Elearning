<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");
session_start();
$std=$_SESSION['user_id'];
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.card{
	border: 5px solid #f1f1f1;
       width:700px;
       height:500px;
      }
/* Full-width input fields */
h1
{
	font-size:4;
	text-align:center;
	color:green;
	font-weight:bold;
}
h2
{
	font-size:1;
	text-align:center;
	color:black;
	font-weight:bold;
}
.timee
{
  position: absolute;
  left: 8px;
  bottom: 6px;	
}
.notif
{
	
	font-weight:bold;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 6px 8px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 5%;
}

button:hover {
  opacity: 0.8;
}
.notification .badge
{
  
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}
.back
{
	font-size=3px;

}
/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 8px;
  top: 6px;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
  background-color:red;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

* {
  box-sizing: border-box;
}

ol {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

ol li {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block;
  position: relative;
}

ol li:hover {
  background-color: #eee;
}

.close1 {
  cursor: pointer;
  position: absolute;
  top: 50%;
  right: 0%;
  padding: 12px 16px;
  transform: translate(0%, -50%);
}

.close1:hover {background: #bbb;}
</style>
</head>
<body>
<form method="post">
  
<h1>Notification</h1>
<ol>
  <?php
$ids=$_GET['eletid']; 
if($ids=="")
{
$selectquery="select * from tbl_request where std_id='".$std."'";
  $b=mysql_query($selectquery);
  while($c=mysql_fetch_array($b))
  {
	  $lec_id=$c['lec_id'];
	$selec="select * from  tbl_notification n inner join tbl_subject s on n.sub_id=s.sub_id where lec_id='".$lec_id."' order by time DESC";
  $f=mysql_query($selec);
  while($h=mysql_fetch_array($f))
  {
	  $id=$h['notification_id'];
	  $sub=$h['notification_sub'];
	  $notification=$h['notification'];
	  $time1=$h['time'];
      $notification_date=$h['notification_date'];
      $subject=$h['subject'];

?>
   <a href="notification.php?eletid=<?php echo $id;?>" class="notification">
<li>
<?php 
    $ti = substr($time1,0,10);
     
    $tim=date("Y-m-d");
    if($ti==$tim)
    {
    	?>
    	<span class="badge">TODAY</span><p>
    	<?php
    }
    ?>
	<font size="+2"><?php echo $sub; ?></font><p>
    <font size="2">&nbsp;&nbsp;Held on:<?php echo $notification_date; ?><br>
    <font size="2">&nbsp;&nbsp;Subject:<?php echo $subject; ?>
	<div align="right"><font size="1"><?php echo $time1; ?>
	</font>

	</div>
	</li>

	</a>

<?php
}
}

?>
<?php
}
else{

      
  $selectquery="select * from tbl_notification n inner join tbl_lecture l on n.lec_id=l.lec_id inner join tbl_subject s on n.sub_id=s.sub_id where notification_id='".$ids."'";
  $b=mysql_query($selectquery);
  $c=mysql_fetch_array($b);
       $sub=$c['notification_sub'];
    $notification=$c['notification'];
    $time1=$c['time'];
    $notification_date=$c['notification_date'];
    $subject=$c['subject'];
    $lecfname=$c['lec_fname'];
    $leclname=$c['lec_lname'];
      ?>
      <center>

      <div class="animate">
      <div class="card">
      <p>
      <p>
      <p>
      <h2><?php echo $sub; ?></h2><p>
      <p>
      <p>
      <p>
      <div class="notif" align="left"><font size="+1">&nbsp;&nbsp;<?php echo $notification; ?></font>
    <p><font size="+1">&nbsp;&nbsp;Subject:<?php echo $subject; ?><p>
    <font size="+1">&nbsp;&nbsp;Lecture Name:<?php echo $lecfname;?>&nbsp;<?php echo $leclname; ?><p>
    <font size="+1">&nbsp;&nbsp;Held on:<?php echo $notification_date; ?><p>
    <p>
    

      <div class="timee"><font size="1">&nbsp;&nbsp;<?php echo $time1; ?></font></div>
      </div>

      <div class="close" align="right"><a href="notification.php?eletid=""">X</font></a></div>
      </div>
      </div>
      </center>
      <?php
   }


	?>
  


</form>
<script>
var closebtns = document.getElementsByClassName("close1");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}
</script>

</body>
</html>
