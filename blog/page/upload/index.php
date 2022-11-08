<?php
session_start();
include_once "../../../config.php";
$json = $_GET["id"];
$arr = json_decode($json, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="../../fram/css/form_one.css">
</head>
<body>
    <?php
    switch ($IDS) {
        case 'one':
            include "main.php";
            break;
        
        default:
            echo 'PHP link eror IDS';
            break;
    }
       
    ?>
</body>
</html>