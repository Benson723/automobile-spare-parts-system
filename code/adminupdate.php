<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
			session_start();
			$accessname=$_SESSION['accessname'];
			include_once 'db.php';
			$ob=new db();
			$sql = "SELECT * FROM admin where accessname='$accessname'";
			$res=$ob->execute($sql);
			while($r=mysql_fetch_array($res))
			{
				$adminname=$r['adminname'];
				$adminemail=$r['adminemail'];
				$adminphone=$r['adminphone'];
				$accessname=$r['accessname'];
				$password=$r['password'];
				$adminimage=$r['adminimage'];
			}
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>update admin details</title>
</head>

<body>


<form  action=" " method="post" >
<h2>welcome, <?php echo $accessname;?></h2> 
<center>
<h4>Admin Details</h4>
<table cellpadding="5" >
  <tr>
    <td>Admin Name</td>
    <td><input type="text" name="adminname"  value="<?php echo $adminname?>"></td>
  </tr>
  <tr>
    <td>Admin Email</td>
    <td><input type="text" name="adminemail" value= "<?php echo $adminemail?>"></td>
  </tr>
  <tr>
    <td>Admin Phone</td>
    <td><input type="text" name="adminphone" value="<?php echo $adminphone?>"></td>
  </tr>
  <tr>
    <td>Access Name</td>
    <td><input type="text" name="accessname" value="<?php echo $accessname?>"></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" value="<?php echo $password?>"></td>
  </tr>
  <tr>
    <td>Admin Image</td>
    <td><input type="file" name="adminimage" value="<?php echo $adminimage?>"></td>
  </tr>
  
</table>
    <input type="submit"  value="update" name="update" >
     
</center>
</form>
<?php
if(isset($_POST['update']))
{
$adminname=$_POST['adminname'];
$adminemail=$_POST['adminemail'];
$adminphone=$_POST['adminphone'];
$accessname=$_POST['accessname'];
$password=$_POST['password'];
$adminimage=$_POST['adminimage'];
include_once 'db.php';
$ob=new db();
$sql="update admin set adminname='$adminname',adminemail='$adminemail',adminphone='$adminphone',password='$password',adminimage='$adminimage' where accessname='$accessname'";
$res=$ob->execute($sql);

}

?>


</body>
</html>