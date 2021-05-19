
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "elearning");
$output = '';
session_start();
?>
<html>
<form method="get">
<?php
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect,$_POST["query"]);
 $query = "
 select * from tbl_lecsub p inner join tbl_lecture lc on p.lec_id=lc.lec_id inner join tbl_university u on p.unv_id=u.unv_id inner join tbl_cos c on p.cor_id=c.cor_id inner join tbl_subcourse su on p.su_id=su.su_id inner join tbl_subject sub on p.sub_id=sub.sub_id where 
  univesity LIKE '%".$search."%' 
  OR course LIKE '%".$search."%' 
  OR sub_course LIKE '%".$search."%'
  OR subject LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  select * from tbl_lecture order by lec_fname
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 echo '
 
 <table class="table table bordered" cellspacing="15">';
 while($row = mysqli_fetch_array($result))
 {
	
   $i=$i+1;
    if($i==1)
	  {
		  echo "<tr>";
		  
		  
	  }
	 ?>
          
          <?php 
		  echo '<td>';
		  $_SESSION['lec_id']=$row["lec_id"];
		  ?>
          <a href="view.php?editid=<?php echo $_SESSION['lec_id'];?>">
          <?php
  echo '
    <img src="../GUEST/uploads/'.$row["lec_pic"].'" width="200" height="150">
    ';
	?>
    </a>
    <?php
	echo'
  <h3>'.$row["lec_fname"].'
    '.$row["lec_lname"].'</h3><p>
	Username:'.$row["lec_username"].'<p>
	'.$row["subject"].'<p>
	
	';?> 
	 </td>
   
 
 
 
  <?php
  if($i==4)
	  {
		  echo "</tr>";
		  echo "</tr><td colspan='5'><hr></td></tr>";
		  
		  $i=0;
	  }
 }
 
}
else
{
 echo 'Data Not Found';
}

?>
</form>
</html>