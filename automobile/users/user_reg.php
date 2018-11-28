<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Automobile Spare Parts Portal</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

<!--[if IE]>
<style type="text/css" media="screen">
.shell {background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/shell-bg.png', sizingMethod='scale');}
.box{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/dot.png', sizingMethod='scale');}
.transparent-frame .frame{background-image: none;filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(src='css/images/transparent-frame.png', sizingMethod='image');}
.search .field{padding-bottom:9px}
</style>
<![endif]-->
<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="js/jquery-func.js" type="text/javascript"></script>
<script>
function check()
{
var username=document.form.username.value;  
if (username==null || username==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Username can't be blank"
  document.form.username.focus();
  return false; 
  
}
var password=document.form.password.value;  
if (password==null || password==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Password can't be blank"
  document.form.password.focus();
  return false; 
  
}

}
</script>
<script>

function checkreg()
{
var name=document.myform.name.value; 
var letters = /^[A-Za-z ]+$/;  
if (name==null || name==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Name can't be blank"
  document.myform.name.focus();
  return false; 
  
}
else
{
max=50
if(name.match(letters))  
{  
	      if(name.length >= max)  
	      
      {       
    alert("Please input upto " +max+ " characters");         
	        return false;     
	      }      
}  
else  
{  
     alert("Input only characters");  
	     return false;  
}  



}
var address=document.myform.address.value;  
if (address==null || address==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg1").innerHTML="Address can't be blank" 
  document.myform.address.focus();
  return false;  
}
else
{
max=200

	      if(address.length >= max)  
	      
      {       
    alert("Please input upto " +max+ " characters");         
	        return false;     
	      }      
}
var location=document.myform.location.value;  
if (location==null || location==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Location can't be blank"
  document.myform.location.focus();
  return false; 
  
}
else
{
max=50
if(location.match(letters))  
{  
	      if(location.length >= max)  
	      
      {       
    alert("Please input upto " +max+ " characters");         
	        return false;     
	      }      
}  
else  
{  
     alert("Input only characters");  
	     return false;  
}  



}
var email=document.myform.email.value;  
if (email==null || email==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg1").innerHTML="Email can't be blank" 
  return false;  
}
else{
if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myform.email.value))  
	  {  
	    //return (true)  
	  }  
	  else
	  {
	    //alert("You have entered an invalid email address!")  
		document.getElementById("msg1").innerHTML="Invalid email id "
	    return (false) 
		} 
}
var account=document.myform.account.value;  
if (account==null || account==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Account Number can't be blank"
  document.myform.account.focus();
  return false; 
  
}
else
{
max=50
 
	      if(account.length >= max)  
	      
      {       
    alert("Please input upto " +max+ " characters");         
	        return false;     
	      }      
 }
var number=document.myform.phone.value;  
var phoneno = /^\d{10}$/;
if (number==null || number==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg1").innerHTML="Phone number can't be blank" 
  document.myform.phone.focus();
  return false;  
}
else{
if (phoneno.test(myform.phone.value))  
	  {  
	    //return (true)  
	  }  
	  else
	  {
	    //alert("You have entered an invalid email address!")  
		document.getElementById("msg1").innerHTML="Input 10 digit phone number "
		document.myform.phone.focus();
	    return (false) 
		} 
}
var username=document.myform.username.value;  
if (username==null || username==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Username can't be blank"
  document.myform.username.focus();
  return false; 
  
}
else
{
max=50
 
	      if(username.length >= max)  
	      
      {       
    alert("Please input upto " +max+ " characters");         
	        return false;     
	      }      
}
var password=document.myform.password.value;  
if (password==null || password==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Password can't be blank"
  document.myform.password.focus();
  return false; 
  
}
else
{
max=50
 
	      if(password.length >= max)  
	      
      {       
    alert("Please input upto " +max+ " characters");         
	        return false;     
	      }  
}    
var retype=document.myform.retype.value;  
if (retype==null || retype==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Retype password can't be blank"
  document.myform.retype.focus();
  return false; 
  
}
else
{
max=50
 
	      if(retype.length >= max)  
	      
      {       
    alert("Please input upto " +max+ " characters");         
	        return false;     
	      }  
}    
var photo=document.myform.photo.value;  
if (photo==null || photo==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Photo should be uploaded"
  document.myform.photo.focus();
  return false; 
  
}
}
</script>
<style>

