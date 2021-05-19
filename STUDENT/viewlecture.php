<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");
session_start();

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">
function showcourse(univ_Id)
{
document.frm.submit();
}

function showspecial(course_id)
{
document.frm.submit();
}
function showsubj(special_id)
{
	document.frm.submit();
}
</script>
</head>

<body>
<form method="post" enctype="multipart/form-data" name="frm" id="frm">
<tr>
<td width="119">University</td>
<td width="371">
<select name="univ_Id" id="univ_Id" onChange="showcourse(this.value);">
<option value="">--Select--</option>
<?php
$sql1="select * from tbl_university";
$sql_row1=mysql_query($sql1);
while($sql_res1=mysql_fetch_assoc($sql_row1))
{
?>
<option value="<?php echo $sql_res1["unv_id"]; ?>" <?php if($sql_res1["unv_id"]==$_REQUEST["univ_Id"]) { echo "Selected"; } ?>><?php echo $sql_res1["univesity"]; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>Course</td>
<td id="td_state">
<select name="course_id" id="course_id" onChange="showspecial(this.value);">
<option value="">--Select--</option>
<?php
$sql="select * from tbl_cos where unv_id='$_REQUEST[univ_Id]'";
$sql_row=mysql_query($sql);
while($sql_res=mysql_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["cor_id"]; ?>" <?php if($sql_res["cor_id"]==$_REQUEST["course_id"]) { echo "Selected"; } ?>><?php echo $sql_res["course"]; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>Spacialized</td>
<td id="td_city">
<select name="special_id" id="special_id" onChange="showsubj(this.value);">
<option value="">--Select--</option>
<?php
$sql="select * from tbl_subcourse where cor_id='$_REQUEST[course_id]'";
$sql_row=mysql_query($sql);
while($sql_res=mysql_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["su_id"]; ?>" <?php if($sql_res["su_id"]==$_REQUEST["special_id"]) { echo "Selected"; } ?>><?php echo $sql_res["sub_course"]; ?></option>
<?php
}
?>
</select>Subject
<select name="subject_id" id="subject_id">
<option value="">--Select--</option>
<?php
$sql="select * from tbl_subject where su_id='$_REQUEST[special_id]'";
$sql_row=mysql_query($sql);
while($sql_res=mysql_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["sub_id"]; ?>"><?php echo $sql_res["semester"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><?php echo $sql_res["subject"]; ?></option>
<?php
}
?>
</select><p>
<center>
<input type="submit" name="lecture" value="view" />
</center>
<?php
$univ=$_POST['univ_Id'];
$cor=$_POST['course_id'];
$sub=$_POST['special_id'];
$subj=$_POST['subject_id'];
if(isset($_POST['lecture']))
{
  $selectquery="select * from tbl_lecsub p inner join tbl_lecture lc on p.lec_id=lc.lec_id where unv_id='".$univ."' and cor_id='".$cor."' and su_id='".$sub."' and sub_id='".$subj."' ";
  $b=mysql_query($selectquery);
  while($c=mysql_fetch_array($b))
  {
	  $lec_id=$c['lec_id'];
	  $lec_pic=$c['lec_pic']; 
	  $lec_fname=$c['lec_fname'];
	  $lec_lname=$c['lec_lname'];
	  $lec_email=$c['lec_username'];
	  $amnt=$c['amount'];
	  $_SESSION['lec_id']=$lec_id;
   ?> 
      <br />
       <br />
      <table width="181" border="1">
      <tr><td width="140"><center><img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="100" height="100" /></center></td></tr>
      <tr><td><?php echo $lec_fname; ?>&nbsp;
     <?php echo $lec_lname; ?></td></tr>
      <tr><td>USERNAME:<?php echo $lec_email; ?></td></tr>
       <tr><td>Amount(per class):
      <?php echo $amnt; ?></td></tr>
      <tr>
     
      <td width="140">
       <a href="view.php?editid=<?php $_SESSION['lec_id'] ;?>">
     VIEW</a>
	

           
     
      </td>
      </tr>
 
      </table>
      
     <?php
  }
  }
	 ?></form> 
</body>
</html>