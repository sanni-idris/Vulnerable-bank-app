<?php
include_once 'logger.php';
log_event("Page accessed: /var/www/html/vulbapp/sqli.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$user = "root";
$pass = "Working247365$";
$db = "vulbapp"; 

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vulnerable query
    $sql = "SELECT * FROM users WHERE username ='$username'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<h3>✅ Logged in successfully!</h3>";
    } else {
        echo "<h3>❌ Invalid login</h3>";
    }
}
?>

<!-- Simple login form -->
<form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username"><br>
    <label>Password:</label><br>
    <input type="password" name="password"><br><br>
    <button type="submit">Login</button>
</form>

