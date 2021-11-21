<?php
require("connection.php");
error_reporting(0);
$value1 = mt_rand(1, 2);
$num1 = mt_rand(1, 100);
$num2 = mt_rand(1, 100);
if ($value1 == 1) {
	$operation = "+";
} else {
	$operation = "-";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Habib_35 | Reset Password</title>
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
				<h2 class="text-center">Change Password</h2>
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
				<form action="forget_pass.php" method="POST">
					<div class="form-group">
						<label for="uname">Username:</label>
						<input type="name" name="uname" class="form-control" id="uname">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control" id="email">
					</div>

					<div class="form-group">
						<label for="pass">New Password:</label>
						<input type="password" name="pass" class="form-control" id="pass">
					</div>

					<div class="form-group">
						<label for="rpass">Repeat Password:</label>
						<input type="password" name="rpass" class="form-control" id="rpass">
					</div>
					<div class="form-group">
						<label> Security Question</label>
						<?php
						if ($operation == "+") {
							echo "<label>" . $num1 . "+" . $num2 . "</label>";
							$ans = $num1 + $num2;
						} else {
							echo "<label>" . $num1 . "-" . $num2 . "</label>";
							$ans = $num1 - $num2;
						}
						?>
						<input type="hidden" name="ans" value="<?php echo $ans ?>">
					</div>
					<div class="form-group">
						<label for="security"> Ans</label>
						<input type="text" name="security" class=" form-control" id="security">
					</div>
					<input type="Submit" class="btn btn-outline-primary" name="change_pass" value="Change">
					<a class="btn btn-danger float-right" href="signin.php">Sign in</a>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
</body>

</html>