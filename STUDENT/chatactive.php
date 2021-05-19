<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");
session_start();
if(isset($_POST['add']))
{
	
$lec=$_SESSION['std_id'];
	
		$status=0;
	$insertquery="insert into chat_login_details(std_id,status)values('".$lec."','".$status."')";
	mysql_query($insertquery);
	
	}
	
	if($_GET['updateid'])
	{
		$lec=$_SESSION['std_id'];
		$status=offline;
		$update="update chat_login_details set status='".$status."' where std_id='".$lec."'";
		//echo $update;
		mysql_query($update);
		
	}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ELEARNING</title>
<style type="text/css">
.button1
{
	padding: 30px 100px;
  text-align: center;
  border-color: blue;
  background-color: lightgreen;
  border-radius:5;
  cursor: pointer;
  margin: 5px;
}
.button1:hover 
 {
  padding: 30px 100px;
  text-align: center;
  border-color: blue;
  background-color: green;
}
header
{
	align-content: center;
	color: red;
	font-size: 70px;
	font-family: sans-serif;
	font-style: oblique;
}
</style>
</head>
<body>
<form method="post"><br /><br /><br /><br /><br /><br /><br />
<div align="center">

<?php
$lec=$_SESSION['user_id'];
$result = mysql_query("SELECT COUNT(*) AS count FROM chat_login_details where std_id='".$lec."'");
$row = mysql_fetch_assoc($result);
$count = $row['count'];
if($count==0)
{
 ?>
 <header>CLICK FOR CREATE CHAT</header>
<input type="submit" name="add" value="Create Chat" />
<?php
}
else
{
	?>
	<header>CLICK FOR START CHAT</header>
    <button type="submit" name="update" class="button1"><a href="chatstudent.php?changeid=<?php echo $lec ;?>" style="color:#036">START CHAT</a></button>
    
<?php
}
?>
</div>
</form>
</body>
</html>