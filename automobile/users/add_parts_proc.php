<?php
session_start();
$username=$_SESSION['cname'];
$userid=$_SESSION['cid'];
$name=$_POST['name'];
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
require('../class/twotier.php');
$ob=new twotier();
$sql="insert into spareparts(productname,companyname,year,hands,specification,price,description,category,subcategory,userid)
values('$name','$company','$year','$hands','$specification','$price','$description','$category','$subcategory','$userid')";
$res=$ob->query($sql);
$sql="SELECT * FROM `spareparts` ORDER by  id DESC LIMIT 1";
$res=$ob->query($sql);
if($row=mysqli_fetch_assoc($res))
{
$pid=$row['id'];
//echo $pid;
$path3='images/'.$name.'_'.$pid.'/';
mkdir($path3);
$target_dir = $path3;
}
if(!empty($_FILES['file1']['name']))
{
$file1=$_FILES['file1']['name'];
$target_file = $target_dir . basename($_FILES["file1"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
    header('location:add_spareparts.php?msg1=Sorry, file1 already exists.');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file1"]["size"] > 500000) {
   header('location:add_spareparts.php?msg1=Sorry, your file1 is too large.');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   header('location:add_spareparts.php?msg1=Sorry, only JPG, JPEG, PNG & GIF files are allowed but file1 is not.');
    $uploadOk = 0;
}
if($uploadOk==1)
{
move_uploaded_file($_FILES['file1']['tmp_name'],$path3.$_FILES['file1']['name']);
$sql="insert into gallery(pid,filename) values('$pid','$file1')";
$res=$ob->query($sql);
}
}
if(!empty($_FILES['file2']['name']))
{
$file2=$_FILES['file2']['name'];
$target_file = $target_dir .$username."_". basename($_FILES["file2"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
    header('location:add_spareparts.php?msg1=Sorry, file2 already exists.');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file2"]["size"] > 500000) {
   header('location:add_spareparts.php?msg1=Sorry, your file2 is too large.');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   header('location:add_spareparts.php?msg1=Sorry, only JPG, JPEG, PNG & GIF files are allowed but file2 is not.');
    $uploadOk = 0;
}
if($uploadOk==1)
{
move_uploaded_file($_FILES['file2']['tmp_name'],$path3.$_FILES['file2']['name']);
$sql="insert into gallery(pid,filename) values('$pid','$file2')";
$res=$ob->query($sql);
}
}
if(!empty($_FILES['file3']['name']))
{
$file3=$_FILES['file3']['name'];
$target_file = $target_dir .$username."_". basename($_FILES["file3"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
    header('location:add_spareparts.php?msg1=Sorry, file3 already exists.');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file3"]["size"] > 500000) {
   header('location:add_spareparts.php?msg1=Sorry, your file3 is too large.');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   header('location:add_spareparts.php?msg1=Sorry, only JPG, JPEG, PNG & GIF files are allowed but file3 is not.');
    $uploadOk = 0;
}
if($uploadOk==1)
{
move_uploaded_file($_FILES['file3']['tmp_name'],$path3.$_FILES['file3']['name']);
$sql="insert into gallery(pid,filename) values('$pid','$file3')";
$res=$ob->query($sql);
}
}
if(!empty($_FILES['file4']['name']))
{
$file4=$_FILES['file4']['name'];
$target_file = $target_dir .$username."_". basename($_FILES["file4"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if (file_exists($target_file)) {
    header('location:add_spareparts.php?msg1=Sorry, file4 already exists.');
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file4"]["size"] > 500000) {
   header('location:add_spareparts.php?msg1=Sorry, your file4 is too large.');
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
   header('location:add_spareparts.php?msg1=Sorry, only JPG, JPEG, PNG & GIF files are allowed but file4 is not.');
    $uploadOk = 0;
}
if($uploadOk==1)
{
move_uploaded_file($_FILES['file4']['tmp_name'],$path3.$_FILES['file4']['name']);
$sql="insert into gallery(pid,filename) values('$pid','$file4')";
$res=$ob->query($sql);
}
}
header('location:add_spareparts.php?msg1=New spare parts details added successfully.');
?>