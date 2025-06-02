<?php
session_start();

require_once 'logger.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if ($user === 'admin' && $pass === 'admin123') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user;
        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}

log_event("Page accessed: /var/www/html/vulbapp/index.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>

<?php if (!empty($_SESSION['loggedin'])): ?>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>You have successfully logged in.</p>
<?php else: ?>
    <h2>Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <label>Username: <input type="text" name="username" required /></label><br><br>
        <label>Password: <input type="password" name="password" required /></label><br><br>
        <input type="submit" value="Login" />
    </form>
<?php endif; ?>

</body>
</html>

