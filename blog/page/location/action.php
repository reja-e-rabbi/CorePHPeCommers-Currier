<?php
session_start();
include_once "../../../config.php";
include_once "../db/dbcon.php";
$Country = 'Bangladesh';
$location = $_POST[id][0];
$SubState = $_POST[id][1];
$State = $_POST[id][2];
$pState = $_POST[id][3];
$rang = $_POST[id][4];
$IDS = bin2hex(random_bytes(2)).date("Ymd-His");
$Ad = array("name"=> $_SESSION["name"], "email"=> $_SESSION["email"], "id"=>$_SESSION["id"]);
$AddBy = json_encode($Ad);
if ($location == null || $SubState == null || $State == null) {
    echo '<p>this Valu is null </p>';
} else {
$qu = "select ID, onLoceation, P_state from location where onLoceation = ? limit 1";
$stmt = $con->prepare($qu);
$stmt->bind_param('s', $_POST[id][0]);
$stmt->execute();
$stmt->store_result();
$stt = $stmt->num_rows;
if ($stt > 0) {
    $status = "this value allread insert in Databases";
    header("location: /blog/page/location/form.php?id=$status");
} else{
    echo '<p> this Valu is perfect </p>';
    $quiry = "insert into location (ID, Addby, Country, State, onLoceation, SubState, P_state,s_rate) values(?,?,?,?,?,?,?,?)";
    $stmt = $con->prepare($quiry);
    $stmt->bind_param('ssssssss',$IDS, $AddBy, $Country, $State, $location, $SubState, $pState,$rang);
    $stmt->execute(); 
    $ef = $stmt->affected_rows;
   if ($ef > 0) {
    header("location: /blog/page/location/form.php?id='.$IDS.'");
   } 
  }
}
mysqli_close($con);
?>