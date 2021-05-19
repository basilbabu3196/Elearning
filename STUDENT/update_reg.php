<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
session_start();
include("header.php");

session_start();
$lec=$_SESSION['user_id'];

$selectquery="select * from tbl_student where std_id='".$lec."'";
  $b=mysql_query($selectquery);
  $c=mysql_fetch_array($b);
       $lec_id=$c['std_id'];
	  $lec_pic=$c['std_pic']; 
	  $lec_fname=$c['std_fname'];
	  $lec_lname=$c['std_lname'];
	  $lec_email=$c['std_email'];
	  $lec_gender=$c['std_gender'];
	  $lec_dob=$c['std_dob'];
	  $lec_address=$c['std_address'];
	  $lec_phone=$c['std_number'];
	  $lec_username=$c['std_username'];
	  
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
  <p>
    
 
  </p>
  <table width="475" height="497" border="0">
    <tr>
      
      <td width="136" height="53">&nbsp;</td>
       <td width="329" height="53"><img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="120" height="120" /><?php echo $num_rows; ?>&nbsp;</td>
    </tr>
    <tr>
      <td height="55">NAME</td>
      <td width="329"><?php echo $lec_fname;?>&nbsp;<?php echo $lec_lname; ?></td>
    </tr>
    <tr>
      <td height="56">GENDER</td>
      <td><?php echo $lec_gender;?></td>
    </tr>
    <tr>
      <td height="54">DATE OF BIRTH</td>
      <td><?php echo $lec_dob;?></td>
    </tr>
    <tr>
      <td height="53">PHONE NUMBER</td>
      <td><?php echo $lec_phone;?></td>
    </tr>
    <tr>
      <td height="47">EMAIL</td>
      <td><?php echo $lec_email;?></td>
    </tr>
    <tr>
      <td height="71">USERNAME</td>
      <td><?php echo $lec_username;?></td>
    </tr>
    <tr>
    <td></td> <td width="329" height="53">
    <input type="submit" name="other" value="Other Details" />&nbsp;&nbsp;
   <a href="profileedit.php"> <input type="button" name="next" value="EDIT PROFILE" />
   </a>
    <input type="reset" name="cancel" value="Cancel" />
    </td>
    </tr>
    </table>
  
 </center>
</form>
</body>
</html>
