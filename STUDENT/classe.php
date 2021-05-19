<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");
session_start();
$usrid=$_SESSION['user_id'];
$_SESSION['u_id']=$usrid;
$le=$_GET['lec_id'];
$sql="select * from tbl_lecture where lec_id='".$le."'";
$sql_row=mysql_query($sql);
$c=mysql_fetch_array($sql_row);
$lec_pic=$c['lec_pic'];
$lec_fname=$c['lec_fname'];
  $lec_lname=$c['lec_lname'];
  $lec_username=$c['lec_username'];
  
    
  
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<!-- Copyright 2000-2006 Adobe Macromedia Software LLC and its licensors. All rights reserved. -->
<style type="text/css">
  .animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
.card{
  border: 5px solid #f1f1f1;
       width:700px;
       height:500px;
      }
 .ad {
  position: absolute;
  right: 220px;
  top: 200px;
  color: blue;
  font-size: 18px;
  font-weight: bold;
}

</style>
</head>

<body><form action="" method="post">
  <center>
    <?php
if($_GET['eletid'])
{  
  $id=$_GET['eletid'];
  $qry="select * from tbl_video p inner join tbl_subject su on p.sub_id=su.sub_id where vid_id='".$id."'";
  $gls=mysql_query($qry);
$ftc=mysql_fetch_array($gls);
$vid=$ftc['vid_id'];           
   $vd=$ftc['vid_no'];
    $vvideo=$ftc['video'];
    $vm=$ftc['vid_dis'];
    $lec_id=$ftc['lec_id'];
    $subject=$ftc['$subject'];
    $result = mysql_query("SELECT * FROM tbl_view where std_id='".$_SESSION['user_id']."'" ,$con);
$num_rows = mysql_num_rows($result);
$result1 = mysql_query("SELECT * FROM tbl_payment where std_id='".$_SESSION['user_id']."' and vid_id='".$vid."'" ,$con);
$num_rows1 = mysql_num_rows($result1);
 
if(($num_rows<="7")||($num_rows1=="1"))
{ 
  $insert="insert into tbl_view(std_id,vid_id)values('".$_SESSION['user_id']."','".$vid."')";
mysql_query($insert);
    ?>
    <div class="animate">
    <div class="card">
      <div align="right"><a href="classe.php?lec_id=<?php echo $lec_id;?>"><font size="+3">X</font></a></div>

    <center>
         <?php
$resu = mysql_query("SELECT * FROM tbl_view where std_id='".$_SESSION['user_id']."'" ,$con);
$num = mysql_num_rows($resu);
          ?>
          <?php
          if($num<="7")
          {
            $r=7-$num;
           ?> 
           <font size="+2" color="red">REMAINING FREE CLASS:<?php echo $r; ?></font>
           <?php
}
?>      <video  controls width="400px" height="300px">
  <source src="../LECTURE/tutorial/<?php  echo $vvideo;?>">
</video><br />
      
            
              <?php echo $vd;?>
            
               
       <?php echo $vm;?><p>
       <?php echo $subject;?>
    </div>
  </div>
</center>
    <?php
  }
  else
  {
  ?>
  <div class="animate">
    <div class="card">
<div class="ad">
      YOUR FREE CLASS IS COMPLETED<p>

  <a  href="payment.php?vid_id=<?php echo $vid;?>"> CLICK FOR CONTINUE</a></div>
  <div align="right"><a href="classe.php?lec_id=<?php echo $lec_id;?>"><font size="+3">X</font></a></div>

</div>
</div>
  <?php
    }
    ?>

    <?php
    }
    else
    {
    ?>

    <img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="120" height="120"><p>
    <font color="red" size="5"><b><?php echo $lec_fname ?>&nbsp;<?php echo $lec_lname ?><p>
 <?php echo $lec_username; ?></b></font><p>


    <br>

<select name="subject_id" id="subject_id">
<option value="">--Select Subject--</option>
<?php
$le=$_GET['lec_id'];
$sql="select * from tbl_lecsub p inner join tbl_subject su on p.sub_id=su.sub_id where lec_id='".$le."'";
$sql_row=mysql_query($sql);
while($sql_res=mysql_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["lecsub_id"]; ?>"><?php echo $sql_res["semester"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; ?><?php echo $sql_res["subject"]; ?></option>
<?php
}
?>
</select>
<b><input type="submit" name="submit" value="SELECT" /></b>
</center>
<br><br><br><br>
<table width="182" height="192" border="1" cellpadding="3" cellspacing="15">
   <?php 
   if(isset($_POST['submit']))
{
	$le=$_GET['lec_id'];
	$sub=$_POST['subject_id'];
  $stus=1;
  $galselectquery="select * from tbl_video where sub_id='".$sub."' and lec_id='".$le."' and vid_status='".$stus."'";

  $gl=mysql_query($galselectquery);
  ?>
    <?php
  while($gal=mysql_fetch_array($gl))
  {
	 $i=$i+1;
	 
	 
	$gid=$gal['vid_id'];           
	 $d=$gal['vid_no'];
	  $video=$gal['video'];
	  $m=$gal['vid_dis'];
	  if($i==1)
	  {
		  echo "<tr>";
	  }
	  ?>
<td width="171" colspan="2">  <center> <a href="classe.php?eletid=<?php echo $gid;?>" class="notification"> 
  <img src="Interactivity-in-E-learning-videos.png" width="220" height="120">
  </video><br />
      
       			
       				VIDEO_NO:<?php echo $d;?>
       			
               
       <?php echo $m ;?>

     </center>
      </a> </td>
      <?php
	  if($i==5)
	  {
		  echo "</tr>";
		  echo "</tr><td colspan='5'><hr></td></tr>";
		  
		  $i=0;
	  }
  }
  }
}?>
 
 </table>
  
</form>
</body>
</html>