</style>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <!-- Logo -->
    <h1 id="logo"><a href="#">autoportal your friend on the road</a></h1>
    <!-- End Logo -->
    <!-- Navigation -->
    <div id="nav">
      <ul>
        <li><a class="active" href="index.php">Home</a></li>
        
      </ul>
    </div>
    <!-- End Navigation -->
  </div>
  <!-- End Header -->
  <!-- Content -->
  <div id="content">
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Search -->
      
      <!-- End Search -->
      <!-- Sign In Links -->
      <div class="links">
        <div class="cl">&nbsp;</div>
        <a href="index.php" class="left">Sign In</a> <a href="user_reg.php" class="right">Create account</a>
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Sign In Links -->
      <!-- Box Latest News -->
    <div class="box">
       <div id="msg">
	   <?php
	   if(isset($_GET['msg']))
	   {
	   		echo $_GET['msg'];
	   }
	   ?>
	   </div>
        <div id="login">
      <form action="user_login_check.php" method="post" onsubmit="return check()" name="form">
        <span class="fontawesome-user"></span>
          <input type="text" id="user" placeholder="Username" name="username" >
       
        <span class="fontawesome-lock"></span>
          <input type="password" id="pass" placeholder="Password" name="password" >
        
        <input type="submit" value="Login">	

		</form>
  </div>
       
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Box Latest News -->
      <!-- Box Latest Reviews -->
      
      <!-- End Box Latest Reviews -->
      <!-- Box Latest Posts -->
      
      <!-- End Box Latest Posts -->
    </div>
    <!-- End Sidebar -->
    <!-- Main -->
    <div id="main">
      <!-- Top Image -->
     
      <div class="transparent-frame" style="height:auto;">
      
		 <div id="profile">
		 <div id="msg1">
	   <?php
	   if(isset($_GET['msg1']))
	   {
	   		echo $_GET['msg1'];
	   }
	   ?>
	   </div>
      <form name="myform" action="user_reg_proc.php" method="post" enctype="multipart/form-data"  onsubmit="return checkreg()">
        <span class="fontawesome-user"></span>
		<label for="name">Name</label>
         <input type="text" name="name" placeholder="Name"/><br />
       <span class="fontawesome-user"></span>
		<label for="address">Address</label>
        <textarea name="address" placeholder="Enter your address" rows="5"></textarea><br />
		<span class="fontawesome-user"></span>
		<label for="location">Location</label>
         <input type="text" name="location" placeholder="Your location"/><br />
        <span class="fontawesome-user"></span>
		<label for="email">Email</label>
          <input type="text" id"email" placeholder="Email" name="email" ><br />
		  <span class="fontawesome-user"></span>
		<label for="account">Account Number</label>
          <input type="text" id"account" placeholder="Your account number" name="account" ><br />
		   <span class="fontawesome-user"></span>
		<label for="phone">Phone</label>
          <input type="text" id="phone" placeholder="Phone number" name="phone" ><br />
		  <span class="fontawesome-user"></span>
		<label for="username">Username</label>
         <input type="text" name="username" placeholder="Username"  /><br />
		   <span class="fontawesome-user"></span>
		<label for="password">Password</label>
          <input type="password" id="password" placeholder="Password" name="password"  ><br />
		  <span class="fontawesome-user"></span>
		<label for="retype">Retype Password</label>
          <input type="password" id="retype" placeholder="Retype your password" name="retype"  ><br />
		  <span class="fontawesome-user"></span>
		<label for="photo">Your photo</label>
          <input type="file" id="photo"  name="photo"  ><br />
        <input type="submit" value="Register">	

		</form>
  
  </div>
         </div>
      <div class="cl">&nbsp;</div>
      <!-- End Top Image -->
      <!-- Box -->
     
      <!-- End Box -->
      <!-- Box -->
      
      <!-- End Box -->
    </div>
    <!-- End Main -->
    <div class="cl">&nbsp;</div>
  </div>
  <!-- End Content -->
  <!-- Footer -->
  
  <div id="footer">
    <p>&copy; Automobile Spareparts Portal. Design by SAVIYO</p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
