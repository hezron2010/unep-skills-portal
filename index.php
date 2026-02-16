<?php
include 'db.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $result = $conn->query("SELECT * FROM admins 
                            WHERE username='$username' 
                            AND password='$password'");

    if($result->num_rows > 0){
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid login!";
    }
}
?>

<h2>Admin Login</h2>
<form method="POST">
Username: <input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br><br>
<button name="login">Login</button>
</form>
