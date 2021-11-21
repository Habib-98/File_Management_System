<?php 
require("connection.php");
error_reporting(0);
session_start();
$uname=$_SESSION['uname'];
$query="select * from members where username='$uname'";
$data=mysqli_query($conn,$query);
$profile=mysqli_fetch_assoc($data);

$name= $_FILES["fileup"]["name"];
if ($name) {
	if ($profile['propic']!="propic/female.png" && $profile['propic']!="propic/male.png") {
		unlink($profile['propic']);
	}
	$temp_name= $_FILES["fileup"]["tmp_name"];
	$folder="propic/".$name;
	move_uploaded_file($temp_name, $folder);
	$query="UPDATE members SET propic='$folder' WHERE username='$uname'";
		$data=mysqli_query($conn , $query);
		if($data){
			header('location:index.php');
		}else{
		$_SESSION["error"] = "Something wrong!!";
			header('location:change_propic.php');
		}
}else{
	$_SESSION["error"] = "Select first";
	header('location:change_propic.php');
}
?>
