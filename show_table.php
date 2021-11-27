<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: login.php");
	exit;
}

// Include config file
require_once "config.php";

// SQL query to select data from database
$sql = "SELECT p.pairingID, CONCAT(s1.studentForename, ' ', s1.studentSurname) AS mentorFullName, s1.studentUsername AS mentorUsername, CONCAT(s2.studentForename, ' ', s2.studentSurname) AS menteeFullName, s2.studentUsername AS menteeUsername, CONCAT(t.teacherForename, ' ', t.teacherSurname) AS teacherFullName, t.teacherUsername, sub.subjectName FROM pairing p JOIN student s1 ON p.pairingMentorID = s1.studentID JOIN student s2 ON p.pairingMenteeID = s2.studentID JOIN teacher t ON t.teacherID = p.pairingTeacherID JOIN subject sub ON sub.subjectID = p.pairingSubjectID";
$result = $mysqli->query($sql);
$mysqli->close();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
		body{ font: 14px sans-serif; text-align: center; }
				table {
			margin: 0 auto;
			font-size: large;
			border: 1px solid black;
		}
		h1 {
			text-align: center;
			font-size: xx-large;
		}
  
		td {
			border: 1px solid black;
		}
  
		th,
		td {
			font-weight: bold;
			border: 1px solid black;
			padding: 10px;
			text-align: center;
		}
  
		td {
			font-weight: lighter;
		}
	</style>
</head>
<body>
  	<section>
		<table id="example" class="display">
			<tr>
				<th>pairingID</th>
				<th>mentorFullName</th>
				<th>mentorUsername</th>
				<th>menteeFullName</th>
				<th>menteeUsername</th>
				<th>teacherFullName</th>
				<th>teacherUsername</th>
				<th>subjectName</th>
			</tr>
			<?php   // LOOP TILL END OF DATA 
				while($rows=$result->fetch_assoc())
				{
			 ?>
			<tr>
				<!--FETCHING DATA FROM EACH
					ROW OF EVERY COLUMN-->
				<td><?php echo $rows['pairingID'];?></td>
				<td><?php echo $rows['mentorFullName'];?></td>
				<td><?php echo $rows['mentorUsername'];?></td>
				<td><?php echo $rows['menteeFullName'];?></td>
				<td><?php echo $rows['menteeUsername'];?></td>
				<td><?php echo $rows['teacherFullName'];?></td>
				<td><?php echo $rows['teacherUsername'];?></td>
				<td><?php echo $rows['subjectName'];?></td>
			</tr>
			<?php
				}
			 ?>
		</table>
	</section>
</body>
</html>
