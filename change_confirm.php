<?php
require('connection.php');
error_reporting(0);
session_start();
session_regenerate_id( true);
$uname=$_SESSION['uname'];
$sql="select * from members WHERE username='$uname'";
$data=mysqli_query($conn,$sql);
$info=mysqli_fetch_assoc($data);

$old_save_pass=$info['passwoard'];
$pass=sha1($_POST['pass']);
$rpass=sha1($_POST['rpass']);
$oldpass=sha1($_POST['oldpass']);

if ($old_save_pass == $oldpass) {
	if ($pass!='' && $rpass!='' && $pass== $rpass) {
		$query="UPDATE members SET passwoard='$pass' WHERE username='$uname'";
		$data=mysqli_query($conn , $query);
		if($data){
			header("location:index.php");
		}else{
			$_SESSION["error"] = "Something wrong!!";
			header('location:change.php');
		}
	}else{
		$_SESSION["error"] = "Password not match";
		header('location:change.php');
	}
}else{
	$_SESSION["error"] = "Old password is wrong!!";
	header('location:change.php');	
}
?>