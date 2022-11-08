<?php
session_start();
include_once "../../../config.php";
$get = $_GET["id"];
$arr = json_decode($get, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
$allarr = $_SESSION["all"];
//echo $allarr;
$all = json_decode($allarr, true);
$cType = $all["com_type"];
//echo $cType;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company</title>
    <link rel="stylesheet" href="../admin/main.css" />
  </head>
  <body>
    <div id="grid">
      <?php
        include "header.php";
        include "sidnav.php";
        ?>
      <div class="flex-col app">
        <?php
        switch ($OPS) {
          case 'unknow':
            include_once "../product/product.php";
            break;
          default:
            include "main.php";
            break;
        }
        ?>
      </div>
    </div>
    <script src="../../fram/js/script.js"></script>
    <script src="../../fram/js/sidnav.js"></script>
    <script src="app.js"></script>
  </body>
</html>
