<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
   
    <body>
                </form>
                <center>
                <h1>VIEW DETAILS</h1>
<table >
  <tr>
    <td>Admin name:</td>
    <td><?php echo $adminname?></td>
  </tr>
  <tr>
    <td>Admin email</td>
    <td><?php echo $adminemail?></td>
  </tr>
  <tr>
    <td>Admin Phoneno.</td>
    <td><?php echo $adminphone?></td>
  </tr>
  <tr>
    <td>Access name</td>
    <td><?php echo $accessname?></td>
  </tr>
  <tr>
    <td>Admin image</td>
    <td><img src="images/<?php echo $adminimage;?>" width="100" height="100" alt="IMG"></td>
  </tr>
</table>
</center>
</form><br class="clear" />
                    
			  </div>
			</div>
			
		</div>
    </body>
</html>