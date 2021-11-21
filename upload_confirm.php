<?php 
require("connection.php");
error_reporting(0);
session_start();
$uname=$_SESSION['uname'];

$category=$_POST['category'];
$name= $_FILES["fileup"]["name"];

if ($category && $name) {

	$temp_name= $_FILES["fileup"]["tmp_name"];
	$folder="file/".$name;
	$filesize = filesize($folder); 
	$filesize = round($filesize / 1024 / 1024, 1);
	if ($filesize < 50) {
		move_uploaded_file($temp_name, $folder);
		date_default_timezone_set("Asia/dhaka");
		
		$format="%d/%m/%Y %H:%M:%S";
		$time=strftime($format);
		$query="INSERT INTO file_collection VALUES (NULL, '$name','$folder','$uname','$category','$time')";
		$data=mysqli_query($conn , $query);
		if($data){
			header('location:index.php');
		}else{
			$_SESSION["error"] = " Something wrong try again!!";
			header('location:upload.php');
		}
	}else{
		$_SESSION["error"] = " File size must be less then 50mb";
		header('location:upload.php');
	}
}else{
	$_SESSION["error"] = "File the form first!!";
	header('location:upload.php');
}
?>