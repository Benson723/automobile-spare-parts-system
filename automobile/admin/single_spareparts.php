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
<style>
.tbl th
{width:150px;
}
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
        <li><a  href="admin_profile.php">Home</a></li>
        <li><a href="view_users.php">Users</a></li>
        <li><a class="active" href="view_spareparts.php">Spare Parts</a></li>
        <li><a  href="view_gallery.php">Gallery</a></li>
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
     <div class="box">
        
		<?php
		$productid=$_GET['id'];
	$sql="select * from spareparts where id='$productid'";
	$res=$ob->query($sql);
	$rowcount=mysqli_num_rows($res);
	if($rowcount>0)
	{
	if($row=mysqli_fetch_assoc($res))
	{
	$productname=$row['productname'];
	$coname=$row['companyname'];
	$year=$row['year'];
	$hands=$row['hands'];
	$specification=$row['specification'];
	$price=$row['price'];
	$producerid=$row['userid'];
	$q="select id,name from users where id='$producerid'";
	$r1=$ob->query($q);
	$r=mysqli_fetch_assoc($r1);
	$producername=$r['name'];
	$description=$row['description'];
	$category=$row['category'];
	$subcategory=$row['subcategory'];
	$query="select * from category where id='$category'";
	$res1=$ob->query($query);
	//$rowcount=mysqli_num_rows($res);
	$row1=mysqli_fetch_assoc($res1);
	$catname=$row1['cat_name'];
	$query1="select * from subcategory where id='$subcategory'";
	$res2=$ob->query($query1);
	//$rowcount=mysqli_num_rows($res);
	$row2=mysqli_fetch_assoc($res2);
	$subcatname=$row2['subcat_name'];
	}
	}
		 ?>
        <h2><?php echo $productname;?> </h2>
		<div>
        <ul class="line">
		<?php
		
	
	$productid=$row['id'];
	
	$foldername=$productname.'_'.$productid;
	$image=glob('../users/images/'.$foldername.'/*');
	if(count($image)>0)
	{
		foreach(glob('../users/images/'.$foldername.'/*') as $image) 
		
	{	
		
	?>
		<li> <a class="frm" href="<?php echo $image;?>" target="_blank"><img src="<?php echo $image;?>" alt="" width="180" height="135" /></a>  </li>
		<?php
		}
		}
		else
		{
		?>
		<li> No images of the product  </li>
		<?php
		}
	
	
	
		 
		
		 
		 ?>
        </ul>
		
		</div>
		
		
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Box -->
      <!-- Box -->
      <div class="box">
	  <p>
		<table class="tbl"> 
             <tr>
			 <th>Product Name</th>
			 <td >:</td>
			 <td><?php echo $productname;?></td>
			 </tr>
			 <tr>
			 <th>Producer Name</th>
			 <td >:</td>
			 <td><a href="single_user.php?id=<?php echo $producerid;?>"><?php echo $producername;?></a></td>
			 </tr>
			 <tr>
			 <th>Company Name</th>
			 <td>:</td>
			 <td><?php echo $coname;?></td>
			 </tr>
			 <tr>
			 <th>Year of manufacture</th>
			 <td>:</td>
			 <td><?php echo $year;?></td>
			 </tr>
			 <tr>
			 <th>No. of pre owners</th>
			 <td>:</td>
			 <td><?php echo $hands;?></td>
			 </tr>
			 <tr>
			 <th>Expected Price</th>
			 <td>:</td>
			 <td><?php echo $price;?></td>
			 </tr>
			<tr>
			 <th>Specification</th>
			 <td>:</td>
			 <td><?php echo $specification;?></td>
			 </tr>
			  <tr>
			 <th>Description</th>
			 <td>:</td>
			 <td><?php echo $description;?></td>
			 </tr>
			 <td colspan="3"><div id="form-login" style="width:150px; margin-left:150px; font-size:12px; font-weight:bold"><a  style="margin-left:20px"href="delete_product.php?pid=<?php echo $productid;?>">Delete product</a></div>
			 </td></tr>
			 </table>
			 </p>
			   
			   
	  </div>
      <!-- End Box -->
	  
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
