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
    <title>Admin</title>
    <link rel="stylesheet" href="main.css" />
    <script src="../../fram/js/script.js"></script>
  </head>
  <body>
    <div id="grid">
      <?php
      include "header.php";
      include "sidnav.php";
      ?>
      <div class="flex-col app">
        <?php
        switch ($IDS) {
          case 'product':
            echo 'product check';
            break;
          case 'pending':
            include '../sells/main.php';
          break;
          default:
            $arr1 = array("IDS"=>'pending',"DBS"=>'select',"OPS"=>'insert');
            $jsonarr1 = urlencode(json_encode($arr1));
            include "../sells/main.php";
            break;
        }
        ?>
      </div>
    </div>
    <script src="../../fram/js/sidnav.js"></script>
    <!--<script src="main.js"></script>-->
  </body>
</html>
