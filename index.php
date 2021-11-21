<?php
require('connection.php');
session_start();
session_regenerate_id(true);
$uname = $_SESSION['uname'];
if (!$uname) {
	header("location:signin.php");
}
//read user information from database
$query = "SELECT * from members where username='$uname'";
$data = mysqli_query($conn, $query);
$info = mysqli_fetch_assoc($data);
$result_per_page = 10;

$query = "SELECT * from file_collection where username='$uname'";
$data1 = mysqli_query($conn, $query);
$totalfile = mysqli_num_rows($data1);
//pageinaction
$number_of_page = ceil($totalfile / $result_per_page);
if (!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
}
$this_page_first_result = ($page - 1) * $result_per_page;
$sql = "select * from file_collection where username='$uname' order by id desc
limit " . $this_page_first_result . "," . $result_per_page;
$data1 = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Habib_35 | Home</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/f717478b5d.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Atomic+Age|Eagle+Lake|Fjalla+One|Merriweather|Orbitron&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
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
			<div class="col-sm-2 profile">
				<div id="profile">
					<img src="<?php echo $info['propic']; ?>" class="rounded">
				</div>
				<h2 class="text-center"> <?php echo $info['name']; ?> </h2>
				<h4 class="text-center">Total file:<?php echo $totalfile; ?></h4>
			</div>
			<div class="col-sm-9 " style="margin-top: 20px;margin-bottom: 40px;">
				<?php
				if ($totalfile != 0) {
				?>
					<table class="table table-hover table-dark table-striped">
						<tr>
							<th>Name</th>
							<th>Category</th>
							<th>Uploaded</th>
							<th>type</th>
							<th colspan="2" class="text-center">Operation</th>
						</tr>
						<?php
						while ($file = mysqli_fetch_assoc($data1)) {
							echo "<tr>" . "<td>" . $file['filename'] . "</td>";
							echo "<td>" . $file['category'] . "</td>";
							echo "<td>" . $file['date'] . "</td>";
							echo "<td>" . pathinfo($file['fileloc'], PATHINFO_EXTENSION) . "</td>";
							echo "<td>" . "<a class=\"btn btn-outline-info\" download=\" " . $file['fileloc'] . "\" href=\" " . $file['fileloc'] . " \">Download</a>" . "</td>";
							echo "<td>" . "<a class=\"btn btn-outline-danger\" href=\" deletefile.php?id=" . $file['id'] . " \">Delete</a>" . "</td>";
						}
						echo "</tr>";
						?>
					</table>
					<?php
					if ($totalfile == ($result_per_page + 1)) {
					?>
						<ul class="pagination justify-content-center">
							<?php
							if ($page == 1) {
								echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"index.php?page=" . ($page - 1) . "\">Previous</a></li>";
							} else {
								echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page=" . ($page - 1) . "\">Previous</a></li>";
							}
							for ($i = 1; $i <= $number_of_page; $i++) {
								if ($i == $page) {
									echo "<li class=\"page-item active\"><a class=\"page-link\" href=\"index.php?page=" . $i . "\">" . $i . "</a></li>";
								} else {
									echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page=" . $i . "\">" . $i . "</a></li>";
								}
							}
							if ($page == $number_of_page) {
								echo "<li class=\"page-item disabled\"><a class=\"page-link\" href=\"index.php?page=" . ($page + 1) . "\">Next</a></li>";
							} else {
								echo "<li class=\"page-item\"><a class=\"page-link\" href=\"index.php?page=" . ($page + 1) . "\">Next</a></li>";
							}
							?>
						</ul>
				<?php
					}
				} else {
					echo "<h2 class=\"text-center text-white\">No file uploaded yet</h2>";
				}
				?>
			</div>
		</div>
	</div>
	<?php
	include('footer.php');
	?>
</body>

</html>