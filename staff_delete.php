<?php
include 'db.php';
$conn->query("DELETE FROM staff WHERE id=".$_GET['id']);
header("Location: staff_list.php");
?>
