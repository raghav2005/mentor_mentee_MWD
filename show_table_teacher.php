<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin_teacher"]) || $_SESSION["loggedin_teacher"] !== true){
	header("location: login_overall.php");
	exit;
}

// Include config file
require_once "config.php";

$teacher_name = $_SESSION["username"];

// Prepare an update statement
$sql = "SELECT p.pairingID, CONCAT(s1.studentForename, ' ', s1.studentSurname) AS mentorFullName, s1.studentUsername AS mentorUsername, CONCAT(s2.studentForename, ' ', s2.studentSurname) AS menteeFullName, s2.studentUsername AS menteeUsername, CONCAT(t.teacherForename, ' ', t.teacherSurname) AS teacherFullName, t.teacherUsername, sub.subjectName FROM pairing p JOIN student s1 ON p.pairingMentorID = s1.studentID JOIN student s2 ON p.pairingMenteeID = s2.studentID JOIN teacher t ON t.teacherID = p.pairingTeacherID JOIN subject sub ON sub.subjectID = p.pairingSubjectID WHERE t.teacherUsername = '$teacher_name'";

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
		th {
			cursor: pointer;
		}
		td {
			font-weight: lighter;
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
							<a class="nav-link" href="welcome_teacher.php">Overview</a>
						</li>
						<li class="nav-item active">
							<a class="nav-link" href="#">Show Table</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Sign Out</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="reset_password_teacher.php">Reset Password</a>
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


  	<section>
		<table id="main_table">
			<tr>
				<th onclick="sortTable(0)">pairingID</th>
				<th onclick="sortTable(1)">mentorFullName</th>
				<th onclick="sortTable(2)">mentorUsername</th>
				<th onclick="sortTable(3)">menteeFullName</th>
				<th onclick="sortTable(4)">menteeUsername</th>
				<th onclick="sortTable(5)">teacherFullName</th>
				<th onclick="sortTable(6)">teacherUsername</th>
				<th onclick="sortTable(7)">subjectName</th>
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


	<script>
		function sortTable(n) {
		var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
		table = document.getElementById("main_table");
		switching = true;
		//Set the sorting direction to ascending:
		dir = "asc"; 
		/*Make a loop that will continue until
		no switching has been done:*/
		while (switching) {
			//start by saying: no switching is done:
			switching = false;
			rows = table.rows;
			/*Loop through all table rows (except the
			first, which contains table headers):*/
			for (i = 1; i < (rows.length - 1); i++) {
			//start by saying there should be no switching:
			shouldSwitch = false;
			/*Get the two elements you want to compare,
			one from current row and one from the next:*/
			x = rows[i].getElementsByTagName("TD")[n];
			y = rows[i + 1].getElementsByTagName("TD")[n];
			/*check if the two rows should switch place,
			based on the direction, asc or desc:*/
			if (dir == "asc") {
				if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
				//if so, mark as a switch and break the loop:
				shouldSwitch = true;
				break;
				}
			} else if (dir == "desc") {
				if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
				//if so, mark as a switch and break the loop:
				shouldSwitch = true;
				break;
				}
			}
			}
			if (shouldSwitch) {
			/*If a switch has been marked, make the switch
			and mark that a switch has been done:*/
			rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
			switching = true;
			//Each time a switch is done, increase this count by 1:
			switchcount ++;      
			} else {
			/*If no switching has been done AND the direction is "asc",
			set the direction to "desc" and run the while loop again.*/
			if (switchcount == 0 && dir == "asc") {
				dir = "desc";
				switching = true;
			}
			}
		}
		}
	</script>

	</body>
</html>
