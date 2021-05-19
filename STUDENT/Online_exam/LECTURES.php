
<?php
include("header.php");
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
?>
<html>
<head>
<style>
h1
{
	font-family:Georgia, "Times New Roman", Times, serif;
	font-style:oblique;
	color:#006;
}
</style>
</head>
<body>
<div align="right"><a href="../home.php">HOME</a>&nbsp;<a href="index.php">BACK</a></div>
<form method="post">
<h1 align="center">SELECT LECTURE</h1>
<?php
session_start();
$std=$_SESSION['user_id'];
$selectquery="select * from tbl_request r inner join tbl_lecture lc on r.lec_id=lc.lec_id where std_id='".$std."' and request_status=1";
  $b=mysql_query($selectquery);
  ?>
   <table class="table table bordered" cellspacing="15">
  <?php
  while($c=mysql_fetch_array($b))
  {
	  $lec_id=$c['lec_id'];
	  $lec_pic=$c['lec_pic']; 
	  $lec_fname=$c['lec_fname'];
	  $lec_lname=$c['lec_lname'];
	  $lec_email=$c['lec_username'];
	  $_SESSION['lec_id']=$lec_id;
	   $i=$i+1;
    if($i==1)
	  {
		  echo "<tr>";
		  
		  
	  }
   ?> 
      <?php 
	  echo '<td>';
	  ?>
      
      <center><img src="../../GUEST/uploads/<?php echo $lec_pic; ?>" width="200" height="150" /></center>
      
    <a href="sublist.php?editid=<?php echo $lec_id;?>"> <?php echo $lec_fname; ?>&nbsp;
     <?php echo $lec_lname; ?><p></a>
      <?php echo $lec_email; ?><p>
     
     </td>
      
     <?php
  if($i==4)
	  {
		  echo "</tr>";
		  echo "</tr><td colspan='5'><hr></td></tr>";
		  
		  $i=0;
	  }
  }
	 ?>
     </table>
     </form>
	 </body>
     </html>