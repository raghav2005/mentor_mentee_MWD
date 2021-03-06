<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin_teacher"]) && $_SESSION["loggedin_teacher"] === true){
	header("location: welcome_teacher.php");
	exit;
}

if(isset($_SESSION["loggedin_student"]) && $_SESSION["loggedin_student"] === true){
	header("location: welcome_student.php");
	exit;
}

// Include config file
require_once "config.php";
?>
 
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Login</title>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

		<style>
			body{ font: 14px sans-serif; }
			.wrapper{ width: 360px; padding: 20px; }
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
								<a class="nav-link" href="register_overall.php">Register</a>
							</li>
							<li class="nav-item">
								<a class="nav-link active" href="#">Login</a>
							</li>
						</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-bs-toggle="tab" href="#home">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#student_tab">Student</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-bs-toggle="tab" href="#teacher_tab">Teacher</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div id="home" class="container tab-pane active" style="height:350px; width:350px;"><br />
						<h5>Please fill in your credentials in the Student Tab or the Teacher Tab to login.</h5>
					</div>
					<div id="student_tab" class="container tab-pane fade" style="height:350px; width:350px;"><br />
						<iframe src="login_student.php" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" height="350px" width="350px"></iframe>
					</div>
					<div id="teacher_tab" class="container tab-pane fade" style="height:350px; width:350px;"><br />
						<iframe src="login_teacher.php" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" height="350px" width="350px"></iframe>
					</div>
				</div>
			</div>
			<div class="col-lg-4"></div>
		</div>
	</body>
</html>
