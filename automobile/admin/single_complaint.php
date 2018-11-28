<?php
session_start();
ob_start();
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
        <li><a  href="admin_profile.php">Home</a></li>
        <li><a  href="view_users.php">Users</a></li>
        <li><a href="view_spareparts.php">Spare Parts</a></li>
        <li><a  href="view_gallery.php">Gallery</a></li>
        <li><a class="active" href="complaints.php">Complaints</a></li>
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
      
		<table style="margin-left:30px;">

  <?php
  $complaintid=$_GET['id'];
	$sql="select * from complaints where id='$complaintid'";
	
	$res=$ob->query($sql);
	//$row=mysqli_fetch_assoc($res);
	if($row=mysqli_fetch_assoc($res))
	{
	//$name=ucfirst($row['name']);
	$bywhomid=$row['bywhom'];
	$onwhomid=$row['onwhom'];
	$matter=$row['matter'];
	$sql1="select name from users where id='$bywhomid'";
	$res1=$ob->query($sql1);
	$row1=mysqli_fetch_assoc($res1);
	$bywhomname=$row1['name'];
	$sql2="select name from users where id='$onwhomid'";
	$res2=$ob->query($sql2);
	$row2=mysqli_fetch_assoc($res2);
	$onwhomname=$row2['name'];
	?>
     <tr>
			 <th>By Whom </th>
			 <td>:</td>
			 <td><?php echo $bywhomname;?></td>
			 </tr>
			 <tr>
			 <th>On Whom</th>
			 <td>:</td>
			 <td><?php echo $onwhomname;?></td>
			 </tr>
			 <tr>
			 <th>Matter</th>
			 <td>:</td>
			 <td><?php echo $matter;?></td>
			 </tr>
     <?php
	 }
	 ?> 
    
 </table>
 <form action="" method="post">
 <input type="hidden" name="h1" value="<?php echo $onwhomid;?>"/>
 <table style="margin-left:40px">
 <tr>
 <td><input type="radio" name="action" value="remove" />Remove</td>
  <td><input type="radio" name="action" value="unremove" />Don't Remove</td>
  </tr>
  <tr>
  <td colspan="2"><input style="padding:5px; width:200px; background-color:#f5db2d" type="submit" name="submit" value="Submit"/></td>
  </tr>
  </table>
 </form>
 <?php
 if(isset($_POST['submit']))
 {
 $action=$_POST['action'];
 if($action=='remove')
 {
 $onwhom=$_POST['h1'];
 $sql="update users set status='removed' where id='$onwhom'";
 $res=$ob->query($sql);
 $sql2="delete from spareparts where userid='$onwhom'";
 $res2=$ob->query($sql2);
 }
 $sql1="update complaints set status='responded' where id='$complaintid'";
 $res1=$ob->query($sql1);
 header('location:complaints.php');
 }
 ?>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
