<?php
session_start();
$username=$_SESSION['cname'];
$id=$_SESSION['cid'];
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
        <li><a  href="user_profile.php">Home</a></li>
       
        <li><a class="active" href="#">Sell</a></li>
		 <li><a href="others_spareparts.php">Buy</a></li>
        <li><a href="view_gallery.php">Gallery</a></li>
        <li><a href="chatbox.php">Chats</a></li>
		<li><a  href="fundtransfer.php">Banking</a></li>
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
     <form action="others_spareparts.php" class="search" method="post">
        <div class="cl">&nbsp;</div>
        <input type="text" class="field blink" value="search" name="tag" title="search" />
        <div class="btnp">
          <input type="submit" name="search" value="go" />
        </div>
        <div class="cl">&nbsp;</div>
      </form>
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
	
	
	
	$sql="select * from users where accessname='$username' ";
	
	$res=$ob->query($sql);
	$row=mysqli_fetch_assoc($res);
	if(mysqli_num_rows($res)==1)
	{
	$name=ucfirst($row['name']);
	$email=$row['email'];
	$address=$row['address'];
	$address=preg_replace("/<br\W*?\/>/", "", $address);
	$location=$row['location'];
	$phone=$row['contactnumber'];
	$account=$row['accountnumber'];
	$password=$row['password'];
	$image=$row['image'];
	if($image!='')
	{
	?>
	<a href="images/<?php echo $image;?>" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;" src="images/<?php echo $image;?>" alt="no image" width="100" height="100"/></a><br />
	<?php 
	}
	else
	{
	?>
	<a href="images/no_image.jpg" target="_blank" title="Click on to view full image"><img style=" margin-top:10px; margin-left:30px;"src="images/no_image.jpg" width="100" height="100" alt="" /></a>
	<?php
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
			 <th>Address</th>
			 <td>:</td>
			 <td><?php echo $address;?></td>
			 </tr>
			 <tr>
			 <th>Phone</th>
			 <td>:</td>
			 <td><?php echo $phone;?></td>
			 </tr>
			 <tr>
			 <th>Account Number</th>
			 <td>:</td>
			 <td><?php echo $account;?></td>
			 </tr>
			 <tr>
			 <th>Accessname</th>
			 <td>:</td>
			 <td><?php echo $username;?></td>
			 </tr>
			 </table>

            </div>
            <div class="cl">&nbsp;</div>
          <div id="form-login"><a href="user_update.php">Update your profile</a></div>
      
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
	
    <div id="main" style="margin-top:15px;">
      <!-- Top Image -->
     
    
      <div class="cl">&nbsp;</div>
      <!-- End Top Image -->
      <!-- Box -->
      <div class="box">
        <h2>Our Spareparts </h2><a href="add_spareparts.php" title="Add new spareparts"><img src="images/add.png" width="70" height="50"/></a>
		<div id="msg1">
		<?php
		if(isset($_GET['msg1']))
			echo $_GET['msg1']; 
		?>
		</div>
        <ul class="line">
		<?php
	$sql="select * from spareparts where userid = '$id' order by id DESC";
	$res=$ob->query($sql);
	$rowcount=mysqli_num_rows($res);
	if($rowcount>0)
	{
	while($row=mysqli_fetch_assoc($res))
	{
	$productid=$row['id'];
	$productname=$row['productname'];
	$foldername=$productname.'_'.$productid;
		$image=glob('images/'.$foldername.'/*');
		sort($image);
		//echo count($image);
		if(count($image)>0)
		{
		
	?>
		<li> <a class="frm" href="our_single_spareparts.php?pid=<?php echo $productid;?>"><img src="<?php echo $image[0];?>" alt="" width="180" height="135" /></a> <a  href="our_single_spareparts.php?pid=<?php echo $productid;?>"><?php echo $productname;?></a> </li>
		<?php
		}
		else
		{
		?>
		<li> <a class="frm" href="our_single_spareparts.php?pid=<?php echo $productid;?>"><img src="images/no_photo_available.jpg" alt="" width="180" height="135" /></a> <a  href="our_single_spareparts.php?pid=<?php echo $productid;?>"><?php echo $productname;?></a> </li>
		<?php
		}
	
	
	
		 }
		 }
		 else
		 echo '<h3 style="margin-top:5px; margin-left:25px; margin-bottom:5px;">'.'No products available'.'</h3>';
		 ?>
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
