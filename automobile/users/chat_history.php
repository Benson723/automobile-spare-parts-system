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
       
        <li><a href="view_our_spareparts.php">Sell</a></li>
		 <li><a href="others_spareparts.php">Buy</a></li>
        <li><a href="view_gallery.php">Gallery</a></li>
        <li><a  class="active" href="chatbox.php">Chats</a></li>
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
	 
      
      <!-- End Box -->
	  
      <!-- Box -->
      <div class="box">
	  <?php
	  $userid=$_GET['userid'];
	  $sql="select name from users where id='$userid'";
	  $res=$ob->query($sql);
	  $row=mysqli_fetch_assoc($res);
	  $other=$row['name'];
	  ?>
        <h2><?php echo $other;?></h2>
        <table>
		<?php
		
	 $sql="select * from messages where (senderid='$userid' AND receiverid='$id') OR (senderid='$id' AND receiverid='$userid') order by id ";
	$res=$ob->query($sql);
	$rowcount=mysqli_num_rows($res);
	if($rowcount>0)
	{
	while($row=mysqli_fetch_assoc($res))
	{
	
	$senderid=$row['senderid'];
	$receiverid=$row['receiverid'];
	$msg=$row['msg'];
	$sql1="select name from users where id='$senderid'";
	$res1=$ob->query($sql1);	
	$row1=mysqli_fetch_assoc($res1);
	$sendername=$row1['name'];	
	$sql2="select name from users where id='$receiverid'";
	$res2=$ob->query($sql2);	
	$row2=mysqli_fetch_assoc($res2);
	$receivername=$row2['name'];	
	?>
		
		<?php
		if($senderid==$id)
		{
		echo '<tr>';
	echo '<td style="">';echo '</td>';
	echo '<td style="color:#99ccff; font-size:14px;">'.$sendername.':'.$msg.'</td>';
	echo '</tr>';
		
		}
		else
		{
		echo '<tr>';
	echo '<td style="color:#e6fff2;font-size:14px;">'.$sendername.':'.$msg.'</td>';
	echo '<td style="">';echo '</td>';
	echo '</tr>';
		}
		 }
		 }
		 else
		 echo '<h3 style="margin-top:5px; margin-left:25px; margin-bottom:5px;">'.'No chats exist'.'</h3>';
		 ?>
       </table>
	   <div id="profile">
	   <form name="" action="send_msg.php" method="post">
	   <input type="hidden" name="h1" value="<?php echo $userid;?>"/>
	   <textarea name="msg" placeholder="Type your message" rows="5"></textarea><br />
	   <input type="submit" value="Send" name="submit" style="margin-left:25px;/>
	   </form>
	   </div>
	   
        <div class="cl">&nbsp;</div>
      </div>
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
