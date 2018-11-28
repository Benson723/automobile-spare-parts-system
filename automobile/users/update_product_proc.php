<?php
session_start();
$username=$_SESSION['cname'];
$id=$_SESSION['cid'];
require('../class/twotier.php');
$ob=new twotier();
if(isset($_POST['submit']))
{
	$productid=$_POST['productid'];
	$name=$_POST['name'];
	$pname=$_SESSION['pname'];
	$company=$_POST['company'];
	$year=$_POST['year'];
	$hands=$_POST['hands'];
	$price=$_POST['price'];
	$category=$_POST['category'];
	$subcategory=$_POST['subcategory'];
	$specification=$_POST['specification'];
	$specification = nl2br(htmlentities($specification, ENT_QUOTES, 'UTF-8'));
	$description=$_POST['description'];
	$description = nl2br(htmlentities($description, ENT_QUOTES, 'UTF-8'));
	echo $sql="update spareparts set productname='$name',companyname='$company',year='$year',hands='$hands',specification='$specification',description='$description',category='$category',subcategory='$subcategory',price='$price' where id='$productid'";
	$res=$ob->query($sql);
	if($res)
	{
		$new='images/'.$name.'_'.$productid;
		$old='images/'.$pname.'_'.$productid;
		rename($old,$new);
		header('location:update_spareparts.php?msg1=You have successfully updated&pid='.$productid);
	}
	else
		header('location:update_spareparts.php?msg1=Update failed&pid='.$productid);
}
?>