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
include_once "config.php";
?>
<?php
switch ($IDS) {
    case '1':
        echo "<div class = 's-table'>";
        echo '<link rel="stylesheet" href="/blog/fram/css/table.css">';
            include_once "/config.php";
            include_once "../db/sellsDB.php";
            
            $ID = 1;
            $limit = 100;
            $req = 'processing';
            $row = "SL, SelsID, ProductList, TotalProduct, CustomerInfo,PriceAppDetect, PriceInsertCustomer, PyamentOption, PyamentTnxID, CustomerInsertTime, OrderStatus, AC, area";
            $quiry = "select ".$row." from productSells where OrderStatus = ? limit ?";
            $stmt = $con -> prepare($quiry);
            $stmt-> bind_param('si', $req, $limit);
            $stmt-> execute();
            $stmt-> store_result();
            $stmt-> bind_result($SL,$SelsID, $ProductList, $TotalProduct, $CustomerInfo, $PriceAppDetect, $PriceInsertCustomer, $PyamentOption, $PyamentTnxID, $CustomerInsertTime, $OrderStatus, $AC, $area);
            echo $stmt->num_rows;
            echo '<form class="table-search" action="#" method="post">
                <label for="search">Type name or ID :</label>
                <input style="padding : 5px; margin : 5 px;" type="search" name="search" value="" placeholder="mr. xxxx">
                <input type="button" name="" value="search">
            </form>
            <div class="table-total" id = "table-total">
                <table id = "table-content">
                    <caption>'.$req.' Order</caption>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Total.Pro</th>
                            <th>Price</th>
                            <th>AC Type</th>
                            <th>View</>
                        </tr>
                    </thead>
                    <tbody>';
                    if ($_SESSION["rolls"] == 'supplyman') {
                        while ($stmt-> fetch()) {
                            $arrview = array("IDS"=>"view","DBS"=>'select',"OPS"=>$OrderStatus,"EOPS"=>'pending',"SelsID"=>$SelsID);
                            $jsonView = json_encode($arrview);
                            $cust = json_decode($CustomerInfo,true);
                            $arrArea = json_decode($area,true);
                              echo '<tr>';
                              echo '<td data-id = "'.$PriceInsertCustomer.'">'.$ID++.'</td>';
                              echo '<td>'.$cust["Name"].'</td>';
                              echo '<td>'.$TotalProduct.'</td>';
                              echo '<td>'.$PriceAppDetect.'</td>';
                              echo '<td>'.$AC.'</td>';
                              echo '<td id = "view" class = "view pointer"><a href="/blog/page/sells/view.php?id='.urlencode($jsonView).'" target="_blank">&#128195</a></td>';
                              echo '</tr>';
                        } 
                    }
                echo "</tbody>
              </table>
            </div>"; 
            mysqli_close($con);
        
        
        
        echo "</div>";
        break;
        case 'all':
            echo "<div class = 's-table'>";
            echo '<link rel="stylesheet" href="/blog/fram/css/table.css">';
                include_once "/config.php";
                include_once "../db/sellsDB.php";
                $ID = 1;
                $limit = 100;
                $req = $OPS;
                $smid = $_SESSION["ID"];
                $row = "SL, SelsID, ProductList, TotalProduct, CustomerInfo,PriceAppDetect, PriceInsertCustomer, PyamentOption, PyamentTnxID, CustomerInsertTime, OrderStatus, AC, area";
                $quiry = "select ".$row." from productSells where  SMid = '{$smid}' and OrderStatus = ? limit ?";
                $stmt = $con -> prepare($quiry);
                $stmt-> bind_param('si', $req, $limit);
                $stmt-> execute();
                $stmt-> store_result();
                $stmt-> bind_result($SL,$SelsID, $ProductList, $TotalProduct, $CustomerInfo, $PriceAppDetect, $PriceInsertCustomer, $PyamentOption, $PyamentTnxID, $CustomerInsertTime, $OrderStatus, $AC, $area);
                echo '<form class="table-search" action="#" method="post">
                    <label for="search">Type name or ID :</label>
                    <input style="padding : 5px; margin : 5 px;" type="search" name="search" value="" placeholder="mr. xxxx">
                    <input type="button" name="" value="search">
                </form>
                <div class="table-total" id = "table-total">
                    <table id = "table-content">
                        <caption>'.$req.' Order</caption>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Total.Pro</th>
                                <th>Price</th>
                                <th>AC Type</th>
                                <th>View</>
                            </tr>
                        </thead>
                        <tbody>';
                        if ($_SESSION["rolls"] == 'supplyman') {
                            while ($stmt-> fetch()) {
                                $arrview = array("IDS"=>"view","DBS"=>'select',"OPS"=>$OrderStatus,"EOPS"=>'pending',"SelsID"=>$SelsID);
                                $jsonView = json_encode($arrview);
                                $cust = json_decode($CustomerInfo,true);
                                $arrArea = json_decode($area,true);
                                  echo '<tr>';
                                  echo '<td data-id = "'.$PriceInsertCustomer.'">'.$ID++.'</td>';
                                  echo '<td>'.$cust["Name"].'</td>';
                                  echo '<td>'.$TotalProduct.'</td>';
                                  echo '<td>'.$PriceAppDetect.'</td>';
                                  echo '<td>'.$AC.'</td>';
                                  echo '<td id = "view" class = "view pointer"><a href="/blog/page/sells/view.php?id='.urlencode($jsonView).'" target="_blank">&#128195</a></td>';
                                  echo '</tr>';
                            } 
                        }
                    echo "</tbody>
                  </table>
                </div>";
                mysqli_close($con);
            echo "</div>";
            break;
    default:
        echo "no service";
        break;
}
?>


