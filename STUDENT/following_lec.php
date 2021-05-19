<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);
include("header.php");

session_start();
$std=$_SESSION['user_id'];

	
?>
<form method="post">
	<center><font color="blue" size="10"><b>FOLLOWING LECTURES</b></font></center><p>
		<br>
		<br>
        <br>
		<br>
		

	<table width="181" border="1" cellspacing="5">
<?php
$selectquery="select * from tbl_request r inner join tbl_lecture lc on r.lec_id=lc.lec_id where std_id='".$std."'";
  $b=mysql_query($selectquery);
  while($c=mysql_fetch_array($b))
  {
?>

  <?php
  
  	 $i=$i+1;
	  $lec_id=$c['lec_id'];
	  $lec_pic=$c['lec_pic']; 
	  $lec_fname=$c['lec_fname'];
	  $lec_lname=$c['lec_lname'];
	  $lec_email=$c['lec_username'];
	  $_SESSION['lec_id']=$lec_id;
       $result = mysql_query("select avg(rate) FROM tbl_rate where lec_id='".$lec_id."'");
$row = mysql_fetch_array($result);
$total = $row[0];
 $rst = mysql_query("select count(*) FROM tbl_rate where lec_id='".$lec_id."'");
$ro = mysql_fetch_array($rst);
$to = $ro[0];
	  if($i==1)
	  {
		  echo "<tr>";
	  
	  }
   ?> 
      
      <a href="view;ec.php?editid=<?php echo $lec_id;?>">
      <td width="140"><center><a href="viewlec.php?lec_id=<?php echo $lec_id;?>"><img src="../GUEST/uploads/<?php echo $lec_pic; ?>" width="200" height="200" />
    <font color="red" size="+1"><?php echo $lec_fname; ?>&nbsp;
     <?php echo $lec_lname; ?></font><p>
     </font><font color="red" size="+1"><?php echo $lec_email; ?></font><p>
     	<font color="green" size="+3"><b><?php echo $total; ?><img src="../STUDENT/Solid_Bright_Green_Star_1.png" width="30" height="30"> </b></font><br>
          <font color="green" size="+1"><?php echo $to; ?>&nbsp;review</font><p>
     </a>
     </center>
	</td>

    
 <?php
	  if($i==5)
	  {
		  echo "</tr>";
		  echo "</tr><td colspan='5'><hr></td></tr>";
		  
		  $i=0;
	  }
      
     ?> 
     <?php
  }
	 ?>
	 </table>
     </form>
	 </body>
     </html>