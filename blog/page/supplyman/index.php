<?php
session_start();
$get = $_GET["id"];
$arr = json_decode($get, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
$allarr = $_SESSION["all"];
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home | Serviceman</title>
    <link rel="stylesheet" href="../admin/main.css" />
    <script src="../../fram/js/script.js"></script>
  </head>
  <body>
    <div id="grid">
      <?php
      include "header.php";
      include "sidnav.php"; ?>
      <div class="flex-col app">
        <?php
        switch ($IDS) {
          case '1':
            include "main.php";
            break;
          default:
           echo "there have no value";
            break;
        }
        ?>
     
    </div>
    <script src="app.js"></script>
  </body>
</html>
