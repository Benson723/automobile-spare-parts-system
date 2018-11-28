<?php
	   if(isset($_POST['submit']))
		{
			session_start();
			//$username=$_SESSION['cname'];
			$id=$_SESSION['cid'];
			require('../class/twotier.php');
			$ob=new twotier();
			$userid=$_POST['h1'];
		   $msg=$_POST['msg'];
		  echo $sql="insert into messages(senderid,receiverid,msg) values('$id','$userid','$msg')";
		   $res=$ob->query($sql);
		  
		   header('location:chat_history.php?userid='.$userid);
	   }
	   ?>