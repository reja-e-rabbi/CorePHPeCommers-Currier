<?php 
session_start();
include_once "../../../config.php";
$json = $_POST["id"];
$arr = json_decode($json, true);
$IDS = $arr["IDS"];
$DBS = 'insert';
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
?>
<?php 
echo base64_decode($_POST["id"][0] );
switch ($_SESSION['rolls']) {
    case 'company':
        $_SESSION['detels'] = $_POST['id'][0];
        $arrl = array("IDS"=> "one","DBS"=> "insert","OPS"=>"company","EOPS"=>"product");
        $jsn = json_encode($arrl);
        echo 'this data is save';
        header('location: /blog/page/upload/index.php?id='.urlencode($jsn));
        break;
    
    default:
        echo 'this data have note save';
        break;
}
?>