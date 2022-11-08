<?php
if ($_COOKIE["location"]== '') {
  header("location: /blog/page/sequr/location.php");
}
session_start();
if ($_GET["id"] == '') {
    header("location: /index.php");
}else {
    session_start();
    $get = $_GET["id"];
    $arr = json_decode(base64_decode($get),true);
    $IDS = $arr["IDS"];
    $DBS = $arr["DBS"];
    $OPS = $arr["OPS"];
    $SOPS = $arr["SOPS"];
    $EOPS = $arr["EOPS"];
    $locPub = json_decode($_COOKIE["location"], true);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
     <meta property="og:url"           content="https://www.fiopl.com/index.php" />
     <meta property="og:type"          content="website" />
     <meta property="og:title"         content="Best ecomers service" />
     <meta property="og:description"   content="Your description" />
     <meta property="og:image"         content="https://www.fiopl.com/blog/upload/image.jpg" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | FIOPL </title>
    <link rel="stylesheet" href="/blog/fram/css/grid.css" />
    <link rel="stylesheet" href="/main.css" />
    <script src="../../fram/js/script.js"></script>
    <script src="/main.js"></script>
  </head>
  <body>
    <div id="grid">
        <?php include "../../../header.php";?>
    <!--<div class="carosel-v location">
        <div class="flex-col">
            <div class="para">
            <h1>Enter Your Loceation</h1>
            <p>Set your villege and pollice station to get perfect store</p>
            </div>
            <div class="form">
            <select class="size" name="state" id="">
            <option selected = "selected" value="Dhaka">Sylet</option>
            <option value="Dhaka">Dhaka</option>
            </select>
            <input class="size" placeholder="Dhanua,Shibpur" type="search" name="search" id="">
            <p class="size">Search</p>
            </div>
        </div>
    </div>-->
    <?php include "../../../sidnav.php"; ?>
    <div class="container mainapp">
    <?php
         switch ($IDS) {
             case 'public':
                 include "main.php";
                 break;
             case 'side':
                include "side.php";
                break;
             default:
                 echo "check the perfect value";
                 break;
         }
    ?>
    </div>
  </div> 
    <?php
include "../../../footer.php";
    ?>
    <script src="/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
  </body>
</html>
