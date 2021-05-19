<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");

session_start();
$std=$_SESSION['user_id'];

if(isset($_POST['class']))
{ 
	$insert="insert into tbl_view(std_id)values('".$std."')";

mysql_query($insert);
echo '<script type="text/javascript">alert("save")</script>';
	
}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.ad
  {
    border: 3px solid #ddd;
    margin-top: -1px;
  background-color: lightgreen;
  font-size: 18px;
  color: black;
  width:130px;
  height:70px;
  }
  </style>
</head>
<body>

<form method="post">
	<table width="181" border="1" cellspacing="+4">
<?php
$selectquery="select * from tbl_request r inner join tbl_lecture lc on r.lec_id=lc.lec_id where std_id='".$std."'";
  $b=mysql_query($selectquery);
  while($c=mysql_fetch_array($b))
  {
?>

  <?php
  
  	 $i=$i+1;
	  $lec_id=$c['lec_id'];
	  $lec_pic=$c['lec_pic']; 
	  $lec_fname=$c['lec_fname'];
	  $lec_lname=$c['lec_lname'];
	  $lec_email=$c['lec_username'];
	  $_SESSION['lec_id']=$lec_id;

	  if($i==1)
	  {
		  echo "<tr>";
	  }
   ?> 
      
      
      <td width="140"><center><img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="200" height="200" /></center>
    <font color="blue" size="+1"> NAME:&nbsp;</font> <font color="green" size="+1"><?php echo $lec_fname; ?>&nbsp;
     <?php echo $lec_lname; ?></font><p>
     <font color="blue" size="+1"> USERNAME:&nbsp;</font><font color="green" size="+1"><?php echo $lec_email; ?></font><p>


  <a href="classe.php?lec_id=<?php echo $lec_id; ?>"><input type="button" value="View" class="cd"></a>
	</td>

    
 <?php
	  if($i==5)
	  {
		  echo "</tr>";
		  echo "</tr><td colspan='5'><hr></td></tr>";
		  
		  $i=0;
	  }
      
     ?> 
     <?php
  }
	 ?>
	 </table>
     </form>
	 </body>
     </html>