<?php
session_start();
echo $get = $_GET["id"];
$arr = json_decode(base64_decode($get),true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
?>