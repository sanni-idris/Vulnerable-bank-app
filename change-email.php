<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection info
$host = "localhost";
$user = "root";
$pass = "Working247365$";
$db = "vulbapp";

// Connect
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assume user is logged in with id=1 for simplicity
$userId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newEmail = $_POST['email'];

    // No CSRF token check here = vulnerable!

    // Update email
    $sql = "UPDATE users SET email = '" . $conn->real_escape_string($newEmail) . "' WHERE id = $userId";
    if ($conn->query($sql) === TRUE) {
        echo "Email updated to: " . htmlspecialchars($newEmail);
    } else {
        echo "Error updating email: " . $conn->error;
    }
    exit;
}
?>

<h2>Change Email</h2>
<form method="POST" action="change-email.php">
    <label for="email">New Email:</label>
    <input type="email" id="email" name="email" required>
    <input type="submit" value="Change Email">
</form>
