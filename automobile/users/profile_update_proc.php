<?php
session_start();
//$username=$_POST['username'];
//$_SESSION['uname']=$username;
$username=$_SESSION['cname'];
$name=$_POST['name'];
$email=$_POST['email'];
$number=$_POST['phone'];
$password=$_POST['password'];
$location=$_POST['location'];
$account=$_POST['account'];
$location=$_POST['location'];
$address=$_POST['address'];
$address=nl2br(htmlentities($address, ENT_QUOTES, 'UTF-8'));
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
$sql="select * from users";
$ob=new twotier();
$res=$ob->query($sql);
if($password==$retype)
{
//Image upload
if (file_exists($target_file)) {
    header('location:user_update.php?msg=Sorry, file already exists.');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    header('location:user_update.php?msg=Sorry, your file is too large.');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   header('location:user_update.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    $uploadOk = 0;
}

	if(!empty($_FILES['photo']['name']))
	{
	 $sql="update users set name='$name',address='$address',location='$location',email='$email',contactnumber='$number',password='$password',image='$image',accountnumber='$account' where accessname='$username'";
	//echo $sql;
	$res=$ob->query($sql);
	if($res)
	{
	move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
	header('location:user_update.php?msg=Successfully updated!!!');
	 
	}
	else
	{
	header('location:user_update.php?msg=Updating is not successful!!!');
	}
	}
	else
	{
	$sql="update users set name='$name',address='$address',location='$location',email='$email',contactnumber='$number',password='$password',accountnumber='$account' where accessname='$username'";
	$res=$ob->query($sql);
	if($res)
	{
	
	header('location:user_update.php?msg=Successfully updated without updating image!!!');
	 
	}
	else
	{
	header('location:user_update.php?msg=Updating is not successful!!!');
	}
	}
	
}

        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
		
   



else
	header('location:user_update.php?msg=password mismatch');
?>