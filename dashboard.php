<?php
include_once 'logger.php';
log_event("Page accessed: /var/www/html/vulbapp/dashboard.php");

// Vulnerable: No session or login validation
echo "<h2>Welcome to your dashboard!</h2>";
echo "<p>This is sensitive content only logged-in users should see.</p>";
?>
