<?php
session_start();
include_once "../admin/config.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Creat Product</title>
    <link rel="stylesheet" href="../admin/main.css" />
  </head>
  <body>
    <div id="grid">
      <?php include "header.php" ?>
      <?php include "sidnav.php" ?>
      <div class="flex-col">
        <?php
        include "product.php";
        ?>
      </div>
    </div>
  </body>
</html>
