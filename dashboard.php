<?php
include 'db.php';
if(!isset($_SESSION['admin'])) header("Location: index.php");
?>

<h2>UNEP Skills Portal Dashboard</h2>

<a href="staff_add.php">Add Staff</a><br>
<a href="staff_list.php">View Staff</a><br>
<br>
<h3>Admin Management</h3>
<a href="manage_education.php">Education Levels</a><br>
<a href="manage_duty_station.php">Duty Stations</a><br>
<a href="manage_software.php">Software Expertise</a><br>
<a href="manage_language.php">Languages</a><br><br>

<a href="logout.php">Logout</a>
