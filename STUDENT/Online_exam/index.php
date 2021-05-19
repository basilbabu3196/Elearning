<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Welcome to Online Exam</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
include("header.php");
?>
<div align="right"><a href="../home.php" style="color:#09C;">HOME</a></div>
<?php
include("database.php");
$lec=$_SESSION['std_id'];
extract($_POST);


if($_GET['nextid'])
{
  ?>

<h1 class='style8' align=center>Welcome to Online Exam</h1>";
		<table width="28%"  border="0" align="center">
  <tr>
    <td width="7%" height="65" valign="bottom"><img src="image/HLPBUTT2.JPG" width="50" height="50" align="middle"></td>
    <td width="93%" align="bottom" bordercolor="#0000FF"> <a href="sublist.php" class="style4"> SUBJECT </a></td>
  </tr>
  <tr>
    <td height="58" valign="bottom"><img src="image/DEGREE.JPG" width="43" height="43" align="absmiddle"></td>
    <td valign="bottom"> <a href="result.php" class="style4">Result </a></td>
  </tr>
</table>';
   <?php 
		exit;
		}



?>
<table width="100%" border="0">
  <tr>
    <td width="70%" height="25">&nbsp;</td>
    <td width="1%" rowspan="2" bgcolor="#CC3300"><span class="style6"></span></td>
    <td width="29%" bgcolor="#CC3333"><div align="center" class="style1"></div></td>
  </tr>
  <tr>
    <td height="296" valign="top"><div align="center">
        <h1 class="style8">Welcome to Online ExAM</h1>
      <span class="style5"><img src="image/paathshala.jpg" width="129" height="100"><span class="style7"><img src="image/HLPBUTT2.JPG" width="50" height="50"><img src="image/BOOKPG.JPG" width="43" height="43"></span>        </span>
        <param name="movie" value="english theams two brothers.dat">
        <param name="quality" value="high">
        <param name="movie" value="Drag to a file to choose it.">
        <param name="quality" value="high">
        <param name="BGCOLOR" value="#FFFFFF">
<p align="left" class="style5">&nbsp;</p>
      <blockquote>
          <p align="left" class="style5"><span class="style7">Wel Come to Online 
            exam. This Site will provide the quiz for various subject of interest. 
            You need to click for start for the take the online exam.</span></p>
      </blockquote>
    </div></td>
    <td valign="top"><form name="form1" method="post" action="">
      <div align="center">
        <p class="style5"><img src="images/topleft.jpg" width="134" height="128">          </p>
     <a href="index.php?nextid=<?php echo $lec ;?>" style="color:#036">CLICK FOR START</a
      ></div>
    </form></td>
  </tr>
</table>

</body>
</html>
