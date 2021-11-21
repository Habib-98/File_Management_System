<?php
require("connection.php");
error_reporting(0);
$fname=$_POST['fname'];
$uname=$_POST['uname'];
$email=$_POST['email'];
$pass=sha1($_POST['pass']);
$gender=$_POST['gender'];
$name= $_FILES["upic"]["name"];
if($fname != "" && $uname != "" && $email != "" && $pass != "" && sha1($_POST['rpass'])!="" && $gender!=""){
	if ($pass == sha1($_POST['rpass'])) {		
		
		if ($name == "") {			
			if ($gender == "male") {
				$folder="propic/male.png";
			}else{
				$folder="propic/female.png";
			}
		}else{
			$temp_name= $_FILES["upic"]["tmp_name"];
			$folder="propic/".$name;
			move_uploaded_file($temp_name, $folder);			
		}			
									
			$query="INSERT INTO members VALUES (NUll,'$uname', '$fname', '$email', '$pass','$folder','$gender')";
			$data=mysqli_query($conn , $query);
			if($data){
				header('location:signin.php');
			}else{
			$_SESSION["error"] = "Something wrong try again!!";
				header('location:signup.php');
			}							
	}else{
		$_SESSION["error"] = "Password not match!!";
		header('location:signup.php');
	}
}else{
	$_SESSION["error"] = "File the form first!!";
	header('location:signup.php');
}	
?>