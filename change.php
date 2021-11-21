<?php
require('connection.php');
error_reporting(0);
session_start();
session_regenerate_id(true);
$uname = $_SESSION['uname'];
if ($uname = true) {
} else {
	header("location:signin.php");
}

$query = "select * from members where username='$uname'";
$data = mysqli_query($conn, $query);
$info = mysqli_fetch_assoc($data);

$query = "select * from file_collection where username='$uname'";
$data1 = mysqli_query($conn, $query);
$totalfile = mysqli_num_rows($data1);

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Habib_35 | Change password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Eagle+Lake|Fjalla+One|Merriweather|Orbitron&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/signup_in.css">
	<style type="text/css">
		.name_head a h2 {
			padding-top: 5px;
			color: #F44336;
			font-family: 'Atomic Age', cursive;
		}

		.name_head p {
			padding-top: 5px;
			color: #d1d8e0;
			font-size: 20px;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<?php
		include('header.php');
		?>
	</div>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark sticky-top ">
		<a href="#" class="navbar-brand">
			<img src="img/img1.jpg" style="width: 50px; height: 25px;">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsenav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsenav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a href="index.php" class="nav-link active">Home</a>
				</li>
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn btn-dark dropdown-toggle" data-toggle="dropdown"><?php echo $info['name']; ?></button>
						<div class="dropdown-menu">
							<a href="change_propic.php" class="dropdown-item">Update Profile Pictute</a>
							<a href="change.php" class="dropdown-item">Change password</a>
							<a href="delete.php" class="dropdown-item">Delete profile</a>
							<a href="logout.php" class="dropdown-item">log out</a>
						</div>
					</div>
				</li>
				<li class="nav-item">
					<a href="upload.php" class="nav-link ">upload</a>
				</li>
				<li class="nav-item">
					<a href="about.php" class="nav-link">About us</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 signup_css">
				<h2 class="text-center">Change</h2>
				<?php
				if (isset($_SESSION['error'])) {
				?>
					<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> <?php echo $_SESSION['error'];
												unset($_SESSION['error']); ?>
					</div>
				<?php
				}
				?>
				<form action="change_confirm.php" method="POST">
					<div class="form-group">
						<label for="pass">Old Password:</label>
						<input type="password" name="oldpass" class="form-control" id="pass">
					</div>
					<div class="form-group">
						<label for="pass">New Password:</label>
						<input type="password" name="pass" class="form-control" id="pass">
					</div>
					<div class="form-group">
						<label for="rpass"> Repeat Password:</label>
						<input type="password" name="rpass" class="form-control" id="rpass">
					</div>
					<input type="Submit" class="btn btn-outline-secondary" name="change" value="Change">
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<?php
	include('footer.php');
	?>
</body>

</html>