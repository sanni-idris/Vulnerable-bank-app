<?php
if (isset($_FILES['file'])) {
   $file = $_FILES['file']['name'];
   $path = "uploads/" . $file;

   if (move_uploaded_file($_FILES['file']['tmp_name'], $path)) {
       echo "file uploaded successfully: <a href='$path'>$file</a>";
      } else {
         echo "Upload failed.";

        }

}
?>
 <h3>Upload a file</h3>
<form method="POST" enctype="multipart/form-data">
     <input type="file" name="file">
     <input type="submit" value="Upload">
</form>
