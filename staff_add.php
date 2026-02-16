<?php
include 'db.php';
if(!isset($_SESSION['admin'])) header("Location: index.php");

if(isset($_POST['save'])){

$stmt = $conn->prepare("INSERT INTO staff
(index_number, full_names, email, current_location,
education_id, duty_station_id, remote_available,
software_id, software_level, language_id, responsibility_level)
VALUES (?,?,?,?,?,?,?,?,?,?,?)");

$stmt->bind_param("ssssiiisiss",
$_POST['index_number'],
$_POST['full_names'],
$_POST['email'],
$_POST['current_location'],
$_POST['education_id'],
$_POST['duty_station_id'],
$_POST['remote_available'],
$_POST['software_id'],
$_POST['software_level'],
$_POST['language_id'],
$_POST['responsibility_level']
);

$stmt->execute();
echo "Staff Added Successfully!";
}
?>

<h2>Add Staff</h2>

<form method="POST">
Index Number: <input name="index_number"><br><br>
Full Names: <input name="full_names"><br><br>
Email: <input name="email"><br><br>
Current Location: <input name="current_location"><br><br>

Education:
<select name="education_id">
<?php
$res = $conn->query("SELECT * FROM education_levels");
while($row = $res->fetch_assoc()){
echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
?>
</select><br><br>

Duty Station:
<select name="duty_station_id">
<?php
$res = $conn->query("SELECT * FROM duty_stations");
while($row = $res->fetch_assoc()){
echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
?>
</select><br><br>

Remote Available:
<select name="remote_available">
<option value="1">Yes</option>
<option value="0">No</option>
</select><br><br>

Software:
<select name="software_id">
<?php
$res = $conn->query("SELECT * FROM software_expertise");
while($row = $res->fetch_assoc()){
echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
?>
</select><br><br>

Software Level:
<input name="software_level"><br><br>

Language:
<select name="language_id">
<?php
$res = $conn->query("SELECT * FROM languages");
while($row = $res->fetch_assoc()){
echo "<option value='{$row['id']}'>{$row['name']}</option>";
}
?>
</select><br><br>

Responsibility Level:
<input name="responsibility_level"><br><br>

<button name="save">Save</button>
</form>
