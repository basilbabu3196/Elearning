<?php
include("database.php");
include("header.php");

session_start();

$std=$_SESSION['std_id'];

?>
<html>
<head>
<div align="right"><a href="../home.php" style="color:#0C6;">HOME</a>,<a href="index.php" style="color:#0C6;">BACK</a></div>
</head>
<body>
<div align="center"><font color="#FF0000" size="+4">REVIEW QUESTION</font></div>
<form method="post">

<?php
$tid=$_GET['editid'];
$std=$_SESSION['std_id'];
$selecter="select * from mst_useranswer where test_id='".$tid ."' and std_id='".$std."'";
$rs=mysql_query($selecter,$cn);
$k=1;
while($i=mysql_fetch_array($rs))
{
	
	$option1=$i['ans1'];
	$question=$i['que_des'];
	$option2=$i['ans2'];
	$option3=$i['ans3'];
	$option4=$i['ans4'];
	$currect=$i['true_ans'];
	$yourans=$i['your_ans'];
	
?>
 


<?php echo $k;?>.
<table width="404" border="0" cellspacing="4">
<tr>
<th width="130">Question</th>
<td width="66">
<?php echo $question; ?>
</td>
</tr>
<tr>
<th>Option1
</th>
<td><?php echo $option1; ?>
</td>
</tr>
<tr>
<th>Option2
</th>
<td><?php echo $option2; ?>
</td>
</tr>
<tr>
<th>Option 3
</th>
<td><?php echo $option3; ?>
</td>
</tr>
<tr>
<th>Option 4
</th>
<td><?php echo $option4; ?>
</td>
</tr>
<tr>
<th>Currect Answer
</th>
<td><font color="#00CC33" size="+2">Option<?php echo $currect; ?></font>
</td>
</tr>
<tr>
<th>Your Answer
</th>
<td><font color="#666666" size="+2">Option<?php echo $yourans; ?>
<?php
if($currect==$yourans)
{
	echo '&nbsp;&nbsp;<font color="#009933" size="+1">CURRECT</font>';
}
else
{
	echo '&nbsp;&nbsp;<font color="#FF0000" size="+1">CURRECT</font>';
}
 ?></font>
</td>
</tr>
</table>
<?php 
$k=$k+1;
?>
</li>
</ol>
<br>
<br>
<br>
<br>
<br>

<?php

}
?>
</table>
</form>
</body>
</html>