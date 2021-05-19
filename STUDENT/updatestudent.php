<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");
if(isset($_POST['btnsubmit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$contact=$_POST['number'];
	$password=$_POST['password'];
	$question=$_POST['questions'];
	$username=$_POST['username'];
	$answer=$_POST['answer'];	
	$a=date("Y-m-d");
	$iname=$_FILES["uimg"]["name"];
	$ftemp=$_FILES["uimg"]["tmp_name"];
	$new_iname=time().$iname;
	move_uploaded_file($ftemp,"../ELEARNING/uploads/".$new_iname);
	$dob=$_POST['txtdob'];
	$sysdate = date('Y-m-d');
	$b=0;
	if($sysdate<$dob)
	{
		 "<script>alert('You have entered an invalid DAte of Birth!')</script>";
	}
	else
	{
	
	$insertquery="insert into tbl_user(lec_pic,lec_fname,lec_lname,lec_gender,lec_dob,lec_address,lec_email,lec_phone,lec_username,lec_password,lec_question,lec_answer,lec_status,)values('".$new_iname."','".$fname."','".$lname."','".$gender."','".$dob."','".$address."',,'".$email."','".$contact."','".$username."','".$password."','".$question."','".$answer."','".$b."')";
	mysql_query($insertquery);
	//echo $insertquery;
	echo "<script>alert('ACCOUNT CREATED')</script>";
	
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
<form id="form1" name="form1" method="post" action="../../GUEST/qualfication.php">
<center>
  <table width="763" height="644" border="1">
    <tr>
      <td width="347" height="53"><div align="center">PROFILE PICTURE</div></td>
      <td width="400"><input type="file" name="ppic" required="required" /></td>
    </tr>
    <tr>
      <td height="86"><div align="center">FIRST NAME</div></td>
      <td><label for="fnid"></label>
      <input type="text" name="fname" id="fnid" required="required" /></td>
    </tr>
    <tr>
      <td height="51"><div align="center">SECOND NAME</div></td>
      <td><input type="text" name="lname" id="fnid2" required="required" /></td>
    </tr>
    <tr>
      <td height="41"><div align="center">GENDER</div></td>
      <td><input type="radio" name="gender" id="radio" value="MALE" />
      MALE
         <input type="radio" name="gender" id="radio" value="FEMALE"  /><label>FEMALE</label>      
        
</td>
    </tr>
    <tr>
      <td height="45"><div align="center">DATE OF BIRTH</div></td>
      <td><input type="date" name="dob" required="required" />&nbsp;</td>
    </tr>
   
    <tr>
      <td><div align="center">COMMUNCATION ADDRESS</div></td>
      <td><textarea name="address" required="required"></textarea >&nbsp;</td>
    </tr>
    <tr>
      <td height="41"><div align="center">MOBILE NUMBER</div></td>
      <td><input type="number" name="number" required="required" />&nbsp;</td>
    </tr>
    <tr>
      <td height="47"><div align="center">EMAIL ID</div></td>
      <td><input type="email" name="email" required="required" />&nbsp;</td>
    </tr>
     <tr>
      <td height="43"><div align="center">CREATE USERNAME</div></td>
      <td><label for="textfield"></label>
        <input type="text" name="username" id="username" />        &nbsp;</td>
    </tr>
   <tr>
      <td height="43"><div align="center">CREATE PASSWORD</div></td>
      <td><input type="password" name="password" />
      </td>
    </tr>
    <tr>
      <td height="43"><div align="center">RETYPE PASSWORD</div></td>
      <td><input type="password" name="repassword" /></td>
    </tr>
    <tr>
      <td height="43"><div align="center">SECURITY QUESTION</div></td>
      <td><select name="questions">
      <option>select</option>
      <option></option></select>&nbsp;</td>
    </tr>
    <tr>
      <td height="43"><div align="center">SECURITY ANSWER</div></td>
      <td><input type="text" name="answer" /></td>
    </tr>
    <tr>
    <tr>
      <td></td>
      <td><input type="submit" value="UpdATE" name="submit" />&nbsp;<input type="reset" value="Cancel" /></td>
    </tr>
  </table>
  </center>
</form>
</body>
</html>
