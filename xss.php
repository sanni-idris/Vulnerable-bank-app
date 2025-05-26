<?php
if (isset($_POST['comment'])){
    $comment = $_POST['comment'];
    file_put_contents("comments.txt", $comment . "\n", FILE_APPEND);
}
$comments = file_exists("comments.txt") ? file("comments.txt") : [];
?>

 <h3>Leave a Comment</h3>
 <form method="post">
  <textarea name="comment" rows="4" cols="50"></textarea><br>
  <input type="submit" value="Submit">
</form>

<h4>All comments</h4>
<?php foreach ($comments as $c): ?>
<p><?php echo $c; ?></p> <!-- No sanitization! -->
<?php endforeach; ?>
