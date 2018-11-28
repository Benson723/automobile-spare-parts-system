<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>


<body>
<center>
<form name = "f1" action = "" method ="POST">

<table >
  <tr>
    <td>Access Name</td>
    <td><input type="text" name="accessname" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password"  /></td>
  </tr>
</table>
<input type="submit" name="l1" value="Login" />

</form>
</center>
<?php
if(isset($_POST['l1']))
{
	$accessname=$_POST['accessname'];
	$password=$_POST['password'];
	include_once 'database.php';
	$ob=new db();
	$sql="select adminid from admin where accessname ='$accessname' and password='$password'";	
	
	$res=$ob->execute($sql);
	$r=mysql_fetch_array($res);

	if($r!=NULL)
	{
		session_start();
		$_SESSION['accessname']=$accessname;
		header('location:admin.php');
	}
	else
	{
		
		echo "Invalid username or password";
	}
}

?>

	
</body>
</html>