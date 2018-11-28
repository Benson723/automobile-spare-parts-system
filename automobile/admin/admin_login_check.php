<?php
session_start();
require('../class/twotier.php');
$username=$_POST['username'];
$password=$_POST['password'];
if($username=="admin" && $password=="admin")
{
$_SESSION['uname']="admin";
header('location:admin_profile.php');
}
else
{
//echo "else of admin";
$sql="select * from admin";
$ob=new twotier();
$res=$ob->query($sql);
$row=mysqli_fetch_assoc($res);
if(mysqli_num_rows($res)>0)
{
//echo "record exists";

//echo $username."<br>".$password;
$sql1="select * from admin where trim(accessname)='$username' and trim(password)='$password' ";
$ob1=new twotier();
$res1=$ob1->query($sql1);
$row=mysqli_fetch_assoc($res1);
if(mysqli_num_rows($res1)>0)
{
//echo "exist username n oswd";
$_SESSION['uname']=$row['accessname'];

header('location:admin_profile.php');
}
else
	header('location:index.php?msg=Username or password mismatch');
}
else
	header('location:index.php?msg=Username or password mismatch');
}
?>