<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin_student"]) || $_SESSION["loggedin_student"] !== true){
	header("location: login_overall.php");
	exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body{ font: 14px sans-serif; text-align: center; }
		.btn_showtable {
			background-color: #4CAF50;
		}
	</style>
	<base target="_parent">
</head>
<body>
	<div class="row" style="height:100px;">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">Mentor-Mentee System</a>
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Sign Out</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="reset_password_student.php">Reset Password</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="#">Overview</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="register_overall.php">Register</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#">Login</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-8">
			<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
		</div>
		<div class="col-lg-2"></div>
	</div>

	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<p>
				<a href="reset_password_student.php" class="btn btn-warning">Reset Your Password</a>
				<a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
			</p>
			<p>
				<a href="show_table.php" class="btn btn_showtable">Show Table</a>
			</p>
		</div>
		<div class="col-lg-4"></div>
	</div>
</body>
</html>
