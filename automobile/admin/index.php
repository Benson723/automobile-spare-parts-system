<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
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

var username=document.getElementById("user").value;  
var password=document.getElementById("pass").value; 
if (username==null || username==""){  
   
  document.getElementById("msg").innerHTML="Username can't be blank";
 document.getElementById("user").focus();
  return false; 
  
}
if (password==null || password==""){  
   
  document.getElementById("msg").innerHTML="Password can't be blank";
  document.getElementById("pass").focus();
  return false; 
  
}

}
</script>
<style>
#msg
{
margin:10px;
margin-bottom:0px;
font-style:italic;
font-size:12px;
color:#FF0000;
padding:10px;
}
</style>

<link href="css/style2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Shell -->
<div class="shell">
  <!-- Header -->
  <div id="header">
    <!-- Logo -->
    <h1 id="logo"><a href="#"></a></h1>
    <!-- End Logo -->
    <!-- Navigation -->
    <div id="nav">
      <ul>
        <li><a class="active" href="#">Home</a></li>
       
        
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
        <a href="#" class="left">Sign In</a> 
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
      <form  action="admin_login_check.php" method="post" onsubmit="return check()">
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
     
      <div class="transparent-frame">
        <div class="frame">&nbsp;</div>
        <img src="css/images/sls.jpg" alt="" /> </div>
      <div class="cl">&nbsp;</div>
      <!-- End Top Image -->
      <!-- Box -->
      <div class="box">
        <h2>About</h2>
        <ul class="line">
         <p class="about">Used automobile spare parts business portal is a web portal that mainly aims to selling and buying the used automobiles spare parts. Users have the provision to create profile search automobiles and spare parts through customized way. They can view the details in different formats such as images, videos and text. Through this portal users can discuss about the automobile or the automobile parts. Users have the provision to add their used automobile and spare parts to the selling portal with different tags. 
Admin has the control over the entire system. Admin can view user’s details, their posts and discussion. Admin has the provision to remove user or the user post. 
</p>
        </ul>
        <div class="cl">&nbsp;</div>
      </div>
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
