<?php
session_start();
ob_start();
$username=$_SESSION['cname'];
$id=$_SESSION['cid'];
 $imageid=$_GET['imageid'];
 $productid=$_GET['productid'];
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
.tbl th
{

padding:10px;
font-size:12px;
}

.tbl th{
width:250px;
padding-left:0px;
}
.tbl td
{

padding-right:0px;
padding-bottom:10px;
padding-top:10px;
}
</style>
<link href="css/style2.css" rel="stylesheet" type="text/css" />
</head>
<body onload='loadCategories()'>
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
        <li><a  href="#">Home</a></li>
        <li><a href="#">Users</a></li>
        <li><a class="active" href="view_our_spareparts.php">Sell</a></li>
		 <li><a href="others_spareparts.php">Buy</a></li>
        <li><a href="view_gallery.php">Gallery</a></li>
        <li><a href="#">Chats</a></li>
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
	  <div id="msg">
	   <?php
	   if(isset($_GET['msg1']))
	   {
	   		echo $_GET['msg1'];
	   }
	   ?>
	   </div>

	  <?php
	 
	$sql="select * from spareparts where id = '$productid'";
	$res=$ob->query($sql);
	$rowcount=mysqli_num_rows($res);
	
	if($rowcount>0)
	{
	$row=mysqli_fetch_assoc($res);
	$productname=$row['productname'];
	
	  ?>
        <h2><?php echo $productname;?> </h2><a href="add_spareparts.php" title="Add new spareparts"><img src="images/add.png" width="70" height="50"/></a>
		<div id="profile">
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file"/>
			<input type="hidden" name="pname" value="<?php echo $productname;?>"/>
			<input type="submit" name="submit" value="Submit"/>
		</form>
		</div>
		<?php
		}
		?>
		
		<?php
		if(isset($_POST['submit']))
		{
		//echo "hello";
		if($imageid!=0)
		{
			$pname=$_POST['pname'];
			echo $sql="select filename from gallery where id='$imageid'";
			$res=$ob->query($sql);
			$row=mysqli_fetch_assoc($res);
			$filename=$row['filename'];
			//$target_dir="images/".$productname."/";
			$path='images/'.$productname.'_'.$productid.'/'.$filename;
			//$path=unlink($path);
			$file1=$_FILES['file']['name'];
			$path3='images/'.$productname.'_'.$productid.'/';
			$target_file = $path3 . basename($_FILES["file"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (file_exists($target_file)) {
				header('location:update_spareparts.php?msg1=Sorry, file already exists.&pid='.$productid);
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["file"]["size"] > 500000) {
			   header('location:update_spareparts.php?msg=Sorry, your file is too large.&pid='.$productid);
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			   header('location:update_spareparts.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed .&pid='.$productid);
				$uploadOk = 0;
			}
			if($uploadOk==1)
			{
				$sql1="update gallery set filename='$file1' where id='$imageid'";
				$res1=$ob->query($sql1);
				if($res1)
				{
				unlink($path);
				move_uploaded_file($_FILES['file']['tmp_name'],$path3.$_FILES['file']['name']);
				header('location:update_spareparts.php?msg=Image has been changed.&pid='.$productid);
				}
			}
			}
			else
			{
			$pname=$_POST['pname'];
			$file1=$_FILES['file']['name'];
			$path3='images/'.$productname.'_'.$productid.'/';
			$target_file = $path3 . basename($_FILES["file"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			if (file_exists($target_file)) {
				header('location:update_spareparts.php?msg=Sorry, file1 already exists.&pid='.$productid);
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["file"]["size"] > 500000) {
			   header('location:update_spareparts.php?msg=Sorry, your file1 is too large.&pid='.$productid);
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			   header('location:update_spareparts.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed but file1 is not.&pid='.$productid);
				$uploadOk = 0;
			}
			if($uploadOk==1)
			{
				$sql1="insert into gallery(pid,filename) values('$productid','$file1')";
				$res1=$ob->query($sql1);
				if($res1)
				{
				//unlink($path);
				move_uploaded_file($_FILES['file']['tmp_name'],$path3.$_FILES['file']['name']);
				header('location:update_spareparts.php?msg=Image has been uploaded.&pid='.$productid);
				}
			}
			}
			
		}
		?>
		<div>
       
		
		</div>
		
		
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Box -->
      <!-- Box -->
       
      
		 
        
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
