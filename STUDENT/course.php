<?php
include("header.php");
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);

session_start();
$std=$_SESSION['user_id'];
$cors=$_POST['course_id'];
$result = mysql_query("SELECT * FROM tbl_qulifystudent where std_id='".$std."' and cor_id='".$cors."'" ,$con);
$num_rows = mysql_num_rows($result);

if(isset($_POST['submited']))
{ 
if($num_rows>1)
{
	echo "<script>alert('ALREADY INSERTED');</script>";
}
else
{
$dedit=$_GET['editid'];
	if($dedit=="")
	{
	$srm=$_POST['stream'];
	$level=$_POST['level'];
	$inst=$_POST['institute'];
	$mark=$_POST['mark'];
	$year=$_POST['year'];
	$sub=$_POST['special_id'];
	
	$univ=$_POST['univ_Id'];
	 /*?>$select="select count from tbl_lecsub where sub_id='".$subj."'";
  $m=mysql_query($select);<?php */
  
$insertquery="insert into tbl_qulifystudent(qlf_level,cor_id,su_id,unv_id,qlf_institute,qlf_stream,qlf_date,qlf_mark,std_id)values('".$level."','".$cors."','".$sub."','".$univ."','".$inst."','".$srm."','".$year."','".$mark."','".$std."')";
	mysql_query($insertquery);
	echo"<script>alert('SAVED');</script>";
	}

}
}
if($_GET['editid'])
{
	$f=$_GET['editid'];
	$g="select * from tbl_qulifystudent p inner join tbl_university c on p.unv_id=c.unv_id inner join tbl_cos l on p.cor_id=l.cor_id inner join tbl_subcourse su on p.su_id=su.su_id where std_id='".$std."'";;
	$h=mysql_query($g);
	$i=mysql_fetch_array($h);
	 $Qqlf_id=$i['qlf_id'];
	  $Qqlf_level=$i['qlf_level']; 
	  $Qunivesity=$i['univesity'];
	  $Qcourse=$i['course'];
	  $Qsub_course=$i['sub_course'];
	  $Qqlf_institute=$i['qlf_institute'];
	  $Qqlf_stream=$i['qlf_stream'];
	  $Qqlf_date=$i['qlf_date'];
	  $Qqlf_mark=$i['qlf_mark'];
	
}
if($_GET['deleteid'])
{
	$x=$_GET['deleteid'];
	$y="delete from tbl_qulifystudent where qlf_id='".$x."'";
	mysql_query($y);
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
</script>
</head>
<body>
<center>
<form action="" method="post" name="frm" id="frm">
<table width="500" border="0" cellpadding="15">
<tr>
<td>
Qulification Level
</td>
<td>
<select name="level"><option><?php if($Qqlf_level==""){echo "SELECT";}else {echo $Qqlf_level;} ?></option>
<option>10TH</option>
<option>12TH</option>
<option>UG</option>
<option>PG</option>
</select>
</td>
</tr>
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
<select name="special_id" id="special_id" >
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
</select>
</td>
</tr>
<tr>
<td>
Stream
</td>
<td>
<select name="stream">
<option><?php if($Qqlf_stream==""){echo "SELECT";}else {echo $Qqlf_stream;} ?></option>

<option>Regular</option>
<option>DST Education</option>
<option>Private</option>
</select>
</td>
</tr>
<tr>
<td>
Name and Address of institute
</td>
<td>
<textarea name="institute" >
<?php echo $Qqlf_institute; ?>
</textarea>
</td>
</tr>
<tr>
<td>
Mark obtained
</td>
<td>
<input type="text" name="mark" value="<?php echo $Qqlf_mark; ?>" />

</td>
</tr>
<tr>
<td>
Month and Year of passing
</td>
<td>
<input type="date" name="year" value="<?php echo $Qqlf_date; ?>" />

</td>
</tr>
<tr>
<td>
</td>
<td>
<input type="submit" name="submited" value="Submit" />&nbsp;&nbsp;&nbsp;<input type="reset" value="Cancel" />
</td>
</tr>
</table>
<p>
<p>
<p>
</center>
 <?php
  $selectquery="select * from tbl_qulifystudent p inner join tbl_university c on p.unv_id=c.unv_id inner join tbl_cos l on p.cor_id=l.cor_id inner join tbl_subcourse su on p.su_id=su.su_id where std_id='".$std."'";
  $b=mysql_query($selectquery);
  while($c=mysql_fetch_array($b))
  {
	  $qlf_id=$c['qlf_id'];
	  $qlf_level=$c['qlf_level']; 
	  $univesity=$c['univesity'];
	  $course=$c['course'];
	  $sub_course=$c['sub_course'];
	  $qlf_institute=$c['qlf_institute'];
	  $qlf_stream=$c['qlf_stream'];
	  $qlf_date=$c['qlf_date'];
	  $qlf_mark=$c['qlf_mark'];
  
	  ?> 
      <br />
       <br />
        
      <font style="color:#F00" size="+5">
      <?php echo $qlf_level; ?></font>
      <table border="0">
      <tr><td>Qulification Level</td><td><?php echo $qlf_level; ?></td></tr>
      <tr><td>University</td><td><?php echo $univesity; ?></td></tr>
      <tr><td>Course</td><td><?php echo $course; ?></td></tr>
      <tr><td>Specialized</td><td><?php echo $sub_course; ?></td></tr>
      <tr><td>Stream</td><td><?php echo $qlf_institute; ?></td></tr>
      <tr><td>Institute</td><td><?php echo $qlf_stream; ?></td></tr>
      <tr><td>Mark</td><td><?php echo $qlf_mark; ?></td></tr>
      <tr><td>year of Passing</td><td><?php echo $qlf_date; ?></td></tr>
      <tr>
      <td></td>
      <td>

     
            <a href="course.php?deleteid=<?php echo $qlf_id ;?>">

      delete
      </a>
      </td>
      </tr>
      </a>
      </table>
      
     <?php
  }
	 ?>
    
</form>
  </body>
  </html>