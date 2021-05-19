<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<script language="javascript" type="text/javascript">
function showState(Country_Id)
{
document.frm.submit();
}

function showCity(State_Id)
{
document.frm.submit();
}
</script>
</head>
<body>
<form action="" method="post" name="frm" id="frm">
<table width="500" border="0">
<tr>
<td width="119">Univercity</td>
<td width="371">
<select name="Country_Id" id="Country_Id" onChange="showState(this.value);">
<option value="">--Select--</option>
<?php
$sql1="select * from tbl_country";
$sql_row1=mysql_query($sql1);
while($sql_res1=mysql_fetch_assoc($sql_row1))
{
?>
<option value="<?php echo $sql_res1["country_id"]; ?>" <?php if($sql_res1["country_id"]==$_REQUEST["Country_Id"]) { echo "Selected"; } ?>><?php echo $sql_res1["country"]; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>Course</td>
<td id="td_state">
<select name="state_id" id="state_id" onChange="showCity(this.value);">
<option value="">--Select--</option>
<?php
$sql="select * from tbl_state where country_id='$_REQUEST[Country_Id]'";
$sql_row=mysql_query($sql);
while($sql_res=mysql_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["state_id"]; ?>" <?php if($sql_res["state_id"]==$_REQUEST["state_id"]) { echo "Selected"; } ?>><?php echo $sql_res["state"]; ?></option>
<?php
}
?>
</select>
</td>
</tr>
<tr>
<td>Specialized</td>
<td id="td_city">
<select name="city_id" id="city_id">
<option value="">--Select--</option>
<?php
$sql="select * from tbl_district where state_id='$_REQUEST[state_id]'";
$sql_row=mysql_query($sql);
while($sql_res=mysql_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["state_id"]; ?>"><?php echo $sql_res["district"]; ?></option>
<?php
}
?>
</select>
</td>
</tr>
</table>
</form>
</body>
</html>