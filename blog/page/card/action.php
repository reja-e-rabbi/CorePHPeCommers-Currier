<?php
session_start();
$get = $_GET["id"];
$arr = json_decode(base64_decode($get),true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
$locPub = json_decode($_COOKIE["location"], true);
$pricing = $arr["pci"];
$add = $arr["cus"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cards unsing</title>
</head>
<body>
<?php
switch ($IDS) {
    case 'cards':
        include_once "../db/sellsDB.php";
        $allprc = json_decode($arr["pci"],true);
        $_SESSION['setUI'] = $get;
        $crd = json_decode($_COOKIE["card"],true);
        $randomgen = date("YmdHi-s").bin2hex(random_bytes(3));
        $SelseID = $randomgen;
        if ($OPS = 'check') {
            $trxID = 'hc-'.$randomgen;
        }
        $date = date("d-m-y");
        $Product_list = $_COOKIE['card'];
        $totalorder = (int)$_COOKIE['crdlnt'];
        $customer = $add;
        $totalprice = (int)$allprc["TotalPrice"];
        $pyamentamount = 0;
        $priceInsertCustomer = 0; 
        $paymentOption = 'handcash';
        $OrderStatus = 'pending';
        $prdt = json_decode($Product_list, true);
        //var_dump($prdt);
        $pricing1 = $_COOKIE["pricing"];
        $script = "insert into productsells (SelsID,ProductList,TotalProduct,CustomerInfo, PriceAppDetect, PriceInsertCustomer,PyamentOption,PyamentTnxID, CustomerInsertTime, OrderStatus,AC,priceInfo,area) values(?,?,?,?, ?,?,?,?, ?,?,?,?, ?)";
        $stmt = $con -> prepare($script);
        $stmt -> bind_param('ssisiisssssss',$SelseID,$Product_list,$totalorder,$customer, $totalprice,$priceInsertCustomer,$paymentOption,$trxID,$date,$OrderStatus,$paymentOption,$pricing1, $_COOKIE["location"]);
        $stmt->execute();
        $times = time() + (60*60*24*7);
        if ($stmt -> affected_rows == 1) {
            foreach ($prdt as $key => $value) {
                $statusOn = 'pending';
                $priceOn = (int)$value["price"];
                $script1 = "insert into cpslinfo (img,proName,PorID,Coid, price,statuses,slsID,totalord) values (?,?,?,?, ?,?,?,?)";
                $stmt = $con->prepare($script1);
                $stmt->bind_param('ssssissi',$value['img'],$value["proname"],$value["proID"],$value["coID"],$priceOn,$statusOn,$SelseID,$value["total"]);
                $stmt->execute();
                if ($stmt->affected_rows > 0) {
                    echo "quiry sussess";
                    setcookie('crdID', $SelseID, $times);
                    echo "query succes";
                    header("location: /blog/page/card/ifclouse.php");
                } else {
                    echo "quiry not success tra agane letter";
                    $quiry2 = "delete from productsells where SelsID = ? limit 1";
                    $stnt2 = $con->prepare($quiry2);
                    $stmt2->bind_param('s',$SelseID);
                    $stmt2->execute();
                }
                echo $stmt->affected_rows;
            }

        } else {
        echo "query faild try agane";
        } 
        break;
    
    default:
        echo 'cards not founds';
        break;
}
?>
</body>
</html>
