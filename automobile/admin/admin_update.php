<?php
session_start();
$username=$_SESSION['uname'];
require('../class/twotier.php');
$ob=new twotier();
?>
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
var name=document.myform.name.value;  
if (name==null || name==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Name can't be blank"
  return false; 
  
}
var email=document.myform.email.value;  
if (email==null || email==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg").innerHTML="Email can't be blank" 
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
		document.getElementById("msg").innerHTML="Invalid email id "
	    return (false) 
		} 
}
var number=document.myform.phone.value;  
var phoneno = /^\d{10}$/;
if (number==null || number==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg").innerHTML="Phone number can't be blank" 
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
		document.getElementById("msg").innerHTML="Input 10 digit phone number "
	    return (false) 
		} 
}
var username=document.myform.username.value;  
if (username==null || username==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Username can't be blank"
  return false; 
  
}
var password=document.myform.password.value;  
if (password==null || password==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Password can't be blank"
  return false; 
  
}
var retype=document.myform.retype.value;  
if (retype==null || retype==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Retype password can't be blank"
  return false; 
  
}
}
</script>
<style>
th,td
{
padding:10px;
font-size:12px;
}

th{
width:100px;
padding-left:0px;
}
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
        <li><a  class="active" href="admin_profile.php">Home</a></li>
        <li><a href="view_users.php">Users</a></li>
        <li><a href="view_spareparts.php">Spare Parts</a></li>
        <li><a href="view_gallery.php">Gallery</a></li>
        <li><a href="complaints.php">Complaints</a></li>
		<li><a href="report.php">Report</a></li>
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
        
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Sign In Links -->
      <!-- Box Latest News -->
	  <div id="signout">
	<a href="logout.php">Sign Out</a>
	</div>
      <div class="box">
        <h2>Welcome <?php echo $username;?> </h2>
       
          <div class="info">
			<?php
	if($username=="admin")
	{
	$name='admin';
	$email='admin';
	$phone='admin';
	$password='admin';
	?>
	<a href="images/no_image.jpg" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;"src="images/no_image.jpg" width="100" height="100" alt="" /></a>
	<?php
	}
	else
	{
	$sql="select * from admin where accessname='$username' ";
	
	$res=$ob->query($sql);
	$row=mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res)==1)
	{
	$name=$row['adminname'];
	$email=$row['email'];
	$phone=$row['phone'];
	$password=$row['password'];
	$image=$row['image'];
	if($image=='')
	{
	?>
	<a href="images/no_image.jpg" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;"src="images/no_image.jpg" width="100" height="100" alt="" /></a>
	<?php
	}
	else
	{
	?>
	<a href="images/<?php echo $image;?>" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;" src="images/<?php echo $image;?>" alt="no image" width="100" height="100"/></a><br />
	<?php
	}
	}
	}
	?>
             <table> 
             <tr>
			 <th>Name</th>
			 <td>:</td>
			 <td><?php echo $name;?></td>
			 </tr>
			 <tr>
			 <th>Email</th>
			 <td>:</td>
			 <td><?php echo $email;?></td>
			 </tr>
			 <tr>
			 <th>Phone</th>
			 <td>:</td>
			 <td><?php echo $phone;?></td>
			 </tr>
			 <tr>
			 <th>Accessname</th>
			 <td>:</td>
			 <td><?php echo $username;?></td>
			 </tr>
			 </table>
            </div>
            <div class="cl">&nbsp;</div>
          <div id="form-login"><a href="admin_update.php">Update your profile</a></div>
      
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
		 <div id="msg">
	   <?php
	   if(isset($_GET['msg']))
	   {
	   		echo $_GET['msg'];
	   }
	   ?>
	   </div>
      <form name="myform" action="admin_update_proc.php" method="post" enctype="multipart/form-data" onsubmit="return check()">
        <span class="fontawesome-user"></span>
		<label for="name">Name</label>
         <input type="text" name="name" placeholder="Name" value="<?php echo $name;?>"/><br />
       
        <span class="fontawesome-user"></span>
		<label for="email">Email</label>
          <input type="text" id"email" placeholder="Email" name="email"  value="<?php echo $email;?>"><br />
		   <span class="fontawesome-user"></span>
		<label for="username">Phone</label>
          <input type="text" id="phone" placeholder="Phone number" name="phone" value="<?php echo $phone;?>" ><br />
		  <span class="fontawesome-user"></span>
		<label for="username">Username</label>
         <input type="text" name="username" placeholder="Username" value="<?php echo $username;?>" /><br />
		   <span class="fontawesome-user"></span>
		<label for="password">Password</label>
          <input type="password" id="password" placeholder="Password" name="password" value="<?php echo $password;?>" ><br />
		  <span class="fontawesome-user"></span>
		<label for="retype">Retype Password</label>
          <input type="password" id="retype" placeholder="Retype your password" name="retype" value="<?php echo $password;?>" ><br />
		  <span class="fontawesome-user"></span>
		<label for="photo">Your photo</label>
          <input type="file" id="photo"  name="photo"  ><br />
        <input type="submit" value="Update">	

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
