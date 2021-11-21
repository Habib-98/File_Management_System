<?php
require("connection.php");
error_reporting(0);
$uname=$_POST['uname'];
$email=$_POST['email'];
$pass=sha1($_POST['pass']);
$rpass=sha1($_POST['rpass']);
$user_ans=$_POST['security'];
$ans=$_POST['ans'];
if($uname != "" && $_POST['pass'] != "" && $rpass!='' && $user_ans != '') {
	if ($user_ans == $ans) {
		$query="SELECT * FROM members WHERE username='$uname' AND email='$email'";
		$data=mysqli_query($conn,$query);
		$total=mysqli_num_rows($data);
		if($total==1){
			$query="UPDATE members SET passwoard='$pass'";
			$data=mysqli_query($conn,$query);
			if ($data) {
				header('location:signin.php');
			}else{
				$_SESSION["error"] = "something wrong try again!!";
				header('location:forget_pass1.php');
			}
			
		}else{
			$_SESSION["error"] = "Username or email not match!!";
			header('location:forget_pass1.php');
		}
	}else{
		$_SESSION["error"] = "Security answar is wrong!!";
		header('location:forget_pass1.php');
	}
}else{
	$_SESSION["error"] = "Fill the form first!!";
	header('location:forget_pass1.php');
}
?>