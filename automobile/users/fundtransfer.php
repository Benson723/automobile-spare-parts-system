<?php
ob_start();
session_start();
$id=$_SESSION['cid'];
require('../class/twotier.php');
$ob=new twotier();
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Payment Form</title>
  
  
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style1.css">
	  <script src="js/jquery-func.js" type="text/javascript"></script>
<script>

function checkreg()
{

var saccount=document.myform.saccount.value;  
if (saccount==null || saccount==""){  
  //alert("Reason can't be blank"); 
 alert("Sender's Account can't be blank");
  document.myform.saccount.focus();
  return false; 
  
}
var raccount=document.myform.raccount.value;  
if (raccount==null || raccount==""){  
  //alert("Reason can't be blank"); 
 alert("Receiver's Account can't be blank");
  document.myform.raccount.focus();
  return false; 
  
}
var retype=document.myform.retype.value;  
if (retype==null || retype==""){  
  //alert("Reason can't be blank"); 
 alert("Retype OTP can't be blank");
  document.myform.retype.focus();
  return false; 
  
}
var pin=document.myform.pin.value;  
if (pin==null || pin==""){  
  //alert("Reason can't be blank"); 
 alert("Security pin can't be blank");
  document.myform.pin.focus();
  return false; 
  
}
var amount=document.myform.amount.value;  
if (amount==null || amount==""){  
  //alert("Reason can't be blank"); 
 alert("Amount can't be blank");
  document.myform.amount.focus();
  return false; 
  
}
}
</script>

 
</head>

<body>
<?php
if(isset($_POST['back']))
{
	header('location:user_profile.php');
}
if(isset($_POST['submit']))
{
$raccount=$_POST['raccount'];
$saccount=$_POST['saccount'];
$otp=$_POST['otp'];
$retype=$_POST['retype'];
$pin=$_POST['pin'];
$amount=$_POST['amount'];

if($otp==$retype)
{
$sql1="insert into fundtransfer(userid,saccount,raccount,amount)
	    values('$id','$saccount','$raccount','$amount')";
		$res1=$ob->query($sql1);
if($res1)
{

	echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('You have successfully transferred the amount')
        window.location.href='user_profile.php'
        </SCRIPT>");
	echo '</script>';
}

}
else
$msg="You have entered a wrong otp code";
}
?>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div class="container">
  <div id="Checkout" class="inline">
      <h1>Pay Invoice</h1>
      <?php
	  $sql="select accountnumber from users where id='$id'";
	  $res=$ob->query($sql);
	  $row=mysqli_fetch_assoc($res);
	  $accountnumber=$row['accountnumber'];
	  ?>
      <form action="" method="post"  name="myform" onsubmit="return checkreg()">
	  <?php
	  $rand=(rand(100,500));
	  ?>
	  <input type="hidden" name="otp" value="<?php echo $rand;?>"/>
          <div class="form-group">
              
              <div class="amount-placeholder" style="margin-bottom:40px;">
                 
				  <h5 style="color:#FF0000; font-style:italic;"><?php if(isset($msg)) echo $msg;?></h5>
              </div>
          </div>
          
          <div class="form-group">
              <label for="CreditCardNumber">Transfer from</label>
              <input id="Number" class="null card-image form-control" type="text" name="saccount" value="<?php echo $accountnumber;?>"></input>
          </div>
		   <div class="form-group">
              <label for="CreditCardNumber">Transfer To</label>
              <input id="Number" class="null card-image form-control" type="text" name="raccount" placeholder="Beneficiary account number"></input>
          </div>
          <div class="expiry-date-group form-group">
              <label for="otp">OTP Code</label>
              <input id="otp" class="form-control" type="text" disabled="disabled" style="background-color:#009933; color:#FFFFFF; text-align:center"  value="<?php echo $rand;?>"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="SecurityCode">Enter OTP Code</label>
              <div class="input-container" >
                  <input id="SecurityCode" class="form-control" name="retype" type="text"  style="text-align:center;"></input>
                  
              </div>
              
          </div>
          <div class="expiry-date-group form-group">
              <label for="">Security Pin</label>
              <input id="pin" class="form-control" type="text"  name="pin"  placeholder="ATM Pin"></input>
          </div>
          <div class="security-code-group form-group">
              <label for="">Amount</label>
              <div class="input-container" >
                  <input id="SecurityCode" class="form-control" name="amount" type="text" placeholder="Amount to be transferred"  style=""></input>
                  
              </div>
              
          </div>
		
          <button id="PayButton" class="btn btn-block btn-success submit-button" name="submit">
              <span class="submit-button-lock"></span>
              <span class="align-middle">Transfer</span>
          </button>
		  
      </form>
	  <form action="" method="post">
	  <button id="PayButton" class="btn btn-block btn-success submit-button" name="back">
              <span class="submit-button-lock"></span>
              <span class="align-middle">Back</span>
          </button>
		 </form>
  </div>
</div>
 

</body>
</html>
