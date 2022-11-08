<?php
session_start();
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>accunts</title>
    <link rel="stylesheet" href="../admin/main.css" />
    <link rel="stylesheet" href="../../fram/css/table-default.css" />
  </head>
  <body>
    <div id="grid">
      <?php
      include "../admin/header.php";
      include "sidnav.php";
      ?>
      <div class="flex-col">
        <?php
        //$IDS = $_GET["id"];
        include "main.php";
        ?>
      </div>
    </div>
    <script src="../../fram/js/script.js"></script>
  </body>
</html>
