<?php
session_start();
include_once "../../../config.php";
$json = $_GET["id"];
$arr = json_decode($json, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];

?>
<?php
switch ($IDS) {
    case 1:
        # code...
        $budget = $arr["budget"];
$inbester = $arr["inbester"];
$comments = $arr["comments"];
$AcNo = $arr["AcInfo"];
$ID = bin2hex(random_bytes(2)).date("YMdGI");
$add = array("AddBy"=>$_SESSION["name"], "email"=>$_SESSION["email"], "ID"=>$_SESSION["ID"],"contact"=>$_SESSION["contact"],"rolls"=>$_SESSION["rolls"]);
$AddByInfo = json_encode($add);
settype($budget, "integer");
var_dump(gettype($budget));
include_once "../db/mainDB.php";
        $quiry = "insert into Budget(ID, Amount, Exlpane, Entry, AddForm, AddBy, AcNo) values(?,?, ?,?, ?,?,?)";
$stmt = $con->prepare($quiry);
$stmt->bind_param('sisssss', $ID,$budget, $comments,$AddByInfo,$inbester,$_SESSION["name"], $AcNo);
$stmt->execute();
$affected = $stmt->affected_rows;
$string = 'quiry succes';
if ($affected == 1) {
    header("location: /blog/page/accunts/form.php?id=1 &string=".urlencode($string));
}
        break;
    
    default:
        # code...
        echo "not iserted ";
        break;
}

echo '<p>affected rows'.$affected.'</p>';
mysqli_close($con);
?>