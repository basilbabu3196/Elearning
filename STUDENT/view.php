<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
session_start();
include("header.php");

$id=$_GET['editid'];
$selectquery="select * from tbl_lecture where lec_id='".$id."'";
  $b=mysql_query($selectquery);
  $c=mysql_fetch_array($b);
       $lec_id=$c['lec_id'];
	  $lec_pic=$c['lec_pic']; 
	  $lec_fname=$c['lec_fname'];
	  $lec_lname=$c['lec_lname'];
	  $lec_email=$c['lec_email'];
	  $lec_gender=$c['lec_gender'];
	  $lec_dob=$c['lec_dob'];
	  $lec_address=$c['lec_address'];
	  $lec_phone=$c['lec_phone'];
	  $lec_username=$c['lec_username'];
	  $result = mysql_query("SELECT * FROM tbl_request where lec_id='".$id."'" ,$con);
$num_rows = mysql_num_rows($result);
	  if(isset($_POST['request']))
{
	if($num_rows>0)
	{
		echo "<script>alert('REQUEST IS Already Send');</script>";
	}
	else
	{
	$status=0;
	$std=$_SESSION['user_id'];
		
	$insertquery="insert into tbl_request(lec_id,std_id,request_status)values('".$id."','".$std."','".$status."')";
	mysql_query($insertquery);
	echo "<script>alert('REQUEST IS SEND');</script>";
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
  <p>
   <?php
   $id=$_GET['editid'];
   $result = mysql_query("select avg(rate) FROM tbl_rate where lec_id='".$id."'");
$row = mysql_fetch_array($result);
$total = $row[0];
 $rst = mysql_query("select count(*) FROM tbl_rate where lec_id='".$id."'");
$ro = mysql_fetch_array($rst);
$to = $ro[0];
$rqst = mysql_query("select count(*) FROM tbl_request where lec_id='".$id."'");
$rst = mysql_fetch_array($rqst);
$rt = $rst[0];
   ?> 
 
  </p>
  <table width="475" height="497" border="0">
    <tr>
      
      
       <img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="180" height="180" />&nbsp;</tr><p>
      <tr> <td>Rating,Review,Followers</td><td><font color="green" size="+3"><b><?php echo $total; ?><img src="../STUDENT/Solid_Bright_Green_Star_1.png" width="30" height="30"> </b></font>&nbsp;,
          <font color="red" size="+1"><?php echo $to; ?>&nbsp;review,</font><font color="blue" size="+1"><?php echo $rt; ?>Followers</font><p>
    </td></tr>
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
    <td>
    <input type="submit" name="other" value="CLICK FOR Other Details" />
    </td>
    <td>
    &nbsp;<input type="submit" name="request" value="Class Request" />
    <input type="reset" name="cancel" value="Cancel" />
    </td>
    </tr>
    </table>
    <?php
if(isset($_POST['other']))
{
 ?>
    <?php $selectq="select * from tbl_qulification q inner join tbl_university u on q.unv_id=u.unv_id inner join tbl_cos c on q.cor_id=c.cor_id inner join tbl_subcourse s on q.su_id=s.su_id where lec_id='".$id."'";
  $h=mysql_query($selectq);
  while($f=mysql_fetch_array($h))
  {
	  $ql_type=$f['ql_type'];
	  $ql_date=$f['ql_date'];
	  $ql_mark=$f['ql_mark'];
	  $univesity=$f['univesity'];
	  $course=$f['course'];
	  $sub_course=$f['sub_course'];
?>
<p>
<font color="#00FF33" size="+3">Qulification</font><p>
<font color="#003399" size="+3"><?php echo $ql_type; ?></font>
<table width="413" height="209" border="0">
<tr>
<td width="122">University</td>
<td><?php echo $univesity; ?>
</td>
</tr>
<tr>
<td>Course</td>
<td width="106"><?php echo $course; ?></td>
</tr>
<tr>
<td>Subject</td>
<td><?php echo $sub_course; ?></td>
</tr>
<tr>
<td>Mark</td>
<td><?php echo $ql_mark; ?></td>
</tr>
<tr>
<td>Year of Passing</td>
<td><?php echo $ql_date; ?></td>
</tr>
</table>
<br />
<br />
<br />
<br />
<?php
	  
  }
  
 ?>
 <?php $selectq="select * from tbl_experience where lec_id='".$id."'";
  $h=mysql_query($selectq);
  while($f=mysql_fetch_array($h))
  {
	  $exp_type=$f['exp_type'];
	  $exp_from =$f['exp_from '];
	  $exp_to =$f['exp_to'];
	  $exp_institution=$f['exp_institution'];
	  $exp_designation=$f['exp_designation'];
	 
?>
<p>
<font color="#00FF33" size="+3">JOB EXPERIONS</font><p>
<font color="#003399" size="+3"><?php echo $exp_type; ?></font>
<table width="413" height="209" border="0">
<tr>
<td width="122">DATE OF PERIOD</td>
<td><?php echo $exp_from; ?>&nbsp&nbsp<?php echo $exp_to; ?>
</td>
</tr>
<tr>
<td>Institution/Company name</td>
<td width="106"><?php echo $exp_institution; ?></td>
</tr>
<tr>
<td>Designation</td>
<td><?php echo $exp_designation; ?></td>
</tr>
<tr>

</table>
<br />
<br />
<br />
<br />
<?php
	  
  }
}
  
 ?>
 </center>
</form>
</body>
</html>