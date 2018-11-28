<?php
class twotier
{
 public $con,$res,$db;
 public function connect()
 {
    $a= $this->con= mysqli_connect("localhost","root","","automobile");// $this usage current object points
     //$this->db=mysqli_select_db("test");
	 return $a;
	 
 }
 
 public function query($q) {
	  $conn=$this->connect();
     $this->res=mysqli_query($conn,$q);
//echo $this->res;
     return $this->res;
 
 }
  
}
?>
