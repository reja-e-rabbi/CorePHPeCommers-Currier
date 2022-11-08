<?php
if (($_SESSION["password"] == null or 0) or ($_SESSION["rolls"] == '') or ($_SESSION["name"] == '' or null)) {
  # code...
  header("location: /blog/page/log/login.php");
} 
 ?>
