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
switch ($IDS) {
    case 'sells':
        include_once "../db/sellsDB.php";
        switch ($OPS) {
            case 'processing':
                $pnd = "pending";
                $quiry = "update productsells set OrderStatus = ? , OperatorRulls = ? , OparatorInsertTime = ? , OptInfo = ? , optID = ?  where SelsID = ? limit 1";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('ssssss',$TOPS,$_SESSION["rolls"],$dat,$allarr,$_SESSION["ID"],$SOPS);
                $stmt->execute();
                if ($stmt-> affected_rows == 1) {
                    $quiry = "update cpslinfo set statuses = ? where slsID = ? limit 30";
                    $stmt1 = $con->prepare($quiry);
                    $stmt1->bind_param('ss',$TOPS,$SOPS);
                    $stmt1->execute();
                    echo $TOPS;
                }
            break;
            case 'all':
                $quiry = "update productsells set OrderStatus = ? , OperatorRulls = ? , OparatorInsertTime = ? , OptInfo = ? , optID = ?  where SelsID = ? limit 1";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('ssssss',$TOPS,$_SESSION["rolls"],$dat,$allarr,$_SESSION["ID"],$SOPS);
                $stmt->execute();
                if ($stmt->affected_rows == 1) {
                    $quiry = "update cpslinfo set statuses = ? where slsID = ? limit 30";
                    $stmt1 = $con->prepare($quiry);
                    $stmt1->bind_param('ss',$TOPS,$SOPS);
                    $stmt1->execute();
                    echo $TOPS;
                }
            break;
            case 'ride':
                $proc = 'processing';
                if ($_SESSION["rolls"] == 'admin') {
                    $quiry = "update productsells set OrderStatus = ? , OperatorRulls = ? , OparatorInsertTime = ? , OptInfo = ? , optID = ? , ServiceManInfo = ? , SMid = ?  where SelsID = ? limit 1";
                    $stmt = $con->prepare($quiry);
                    $stmt->bind_param('ssssssss',$TOPS,$_SESSION["rolls"],$dat,$allarr,$_SESSION["ID"],$allarr,$_SESSION["ID"],$SOPS);
                    $stmt->execute();
                    if ($stmt->affected_rows == 1) {
                        $quiry = "update cpslinfo set statuses = ?, servicemanInfo = ? , smID = ? where slsID = ? limit 30";
                        $stmt = $con->prepare($quiry);
                        $stmt->bind_param('ssss',$TOPS,$_SESSION["all"],$_SESSION["ID"],$SOPS);
                        $stmt->execute();
                        echo $TOPS;
                    }
                }elseif ($_SESSION["rolls"] == 'supplyman') {
                    $quiry1 = "select * from productsells where SelsID = ? and OrderStatus = 'processing' limit 1 ";
                    $stmt1 = $con->prepare($quiry1);
                    $stmt1->bind_param('s',$SOPS);
                    $stmt1->execute();
                    $stmt1 -> store_result();
                    if ($stmt1->num_rows() == 1) {
                        $quiry = "update cpslinfo set statuses = ?, servicemanInfo = ? , smID = ? where slsID = ? limit 30";
                        $stmt = $con->prepare($quiry);
                        $stmt->bind_param('ssss',$TOPS,$_SESSION["all"],$_SESSION["ID"],$SOPS);
                        $stmt->execute();
                        if ($stmt->affected_rows == 1) {
                            $quiry = "update productsells set OrderStatus = ? ,  ServiceManInfo = ? , SMid = ?  where SelsID = ? limit 1";
                            $stmt = $con->prepare($quiry);
                            $stmt->bind_param('ssss',$TOPS,$allarr,$_SESSION["ID"],$SOPS);
                            $stmt->execute();
                            echo $TOPS;
                        } else{
                            echo "service not effected";
                        }
                    }else {
                        "smt service not include";
                    }
                }else {
                    echo "check your rolls";
                }
            break;
            case 'complete':
                if ($_SESSION["rolls"] == 'admin') {
                    $quiry = "update productsells set OrderStatus = ? , OperatorRulls = ? , OparatorInsertTime = ? , OptInfo = ? , optID = ? , ServiceManInfo = ? , SMid = ?  where SelsID = ? limit 1";
                    $stmt = $con->prepare($quiry);
                    $stmt->bind_param('ssssssss',$TOPS,$_SESSION["rolls"],$dat,$allarr,$_SESSION["ID"],$allarr,$_SESSION["ID"],$SOPS);
                    $stmt->execute();
                    if ($stmt->affected_rows == 1) {
                        echo "Complete";
                    } 
                }elseif ($_SESSION["rolls"] == 'supplyman') {
                    $quiry = "update productsells set OrderStatus = ? , ServiceManInfo = ? , SMid = ?  where SelsID = ? limit 1";
                    $stmt = $con->prepare($quiry);
                    $stmt->bind_param('ssss',$TOPS,$allarr,$_SESSION["ID"],$SOPS);
                    $stmt->execute();
                    if ($stmt->affected_rows == 1) {
                        echo "service complete";
                    }else{
                        echo "check there have sompe roblem rty again latter";
                    }
                }
            break;
            default:
                echo "problem detected";
                break;
        }
        
        break;
    
    default:
        # code...
        break;
}
?>