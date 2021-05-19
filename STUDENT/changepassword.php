<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");
session_start();
$lec=$_SESSION['user_id'];
$selectquery="select * from tbl_student where std_id='".$lec."'";
  $b=mysql_query($selectquery);
  $c=mysql_fetch_array($b);
       $lec_username=$c['std_username'];
	  $lec_password=$c['std_password']; 
	  $lec_id=$c['std_id'];
	  if(isset($_POST['edit']))
{
	
	$username=$_POST['username'];
	$password=$_POST['new'];
	$oldpass=$_POST['old'];
	if($lec_password==$oldpass)
	{
	$update="update tbl_student set std_username='".$username."',std_password='".$password."' where std_id='".$lec_id."'";
	mysql_query($update);
	echo "<script>alert('UPDATED');</script>";
	}
	else
	{
		echo "<script>alert('Please Type Valid Old Password');</script>";
	}
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post">
<center>
<table width="304" border="0">
<tr>
<th width="304" height="70">
Username
</th>
<td width="304">
<input type="text" name="username" value="<?php echo $lec_username; ?>" />
</td>
</tr>
<tr>
<th height="59">
Old Password
</th>
<td>
<input type="password" name="old" required="required" />
</td>
</tr>
<tr>
<th height="58">
New Password
</th>
<td>
<input type="password" name="new" required="required" />
</td>
</tr>
<td>
</td>
<td>
<input type="submit" value="EDIT" name="edit" />
<input type="reset" value="Cancel" />
</td>
</table>
</center>
</form>
</body>
</html>