<?php 
session_start();
$get = $_GET["id"];
$arr = json_decode($get, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
$TOPS = $arr["TOPS"];
$allarr = $_SESSION["all"];
$dat = date('d-m-Y');

?>
<?php
include_once "../db/sellsDB.php";
    if ($_SESSION["rolls"] == 'supplyman') {
        $stt = "SelsID,ProductList,TotalProduct,CustomerInfo,PriceAppDetect,PriceInsertCustomer,PriceOperatorDetect,PyamentOption,PyamentTnxID,OperatorName,OperatorRulls,CustomerInsertTime,ServerInsertTime,ServiceManInsertTime,OparatorInsertTime,OrderStatus,CoreareCharge,AC,OperatorContact,report,ServiceManInfo,completTime,payStatus,SMid,priceInfo,area";
        $quiry1 = "select ".$stt." from productsells where SelsID = '{$SOPS}' and OrderStatus = '{$EOPS}' limit 1 ";
        $stmt1 = $con->prepare($quiry1);
        $stmt1->execute();
        $stmt1 -> store_result();
        $sttt = $stmt1->num_rows;
        switch ($sttt) {
            case '1':
                $smID = $_SESSION["ID"];
                if ($TOPS == 'ride') {
                    $sts = 'ride';
                    $payStatus = 'stay';
                    $report = 'unpaid';
                    $quiry = "update productsells set ServiceManInfo = ? , SMid = ?,  payStatus = ? , OrderStatus = ? , report = ? where SelsID = ? and OrderStatus = ?  limit 1";
                    $stmt = $con->prepare($quiry);
                    $stmt->bind_param('sssssss', $_SESSION["all"], $_SESSION["ID"],$payStatus,$TOPS,$report,$SOPS,$EOPS);
                    $stmt->execute();
                }else if ($TOPS == 'complete') {
                    $sts = 'complete';
                    $payStatus = 'due';
                    $report = 'paid';
                    $quiry = "update productsells set ServiceManInfo = ? , SMid = ?,  payStatus = ? , OrderStatus = ? , report = ? where SelsID = ? and OrderStatus = ?  limit 1";
                    $stmt = $con->prepare($quiry);
                    $stmt->bind_param('sssssss', $_SESSION["all"], $_SESSION["ID"],$payStatus,$TOPS,$report,$SOPS,$EOPS);
                    $stmt->execute();
                }
                
                $com = $stmt->affected_rows;
                if ($com == 1) {
                    $quiry = "update cpslinfo set statuses = ?, servicemanInfo = ? , smID = ? where slsID = ? limit 30";
                    $stmt = $con->prepare($quiry);
                    $stmt->bind_param('ssss',$sts,$_SESSION["all"],$_SESSION["ID"],$SOPS);
                    $stmt->execute();
                    echo $TOPS;
                }else{
                    echo "unsussess order";
                }
                break;
            default:
                echo "not sussess, this order allread someons insert";
                break;
        }
        /*$smID = $_SESSION["ID"];
        $quiry = "update productsells set ServiceManInfo = ? , SMid = ? where SelsID = ? and OrderStatus = ?  limit 1";
        $stmt = $con->prepare($quiry);
        $stmt->bind_param('ssss', $_SESSION["all"], $_SESSION["ID"],$SOPS,$EOPS);
        $stmt->execute();
        echo $stmt->affected_rows;*/
    }
    
    /*if ($sttt == 1) {
        echo "writetraack";
        $smID = $_SESSION["ID"];
        $quiry = "update productsells set OrderStatus = '{$TOPS}' , ServiceManInfo = $allarr , SMid = '{$smID}'  where SelsID = '{$SOPS}' limit 1";
        $stmt = $con->prepare($quiry);
        //$stmt->bind_param('ssss',$TOPS,$allarr,$_SESSION["ID"],$SOPS);
        $stmt->execute();
            if ($stmt->affected_rows == 1) {
                echo "service complete";
            }else{
                echo "check there have sompe roblem rty again latter";
            }
    }else {
        echo "service allready complete or booked";
    }*/
?>