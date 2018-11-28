<?php
ob_start();
session_start();
$username=$_SESSION['cname'];
$id=$_SESSION['cid'];
 $productid=$_GET['pid'];
require('../class/twotier.php');
$ob=new twotier();
$sql1 = "SELECT id,cat_name FROM category";
  $res1=$ob->query($sql1);

  while($row1 = mysqli_fetch_assoc($res1)){
    $categories[] = array("id" => $row1['id'], "val" => $row1['cat_name']);
  }
 $sql0="select cat_name from category where id=(select category from spareparts where id='$productid')";
$res0=$ob->query($sql0);
	$row0=mysqli_fetch_assoc($res0);
	$category=$row0['cat_name'];
	echo '<input type="hidden" name="h1" value="'.$category.'"/>';
  $query = "SELECT id, cid, subcat_name FROM subcategory";
  $result = $ob->query($query);

  while($row2 = mysqli_fetch_assoc($result)){
    $subcats[$row2['cid']][] = array("id" => $row2['id'], "val" => $row2['subcat_name']);
  }
$sql00="select subcat_name from subcategory where id=(select subcategory from spareparts where id='$productid')";
$res00=$ob->query($sql00);
	$row00=mysqli_fetch_assoc($res00);
	$subcategory=$row00['subcat_name'];
	echo '<input type="hidden" name="h2" value="'.$subcategory.'"/>';
	 $query1 = "SELECT subcat_name,id FROM subcategory where cid=(select id from category where cat_name='$category')";
  $resultq = $ob->query($query1);
//echo mysqli_num_rows($resultq);
  while($rowq = mysqli_fetch_assoc($resultq)){
    $subcategories[] = array("id" => $rowq['id'], "val" => $rowq['subcat_name']);
  }
  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
  $jsonselected=json_encode($category);
  $jsonsub=json_encode($subcategory);
   $jsonsubCats = json_encode($subcategories);
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

