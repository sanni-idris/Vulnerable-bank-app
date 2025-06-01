<?php
include_once 'logger.php';
log_event("Page accessed: /var/www/html/vulbapp/update-profile.php");

session_start();

// Database connection setup
$host = 'localhost';
$user = 'root';
$pass = 'Working247365$';
$dbname = 'vulbapp';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simulate logged-in user
// Normally you'd get this from session or authentication system
$_SESSION['user_id'] = 1;  // Example: logged-in user with ID 1

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // No check to verify if logged-in user owns this profile (Broken Access Control)
    $id = $_POST['id'];  
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET username='$username', password='$password' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Profile updated for user ID: " . htmlspecialchars($id);
    } else {
        echo "Error updating profile: " . $conn->error;
    }
    exit;
}

$id = $_GET['id'] ?? $_SESSION['user_id']; // User can change this in the URL

$sql = "SELECT id, username FROM users WHERE id=$id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

?>

<form method="POST" action="update-profile.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
    Username: <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Update Profile">
</form>
