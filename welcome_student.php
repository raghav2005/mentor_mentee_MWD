<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin_student"]) || $_SESSION["loggedin_student"] !== true){
	header("location: login_student.php");
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
	<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
	<p>
		<a href="reset_password_student.php" class="btn btn-warning">Reset Your Password</a>
		<a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
	</p>
	<p>
		<a href="show_table.php" class="btn btn_showtable">Show Table</a>
	</p>
</body>
</html>
