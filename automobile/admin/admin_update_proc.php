<?php
session_start();

$username=$_POST['username'];
$name=$_POST['name'];
$email=$_POST['email'];
$number=$_POST['phone'];
$password=$_POST['password'];
$image=$_FILES['photo']['name'];
$retype=$_POST['retype'];
//image
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$error=0;
require('../class/twotier.php');
$sql="select * from admin";
$ob=new twotier();
$res=$ob->query($sql);


if($password==$retype)
{

//Image upload
if (file_exists($target_file)) {
    header('location:admin_update.php?msg=Sorry, file already exists.');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    header('location:admin_update.php?msg=Sorry, your file is too large.');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   header('location:admin_update.php?msg=Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error

	if(mysqli_num_rows($res)==0)
	{
	$sql="insert into admin(adminname,email,phone,accessname,password,image) values(
	'$name','$email','$number','$username ','$password','$image')";
	
	$ob=new twotier();
	$res=$ob->query($sql);
	if($res)
	{
	 move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
	 $_SESSION['uname']=$username;
	header('location:admin_update.php?msg=Successfully updated!!!');
	}
	else
	{
	header('location:admin_update.php?msg=Updating is not successful!!!');
	}
	}
	else
	{
	if(!empty($_FILES['photo']['name']))
	{
	$sql="update admin set adminname='$name',email='$email',phone='$number',accessname='$username',password='$password',image='$image'";
	$res=$ob->query($sql);
	
	if($res)
	{
	move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
	$_SESSION['uname']=$username;
	header('location:admin_update.php?msg=Successfully updated!!!');
	 
	}
	else
	{
	header('location:admin_update.php?msg=Updating is not successful!!!');
	}
	}
	else
	{
	$sql="update admin set adminname='$name',email='$email',phone='$number',accessname='$username',password='$password'";
	$res=$ob->query($sql);
		if($res)
	{
	$_SESSION['uname']=$username;
	header('location:admin_update.php?msg=Successfully updated!!!');
	 
	}
	else
	{
	header('location:admin_update.php?msg=Updating is not successful!!!');
	}
	}
	
}

        //echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
		
   

}

else
	header('location:admin_update.php?msg=password mismatch');
?>