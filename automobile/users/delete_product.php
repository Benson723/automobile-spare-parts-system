<?php
session_start();
$username=$_SESSION['cname'];
$id=$_SESSION['cid'];
require('../class/twotier.php');
$ob=new twotier();
$pid=$_GET['pid'];
$pname=$_GET['pname'];
echo $sql="delete from spareparts where id='$pid'";
$res=$ob->query($sql);
echo $sql1="delete from gallery where pid='$pid'";
$res1=$ob->query($sql1);
$dir='images/'.$pname.'_'.$pid;
//$result=delTree($dir);
foreach(glob($dir.'/*') as $image) 
unlink($image);
if (!file_exists($dir)) {
        header('location:view_our_spareparts.php?msg1=Such directory does not exist');
    }
else
rmdir($dir);
if($res && $res1)
	 header('location:view_our_spareparts.php?msg1=The product is deleted');
else
	 header('location:view_our_spareparts.php?msg1=The product could not be deleted');	 
?>