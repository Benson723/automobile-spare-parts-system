<?php
session_start();
$username=$_SESSION['cname'];
require('../class/twotier.php');
$ob=new twotier();
$sql1 = "SELECT id,cat_name FROM category";
  $res1=$ob->query($sql1);

  while($row1 = mysqli_fetch_assoc($res1)){
    $categories[] = array("id" => $row1['id'], "val" => $row1['cat_name']);
  }

  $query = "SELECT id, cid, subcat_name FROM subcategory";
  $result = $ob->query($query);

  while($row2 = mysqli_fetch_assoc($result)){
    $subcats[$row2['cid']][] = array("id" => $row2['id'], "val" => $row2['subcat_name']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);
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
  document.getElementById("msg").innerHTML="Product Name can't be blank"
  document.myform.name.focus();
  return false; 
  
}
var company=document.myform.company.value;  
if (company==null || company==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg").innerHTML="MAnufacturer name can't be blank" 
  document.myform.company.focus();
  return false;  
}
var year=document.myform.year.value; 
var text = /^[0-9]+$/;
if (year==null || year==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg").innerHTML="MAnufactured year can't be blank" 
  document.myform.year.focus();
  return false;  
}
else {
if(!text.test(year))
{

             document.getElementById("msg").innerHTML="Please Enter Numeric Values Only";
  document.myform.year.focus();
            return false;
        }
}
var hands=document.myform.hands.value;  
if (hands==null || hands==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg").innerHTML="No.of previous owners can't be blank" 
  document.myform.hands.focus();
  return false;  
}
else{
if(!text.test(hands))
{

             document.getElementById("msg").innerHTML="Please Enter Numeric Values Only";
  document.myform.hands.focus();
            return false;
        }
}

var price=document.myform.price.value;  
if (price==null || price==""){  
  //alert("Email can't be blank"); 
  document.getElementById("msg").innerHTML="Price can't be blank" 
  document.myform.price.focus();
  return false;  
}
else{
if(!text.test(price))
{

             document.getElementById("msg").innerHTML="Price should not be a floating value";
  document.myform.price.focus();
            return false;
        }
}

var specification=document.myform.specification.value;  
if (specification==null || specification==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Specification field can't be blank"
  document.myform.specification.focus();
  return false; 
  
}
var description=document.myform.description.value;  
if (description==null || description==""){  
  //alert("Name can't be blank"); 
  document.getElementById("msg").innerHTML="Description field can't be blank"
  document.myform.description.focus();
  return false; 
  
}

}
</script>
<script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
		 //body.onload = updateSubCats;
        select.onfocus = updateSubCats;
		select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
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
	$address=preg_replace("/<br\W*?\/>/", "", $address);;
	$location=$row['location'];
	$phone=$row['contactnumber'];
	$account=$row['accountnumber'];
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
	
	?>
            <table> 
             <tr>
			 <th>Name</th>
			 <td>:</td>
			 <td><?php echo $name;?></td>
			 </tr>
			 <tr>
			 <th>Address</th>
			 <td>:</td>
			 <td><?php echo $address;?></td>
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
    <div id="main">
      <!-- Top Image -->
     
      <div class="transparent-frame" style="height:auto;">
      
		 <div id="profile" style="margin-top:15px;">
		 <h2 style="">Add spareparts</h2>
		 <div id="msg">
	   <?php
	   if(isset($_GET['msg1']))
	   {
	   		echo $_GET['msg1'];
	   }
	   ?>
	   </div>
      <form name="myform" action="add_parts_proc.php" method="post" enctype="multipart/form-data" onsubmit="return checkreg()">
        <span class="fontawesome-user"></span>
		<label for="name">Product Name</label>
         <input type="text" name="name" placeholder="Name" /><br />
		 
         <span class="fontawesome-user"></span>
		<label for="company">Manufacturer Name</label>
         <input type="text" name="company" placeholder="Manufacturer name" /><br />
		 
        <span class="fontawesome-user"></span>
		<label for="year">Year of manufacturer</label>
          <input type="text" id"year" placeholder="Manufactured year" name="year"  ><br />
		  
		   <span class="fontawesome-user"></span>
		<label for="hands">No. of hands</label>
          <input type="text" id="hands" placeholder="No. of previous users" name="hands"  ><br />
		  
		   <span class="fontawesome-user"></span>
		  <label for="price">Expected Price</label>
          <input type="text" id="price" placeholder="Price expected" name="price"  ><br />
		  
		  <span class="fontawesome-user"></span>
		<label for="category">Category of product</label><br />
         <select id='categoriesSelect' name="category">
		<option value="selected" selected="selected">Choose</option>
   		 </select>
		 <br />
		 
		   <span class="fontawesome-user"></span>
		<label for="subcategory">Sub Category of product</label><br />
           <select id='subcatsSelect' name="subcategory">
    		</select>
			<br />
		  <span class="fontawesome-user"></span>
		<label for="specification">Specification</label>
         <textarea id="specification" placeholder="Specification about the product" name="specification" rows="5"  ></textarea><br />
		  <span class="fontawesome-user"></span>
		<label for="description">Description</label>
         <textarea id="description" placeholder="More details about the product" name="description" rows="5"  ></textarea><br />
		 <span class="fontawesome-user"></span>
		<label style="width:220px;" for="photo">Upload photos(maximum 4 photos)</label><br />
		<table>
		<tr>
		<td><input type="file" name="file1"/></td>
		</tr>
		<tr>
		<td><input type="file" name="file2"/></td>
		</tr>
		<tr>
		<td><input type="file" name="file3"/></td>
		</tr>
		<tr>
		<td><input type="file" name="file4"/></td>
		</tr>
		</table>
        <input type="submit" value="Add">	

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
