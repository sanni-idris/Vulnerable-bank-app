<?php
include_once 'logger.php';
log_event("Page accessed: /var/www/html/vulbapp/edit-profile.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection
$host = "localhost";
$user = "root";
$pass = "Working247365$";
$db = "vulbapp";

$connection = new mysqli($host, $user, $pass, $db);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$user_id = $_GET['user_id'] ?? 0;

$query = "SELECT username FROM users WHERE id = $user_id";
$result = $connection->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
// ... your existing connection and query code ...

// Assume you fetched user info into $user array after query

echo "<h2>Editing Profile for User ID: " . htmlspecialchars($user['id']) . "</h2>";
echo "<p>Username: " . htmlspecialchars($user['username']) . "</p>";

// Optionally, show a logged-in user message (if applicable)
// echo "<p>Logged in as User ID: 1</p>"; // For demonstration, hardcoded or from session

// ... rest of your page HTML ...

   echo "<h1>Edit Profile - User ID $user_id</h1>";
    echo "Username: " . htmlspecialchars($row['username']) . "<br>";
} else {
    echo "No user found with ID $user_id.";
}

$connection->close();
?>

