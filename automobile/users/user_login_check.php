<?php
session_start();
require('../class/twotier.php');
$username=$_POST['username'];
$password=$_POST['password'];
//echo "else of admin";
$sql="select * from users where accessname='$username' and password='$password'";
$ob=new twotier();
$res=$ob->query($sql);
$row=mysqli_fetch_assoc($res);
if(mysqli_num_rows($res)==1)
{

$_SESSION['cname']=$row['accessname'];
$_SESSION['cid']=$row['id'];
$status=$row['status'];
if($status=='removed')
header('location:index.php?msg=Your account has been removed by the administrator');
else
header('location:user_profile.php');
}
else
{
	header('location:index.php?msg=Username or password mismatch');
}

?>