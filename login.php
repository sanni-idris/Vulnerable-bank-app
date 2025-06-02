<?php
include_once 'logger.php';
session_start();

log_event("Page accessed: /var/www/html/vulbapp/login.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    // Dummy credentials
    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['loggedin'] = true;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Username: <input type="text" name="username" required /></label><br>
        <label>Password: <input type="password" name="password" required /></label><br>
        <input type="submit" value="Login" />
    </form>
</body>
</html>

