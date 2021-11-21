<?php
	require('connection.php');
	error_reporting(0);
	if (isset($_REQUEST['id'])) {
	$id=$_REQUEST['id'];
	$query="SELECT fileloc FROM file_collection WHERE id='$id'";
	$data=mysqli_query($conn,$query);
	$file=mysqli_fetch_assoc($data);
	unlink($file['fileloc']);
	$query="DELETE FROM file_collection WHERE id=$id";
	$data=mysqli_query($conn,$query);
	header('location:index.php');
}
?>