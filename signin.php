<?php
error_reporting(0);
session_start();
if ($_SESSION['uname']) {
	session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Habib_35 | Sign In</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link rel="stylesheet" type="text/css" href="css/signup_in.css">
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 log_css">
				<h2 class="text-center">Sign in</h2>
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
			
				<form action="signin_confirm.php" method="POST">
					<div class="form-group">
						<label for="uname">Username:</label>
						<input type="name" name="uname" class="form-control" id="uname">
					</div>
					<div class="form-group">
						<label for="pass">Password:</label>
						<input type="password" name="pass" class="form-control" id="pass">
					</div>
					<input type="Submit" class="btn btn-outline-primary" name="signin" value="Sign In">
					<a href="forget_pass1.php">Forget password</a>
					<a class="btn btn-danger float-right" href="signup.php">Sign up</a>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>