<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
session_start();
$lec=$_SESSION['user_id'];
include("header.php");
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
if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$address=$_POST['address'];
	$number=$_POST['number'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$questions=$_POST['questions'];
	$answer=$_POST['answer'];
	$iname=$_FILES["ppic"]["name"];
	$ftemp=$_FILES["ppic"]["tmp_name"];
	$new_iname=time().$iname;
  $lec=$_SESSION['user_id'];
	move_uploaded_file($ftemp,"../GUEST/uploads/".$new_iname);
	$update="update tbl_student set std_pic='".$new_iname."',std_fname='".$fname."',std_lname='".$lname."',std_gender='".$gender."',std_address='".$address."',std_dob='".$dob."',std_email='".$email."',std_number='".$number."' where std_id='".$lec."'"; 
		
		
		mysql_query($update);
	echo "<script>alert('UPDATE');</script>";
	}
	?>
	<html>
    <head>
    </head>
    <body>
    <form action="" method="post" name="frm" id="frm" enctype="multipart/form-data">
<div class="fon">
<center>
    <table border="0" cellspacing="30">
    <tr>
    <td height="135">
    </td>
    <td>
    <img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="120" height="120" />
    </td>
    </tr>
    <tr>
    <td height="168">PROFILE PICTURE </td>
    <td><input type="file" name="ppic" required />
     </td></tr>
    <tr>
      <td height="64">NAME</td>
      <td><label for="fnid"></label>
        <input type="text" name="fname" id="fnid" value="<?php echo  $lec_fname; ?>" required placeholder="First Name"/>
        <br />
    <br />
     <input type="text" name="lname" id="fnid2" value="<?php echo  $lec_lname; ?>" placeholder="Last Name" required /></td>
    </tr>
    <tr>
      <td height="66">GENDER</td>
      <td><input type="radio" name="gender" id="gender" value="MALE" />
      MALE
         <input type="radio" name="gender" id="gender" value="FEMALE"  /><label>FEMALE</label>      
        
</td>
    </tr>
    <tr>
      <td height="45">DATE OF BIRTH</td>
      <td><input type="date" name="dob" required value="<?php echo  $lec_dob; ?>" placeholder="dd/mm/yyyy"/>&nbsp;</td>
    </tr>
   
    <tr>
      <td height="78">COMMUNCATION<p>ADDRESS</td>
      <td><textarea name="address" required placeholder="Address"><?php echo  $lec_address; ?></textarea >&nbsp;</td>
    </tr>
    
<tr>
<td height="76">
MOBILE NUMBER
</td><td><input type="number" name="number" value="<?php echo  $lec_phone; ?>" required placeholder="MOBILE NUMBER" /></td>
</tr>
<tr>
<td height="72">
EMAIL ID
</td><td><input type="email" name="email" value="<?php echo  $lec_email; ?>" placeholder="EMAIL ID" required></td>
</tr>
<tr>

<td>

</td><td>&nbsp;<input type="submit" class="button" name="submit" value="EDIT">&nbsp;&nbsp;<input type="reset" value="Cancel" class="cancel"></td>
</tr>
    </table>
    </center>
  </div>
    </form>
    
    </body>
    </html>