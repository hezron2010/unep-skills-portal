<?php
include 'db.php';
if(!isset($_SESSION['admin'])) header("Location: index.php");

/* ADD */
if(isset($_POST['add'])){
    $name = $_POST['name'];
    $stmt = $conn->prepare("INSERT INTO  duty_stations (name) VALUES (?)");
    $stmt->bind_param("s", $name);
    $stmt->execute();
}

/* DELETE */
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $conn->query("DELETE FROM  duty_stations WHERE id=$id");
}
?>

<h2>Manage Duty Station</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Duty Station">
    <button name="add">Add</button>
</form>

<br>

<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM  duty_stations");
while($row = $result->fetch_assoc()){
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['name'] ?></td>
<td>
<a href="?delete=<?= $row['id'] ?>" 
onclick="return confirm('Delete this record?')">
Delete
</a>
</td>
</tr>
<?php } ?>
</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>
