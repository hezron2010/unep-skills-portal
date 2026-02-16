<?php
include 'db.php';
if(!isset($_SESSION['admin'])) header("Location: index.php");

$search = "";
if(isset($_POST['search'])){
$search = $_POST['keyword'];
$query = "SELECT * FROM staff 
WHERE full_names LIKE '%$search%' 
OR index_number LIKE '%$search%'";
}else{
$query = "SELECT * FROM staff";
}

$result = $conn->query($query);
?>

<h2>Staff List</h2>

<form method="POST">
Search: <input name="keyword">
<button name="search">Search</button>
</form><br>

<table border="1">
<tr>
<th>Index</th>
<th>Name</th>
<th>Email</th>
<th>Location</th>
<th>Education</th>
<th>Duty Station</th>
<th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?= $row['index_number'] ?></td>
<td><?= $row['full_names'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['current_location'] ?></td>
<td><?= $row['education_id'] ?></td>
<td><?= $row['duty_station_id'] ?></td>
<td>
<a href="staff_edit.php?id=<?= $row['id'] ?>">Edit</a>
<a href="staff_delete.php?id=<?= $row['id'] ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>
