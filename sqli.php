<?php
 // DB credentials
$host = "localhost";
$user = "root";
$pass = "Working247365$";
$db = "vulnlab";

//Connect to DB
$conn = mysqli_connect($host, $user, $pass, $db);

//check connection
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
//check form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = $_POST['username'];
   $password = $_POST['password'];
//vulnerable sql query
$sql =  "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    echo "<h3>Welcome, " . htmlspecialchars($username) . "!</h3>";
    } else {
      echo "<h3>Login failed.</h3>";
    }

}
?>

<h3>Login</h3>
<form method="POST">
  Username: <input name="username"><br>
  password: <input type="password" name="password"><br>
  <input type="submit" value="login">
</form>