function checkreg()
{

var name=document.myform.name.value;  
if (name==null || name==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Product Name can't be blank"
  document.myform.name.focus();
  return false; 
  
}
var company=document.myform.company.value;  
if (company==null || company==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg1").innerHTML="MAnufacturer name can't be blank" 
  document.myform.company.focus();
  return false;  
}
var year=document.myform.year.value; 
var text = /^[0-9]+$/;
if (year==null || year==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg1").innerHTML="MAnufactured year can't be blank" 
  document.myform.year.focus();
  return false;  
}
else {
if(!text.test(year))
{

             document.getElementById("msg1").innerHTML="Please Enter Numeric Values Only";
  document.myform.year.focus();
            return false;
        }
}
var hands=document.myform.hands.value;  
if (hands==null || hands==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg1").innerHTML="No.of previous owners can't be blank" 
  document.myform.hands.focus();
  return false;  
}
else{
if(!text.test(hands))
{

             document.getElementById("msg1").innerHTML="Please Enter Numeric Values Only";
  document.myform.hands.focus();
            return false;
        }
}

var price=document.myform.price.value;  
if (price==null || price==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg1").innerHTML="Price can't be blank" 
  document.myform.price.focus();
  return false;  
}
else{
if(!text.test(price))
{

             document.getElementById("msg1").innerHTML="Price should not be a floating value";
  document.myform.price.focus();
            return false;
        }
}

var specification=document.myform.specification.value;  
if (specification==null || specification==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Specification field can't be blank"
  document.myform.specification.focus();
  return false; 
  
}
var description=document.myform.description.value;  
if (description==null || description==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg1").innerHTML="Description field can't be blank"
  document.myform.description.focus();
  return false; 
  
}

}
</script>
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
		echo "var selected_cat = $jsonselected; \n";
		echo "var selected_subcat = $jsonsub; \n";
		echo "var subcategories = $jsonsubCats; \n";

      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
		//var cat_selected = document.getElementById("h1").value;
		 var subcatSelect = document.getElementById("subcatsSelect");
		//alert(cat_selected);
		//alert(subcategories.length);
		 //body.onload = updateSubCats;
        select.onfocus = updateSubCats;
		select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);   
		 if(categories[i].val==selected_cat)
		 select.options[i].selected = true;       
        }
		 for(var i = 0; i < subcategories.length; i++){
		
          subcatSelect.options[i] = new Option(subcategories[i].val,subcategories[i].id);   
		 if(subcategories[i].val==selected_subcat)
		 subcatSelect.options[i].selected = true;       
        }
		
      }
      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
		
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
		   if(subcats[catid][i].val==selected_subcat)
		 subcatSelect.options[i] .selected = true; 
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
        <li><a  href="user_profile.php">Home</a></li>
       
        <li><a class="active" href="view_our_spareparts.php">Sell</a></li>
		 <li><a  href="others_spareparts.php">Buy</a></li>
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
	  <?php
	 
	$sql="select * from spareparts where id = '$productid'";
	$res=$ob->query($sql);
	$rowcount=mysqli_num_rows($res);
	
	if($rowcount>0)
	{
	$row=mysqli_fetch_assoc($res);
	$productname=$row['productname'];
	$_SESSION['pname']=$productname;
	$coname=$row['companyname'];
	$year=$row['year'];
	$hands=$row['hands'];
	$specification=$row['specification'];
	$specification=preg_replace("/<br\W*?\/>/", "", $specification);
	$price=$row['price'];
	$description=$row['description'];
	$description=preg_replace("/<br\W*?\/>/", "", $description);
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
	  ?>
        <h2><?php echo $productname;?> </h2><a href="add_spareparts.php" title="Add new spareparts"><img src="images/add.png" width="70" height="50"/></a>
		<div>
		<div id="msg">
		<?php
		if(isset($_GET['msg']))
		echo $_GET['msg'];
		?>
		</div>
        <ul class="line">
		<?php
		
	
	$productid=$row['id'];
	
	$foldername=$productname.'_'.$productid;
	$image=glob('images/'.$foldername.'/*');
	if(count($image)>0)
	{
		foreach(glob('images/'.$foldername.'/*') as $image) 
		
	{	
		$file = basename($image);   
		$sql3="select id from gallery where pid='$productid' AND filename='$file'";
		$res3=$ob->query($sql3);
		$row3=mysqli_fetch_assoc($res3);
		$imageid=$row3['id'];
		
	?>
		<li> <a class="frm" href="<?php echo $image;?>" target="_blank"><img src="<?php echo $image;?>" alt="" width="180" height="135" /></a><a style="margin-left:10px" href="change_image.php?imageid=<?php echo $imageid;?>&productid=<?php echo $productid;?>">Change</a> </li>
		
		<?php
		}
		$sql4="select * from gallery where pid = '$productid'";
		$res4=$ob->query($sql4);
		$rowcount4=mysqli_num_rows($res4);
		for($i=$rowcount4;$i<=4-$rowcount;$i++)
		{
		?>
		<li> <a class="frm" href="images/no_photo_available.jpg" target="_blank"><img src="images/no_photo_available.jpg" alt="" width="180" height="135" /></a> <a style="margin-left:10px" href="change_image.php?imageid=0&productid=<?php echo $productid;?>">Change</a> </li>
		<?php
		}
		}
		else
		{
		for($i=1;$i<=4;$i++)
		{
		
		?>
		<li> <a class="frm" href="images/no_photo_available.jpg" target="_blank"><img src="images/no_photo_available.jpg" alt="" width="180" height="135" /></a> <a style="margin-left:10px" href="change_image.php?imageid=0&productid=<?php echo $productid;?>">Change</a> </li>
		<?php
		}
	}
	
	
		 
		 }
		 
		 ?>
        </ul>
		
		</div>
		
		
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Box -->
      <!-- Box -->
       
      
		 <div id="profile" >
		 <h2 style="">Update sparepart</h2>
		 <div id="msg1">
	   <?php
	   if(isset($_GET['msg1']))
	   {
	   		echo $_GET['msg1'];
	   }
	   ?>
	   </div>
      <form name="myform" action="update_product_proc.php" method="post" enctype="multipart/form-data" onsubmit="return checkreg()">
        <span class="fontawesome-user"></span>
		<label for="name">Product Name</label>
         <input type="text" name="name" placeholder="Name" value="<?php echo $productname;?>" /><br />
		 
         <span class="fontawesome-user"></span>
		<label for="company">Manufacturer Name</label>
         <input type="text" name="company" placeholder="Manufacturer name" value="<?php echo $coname;?>"/><br />
		 
        <span class="fontawesome-user"></span>
		<label for="year">Year of manufacturer</label>
          <input type="text" id"year" placeholder="Manufactured year" name="year" value="<?php echo $year;?>"  ><br />
		  
		   <span class="fontawesome-user"></span>
		<label for="hands">No. of hands</label>
          <input type="text" id="hands" placeholder="No. of previous users" name="hands" value="<?php echo $hands;?>"  ><br />
		  
		   <span class="fontawesome-user"></span>
		  <label for="price">Expected Price</label>
          <input type="text" id="price" placeholder="Price expected" name="price" value="<?php echo $year;?>"  ><br />
		  
		  <span class="fontawesome-user"></span>
		<label for="category">Category of product</label>
         <select id='categoriesSelect' name="category" style="width:200px" >
		
   		 </select>
		 <br />
		 
		   <span class="fontawesome-user"></span>
		<label for="subcategory">Sub Category of product</label>
           <select id='subcatsSelect' name="subcategory" style="width:200px">
		   
    		</select>
			<br />
		  <span class="fontawesome-user"></span>
		<label for="specification">Specification</label>
         <textarea id="specification" placeholder="Specification about the product" name="specification" rows="5"  ><?php echo $specification;?></textarea><br />
		  <span class="fontawesome-user"></span>
		<label for="description">Description</label>
         <textarea id="description" placeholder="More details about the product" name="description" rows="5"  ><?php echo $description;?></textarea><br />
		<input type="hidden" name="productid" value="<?php echo $productid;?>"/>
		
        <input style="margin-left:150px;" type="submit" name="submit" value="Update">	

		</form>
  
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
    <p>&copy; Automobile Spareparts Portal. Design by SAVIYO></p>
  </div>
  <!-- End Footer -->
</div>
<!-- End Shell -->
</body>
</html>
