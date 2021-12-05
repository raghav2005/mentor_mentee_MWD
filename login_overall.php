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
    <title>Overall Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
	<script>
		$(function(){
			$("#student_div").load("login_student.php"); 
		});
    </script> 
</head>
<body>
    <div class="wrapper">
        <h2>Overall Login</h2>
		<div>
			<iframe src="login_student.php" name="targetframe" allowTransparency="true" scrolling="no" frameborder="0" height="350px" width="350px"></iframe>
		</div>
	</div>
</body>
</html>
