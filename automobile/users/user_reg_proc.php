<?php
//session_start();
//$_SESSION['uname']=$username;
$username=$_POST['username'];
$name=$_POST['name'];
$address=$_POST['address'];
$address=nl2br(htmlentities($address, ENT_QUOTES, 'UTF-8'));
$location=$_POST['location'];
$email=$_POST['email'];
$account=$_POST['account'];
$number=$_POST['phone'];
$password=$_POST['password'];
$image=$_FILES['photo']['name'];
$image=$username."_".$image;
$retype=$_POST['retype'];
//image
$target_dir = "images/";
$target_file = $target_dir .$username."_". basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$error=0;
require('../class/twotier.php');

if($password==$retype)
{
//Image upload
if (file_exists($target_file)) {
    header('location:user_reg.php?msg1=Sorry, file already exists.');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
   header('location:user_reg.php?msg1=Sorry, your file is too large.');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   header('location:user_reg.php?msg1=Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
$sql="select * from users where accessname='$username' ";
$ob=new twotier();
$res=$ob->query($sql);
$rows=mysqli_num_rows($res);
//echo $rows;
if ($rows > 0)
	{
	
	header('location:user_reg.php?msg1=Username already exists');
	}
	else if($rows==0)
	{
	if($uploadOk==1)
	{
	echo $sql1="insert into users
	(name,address,email,contactnumber,location,image,accessname,password,accountnumber,status)
values('$name','$address','$email','$number','$location','$image','$username','$password','$account','null')";
	echo $sql1;
	$ob=new twotier();
	
$res1=$ob->query($sql1);
//$rows1=mysqli_num_rows($res1);

if ($res1)
{
move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
header('location:user_reg.php?msg1=Registered successfully');
//echo $sql1;
}
else
	{
	header('location:user_reg.php?msg1=Registeration failed due to some errors');
}
	}
	}
   

}

else
	header('location:user_reg.php?msg1=password mismatch');

?>