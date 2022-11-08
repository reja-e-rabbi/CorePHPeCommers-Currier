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
include_once "../db/mainDB.php";
$all = json_decode($_COOKIE["all"],true);
$encript = password_verify($_POST["did"][0],$all["pass"]);
$cul = "SL,img,proname,quantity,price,info,category,subcategory,uploader,email,location, views,localinfo,facbook,contact,totalview,totalsels,totalmoney,shopName,dates,productID,statuses,country,State,SubState,P_state,Activity,DA,coID";
?>
<?php
var_dump($_POST["did"]);
$pinfo = json_encode(array("Price"=>$_POST["id"][5],"Discount"=>$_POST["id"][6]));
if ($encript == 1) {
    //proname = ?, quantity = ?, price = ?, category = ?, subcategory=?,
    $productName = $_POST["did"][1];
    $quantity = $_POST["did"][2];
    settype($quantity,"integr");
    $price = $_POST["did"][5];
    settype($price,"integer");
    $category = $_POST["did"][3];
    $subcat = $_POST["did"][4];
    echo gettype($price);
    $quiry = "update product set proname = ?,quantity = ?,category = ?,price = ?, subcategory=?, priceInfo=? where productID = ? limit 1";
    $stmt = $con->prepare($quiry);
    $stmt->bind_param('siissss',$productName,$quantity,$price,$category,$subcat,$pinfo,$EOPS);
    $stmt->execute();
    if ($stmt->affected_rows == 1) {
        echo "quiry success";
        header("location: /blog/page/view/index.php?id=$EOPS");
    }else{
        echo "quiry not sucess";
    }
}else {
    echo "try agane, Password Not metch";
}
?>
<?php
mysqli_close($con);
?>