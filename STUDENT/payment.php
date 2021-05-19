<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("elearning",$con);

session_start();
$std=$_SESSION['u_id'];

?>
<!DOCTYPE html>
<html>
<head>
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
       height:100px;
      }
      .ad {
  position: absolute;
  right: 580px;
  top: 30px;
  color: blue;
  font-size: 18px;
  font-weight: bold;
}

       </style>
    <meta charset="utf-8" />
    <title>Card Payment </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$selectquery="select * from tbl_student where std_id='".$std."'";
  $b=mysql_query($selectquery);
  $c=mysql_fetch_array($b);
  $std_id=$c['std_id'];
  $fname=$c['std_fname'];
	  $lname=$c['std_lname'];
	  $amount=123;
if(isset($_POST['payment']))
{   
    

    $vid=$_GET['vid_id'];
	$am=$_POST['amount'];
	$cn=$_POST['card'];
	$std=$_POST['owner'];
	$cd=$_POST['cvcode'];
	 $_SESSION['lc_id']=$lec;
     $amou=123;
     if($amou==$am)
     {
	$insert="insert into tbl_payment(std_id,vid_id,amount)values('".$std_id."','".$vid."','".$am."')";
mysql_query($insert);
 echo '<script>alert("Payment Successfull");</script>';
?>
<div class="animate">
    <center>
<div class="card">
    <div class="ad">
   <a  href="classe.php?eletid=<?php echo $vid;?>"> CLICK HERE BACK TO CLASS</a></div>
</div></center></div>
<?php
}	
    else
   {
echo '<script>alert("CHECK AMOUNT");</script>';
    }
}
$lec=$_SESSION['lec_id'];
 
?>

<div class="container">

<div class="page-header">
    <center><h1>Credit Card Payment Form <small></small></h1></center>
</div>

<!-- Credit Card Payment Form - START -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <h3 class="text-center">Payment Details</h3>
                        <img class="img-responsive cc-img" src="IMAGE/Creadit.png">
                    </div>
                </div>
                <div class="panel-body">
                    <form role="form"  method="post">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>CARD NUMBER</label>
                                    <div class="input-group">
                                        <input type="text" name="card" class="form-control" placeholder="Valid Card Number"  required/>
                                        <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-7 col-md-7">
                                <div class="form-group">
                                    <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">AMOUNT</span> Per PERIOD</label>
                                    <input type="text" value="<?php echo $amount; ?>" name="amount" class="form-control" placeholder="AMOUNT"  required/>
                                </div>
                            </div>
                            <div class="col-xs-5 col-md-5 pull-right">
                                <div class="form-group">
                                    <label>CV CODE</label>
                                    <input type="text" class="form-control" name="cvcode" value="" placeholder="CVC" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>CARD OWNER</label>
                                    <input type="text" class="form-control" name="owner" value="<?php echo $fname;?>&nbsp;<?php echo $lname;?>" placeholder="Card Owner Names" required />
                                </div>
                            </div>
                        </div>
                   
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <input type="submit"
                             name="payment" class="btn btn-warning btn-lg btn-block" value="Process payment">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cc-img {
        margin: 0 auto;
    }
</style>
<!-- Credit Card Payment Form - END -->

</div>
 </form>
</body>
</html>