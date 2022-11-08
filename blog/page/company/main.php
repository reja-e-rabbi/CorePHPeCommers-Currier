<?php
session_start();
include_once "../../../config.php";
$get = $_GET["id"];
$arr = json_decode($get, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
$allarr = $_SESSION["all"];
$all = json_decode($allarr, true);
?>
<?php
include_once "../db/sellsDB.php";
switch ($IDS) {
    case 'ord':
        $stt = 'pending';
        $sttclm = "SL,img,proName,PorID,price,dates,statuses,slsID,servicemanInfo,smID,totalord ";
        $quiry = "select ".$sttclm." from cpslinfo where Coid = '{$_SESSION["ID"]}' and statuses = ? limit 50";
        $stmt = $con-> prepare($quiry);
        $stmt->bind_param('s',$OPS);
        $stmt-> execute();
        $stmt-> store_result();
        $stmt->bind_result($sl,$img,$proName,$proID,$price,$dates,$statuses,$slsID2,$servicemanInfo,$smID1,$totalOrd);
        break;
    
    default:
        echo "check quiry";
        break;
}
$no = 1;
echo '<link rel="stylesheet" href="../../fram/css/table.css">';
echo '<div class = "table">
        <div class="table-total" id = "table-total">
            <table id = "table-content">
                <caption>table of '.$OPS.'</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>img</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>total price</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>';
                if ($_SESSION["rolls"] == 'company') {
                    while ($stmt->fetch()) {
                        $ar3 = array("IDS"=>'unknow',"DBS"=>'select',"OPS"=>'unknow',"SelsID"=>$slsID2);
                        $array = json_encode($ar3);
                        echo '<tr>';
                            echo '<td data-id = "'.$sl.'">'.$no++.'</td>';
                            echo "<td><img src='../../upload/".$img."' width='80px' height='75px' alt='".$proName."'></td>";
                            echo '<td>'.$ProName.'</td>';
                            echo '<td>'.$price.'</td>';
                            echo '<td>'.$totalOrd.'</td>';
                            echo '<td>'.$totalOrd * $price.'</td>';
                            echo '<td id = "view" class = "view pointer"><a href="/blog/page/sells/view.php?id='.urlencode($array).'" target="_blank">&#128195</a></td>';
                        echo '</tr>'; 
                    }
                } 
            echo "</tbody>
          </table>
        </div>
        </div>";
?>
