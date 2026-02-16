<?php
include 'db.php';
if(!isset($_SESSION['admin'])) header("Location: index.php");

/* SEARCH */
$where = "";
if(isset($_POST['search'])){
    $keyword = $_POST['keyword'];
    $where = "WHERE s.full_names LIKE '%$keyword%' 
              OR s.index_number LIKE '%$keyword%' 
              OR s.email LIKE '%$keyword%'";
}

/* JOIN QUERY */
$query = "
SELECT s.*, 
       e.name AS education_name,
       d.name AS duty_station_name,
       sw.name AS software_name,
       l.name AS language_name
FROM staff s
LEFT JOIN education_levels e ON s.education_id = e.id
LEFT JOIN duty_stations d ON s.duty_station_id = d.id
LEFT JOIN software_expertise sw ON s.software_id = sw.id
LEFT JOIN languages l ON s.language_id = l.id
$where
ORDER BY s.id DESC
";

$result = $conn->query($query);
?>

<h2>Staff Listing</h2>

<form method="POST">
Search: <input type="text" name="keyword">
<button name="search">Search</button>
</form>

<br>

<table border="1" cellpadding="5">
<tr>
<th>Index No</th>
<th>Full Names</th>
<th>Email</th>
<th>Location</th>
<th>Education</th>
<th>Duty Station</th>
<th>Remote</th>
<th>Software</th>
<th>Software Level</th>
<th>Language</th>
<th>Responsibility</th>
<th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?= $row['index_number'] ?></td>
<td><?= $row['full_names'] ?></td>
<td><?= $row['email'] ?></td>
<td><?= $row['current_location'] ?></td>
<td><?= $row['education_name'] ?></td>
<td><?= $row['duty_station_name'] ?></td>
<td><?= $row['remote_available'] ? 'Yes' : 'No' ?></td>
<td><?= $row['software_name'] ?></td>
<td><?= $row['software_level'] ?></td>
<td><?= $row['language_name'] ?></td>
<td><?= $row['responsibility_level'] ?></td>
<td>
<a href="staff_edit.php?id=<?= $row['id'] ?>">Edit</a> |
<a href="staff_delete.php?id=<?= $row['id'] ?>" 
onclick="return confirm('Delete this record?')">
Delete
</a>
</td>
</tr>
<?php } ?>

</table>

<br>
<a href="dashboard.php">Back to Dashboard</a>
