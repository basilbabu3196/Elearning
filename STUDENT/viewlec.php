<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
session_start();
include("header.php");
if(isset($_POST['rating']))
{
  $lecs=$_GET['lec_id'];
$std=$_SESSION['user_id'];
  $rate=$_POST['rate'];
  $comment=$_POST['comment'];
  $status=0;
   /*?>$select="select count from tbl_lecsub where sub_id='".$subj."'";
  $m=mysql_query($select);<?php 
  */
$insertquery="insert into tbl_rate(rate,comment,lec_id,std_id)values('".$rate."','".$comment."','".$lecs."','".$std."')";
  mysql_query($insertquery);
  echo"<script>alert('Thank You');</script>";
  }
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <title>Rating System</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
<form method="post">

  <p>
    
 
  </p>
  <?php
  $lid=$_GET['lec_id'];
  $result = mysql_query("select count(*) FROM tbl_rate where lec_id='".$lid."'");
$row = mysql_fetch_array($result);

$total = $row[0];
if($total>=1)
{
$id=$_GET['lec_id'];
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
    
  ?>
  <center>
  <table width="475" height="497" border="0">
    <tr>
      
      <td width="136" height="53">&nbsp;</td>
       <td width="329" height="53"><img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="120" height="120" />&nbsp;</td>
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
    <td>
    </td>
    <td>
    &nbsp;
    
    </td>
    </tr>
    </table>
    </center>
    <?php
    }
    else
{
    ?>

    <div class="rating-box">
    <h1>Please Give Mark for This Lecture</h1>
    <h2><font size="3">(Understanding,Effisency,Explanations,Style of teaching,Other Activities)</font></h2>
      RATE:<div class="ratings">
         <span class="fa fa-star-o"></span>
         <span class="fa fa-star-o"></span>
         <span class="fa fa-star-o"></span>
         <span class="fa fa-star-o"></span>
         <span class="fa fa-star-o"></span>
      </div></center>
      <input type="hidden" name="rate" id="rating-value">
      <p>
        <br>
        Feedback<p>
        <textarea name="comment"></textarea><br>
      <input type="submit" name="rating" value="submit">
 </div>

<script src="script.js"></script>
<?php
}
?>
 
</form>
</body>
</html>