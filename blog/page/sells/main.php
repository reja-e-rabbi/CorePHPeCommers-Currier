<?php
session_start();
$get = $_GET["id"];
$arr = json_decode($get, true);
if ($get == '') {
    $arr = array("IDS"=>'pending',"DBS"=>'select',"OPS"=>'pending'); 
}
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
$allarr = $_SESSION["all"];
?>
<?php
switch ($IDS) {
    case 'pending':
        echo '<link rel="stylesheet" href="/blog/fram/css/table.css">';
        include_once "../db/mainDB.php";
        $no = 1;
        $limit = 100;
        $clm = "SL,ID,Rolls,contact,activity,State,SubState,P_state,onLocation,Country ";
        $quiry = "select ".$clm." from userlog where activity = 'active' and Rolls = 'supplyman' limit 20";
        $stmt = $con -> prepare($quiry);
        $stmt-> execute();
        $stmt-> store_result();
        $stmt-> bind_result($SL,$ID,$Rolls,$Contact,$Activity,$State,$Substate,$Pstate,$OnLocation,$Contry);
        echo '<form class="table-search" action="#" method="post">
            <label for="search">Type name or ID :</label>
            <input style="padding : 5px; margin : 5 px;" type="search" name="search" value="" placeholder="mr. xxxx">
            <input type="button" name="" value="search">
        </form>
        <div class="table-total" id = "table-total">
            <table id = "table-content">
                <caption>table of contents</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Contact</th>
                        <th>Activity</th>
                        <th>Location</th>
                        <th>State</th>
                        <th>Select</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>';
                if ($_SESSION["rolls"] == 'admin') {
                    while ($stmt-> fetch()) {
                        $arr = array("f_name"=> '',"l_name"=> '',"u_name"=>'',"ID"=>$ID,"email"=>'',"contact"=>$Contact,"rolls"=>$Rolls,"addby"=>'');
                        $array = json_encode($arr);
                          echo '<tr>';
                          echo '<td data-id = "'.$ID.'">'.$no++.'</td>';
                          echo '<td>'.$ID.'</td>';
                          echo '<td>'.$Contact.'</td>';
                          echo '<td>'.$Activity.'</td>';
                          echo '<td>'.$OnLocation.'</td>';
                          echo '<td>'.$Pstate.','.$Substate.','.$State.'</td>';
                          echo '<td id = "insert" class = "remove pointer"><input type="radio" name="id" id=""></td>';
                          echo '<td id = "view" class = "view pointer"><a href="/blog/page/user/info.php?id='.urlencode($array).'" target="blank">&#128195</a></td>';
                          echo '</tr>';
                      } 
                }
            echo "</tbody>
          </table>
        </div>";

        include_once "../admin/config.php";
        include_once "../db/sellsDB.php";
        
        $ID = 1;
        $limit = 100;
        $req = $OPS;
        $quiry = "select SelsID, ProductList, TotalProduct, CustomerInfo,PriceAppDetect, PriceInsertCustomer, PyamentOption, PyamentTnxID, CustomerInsertTime, OrderStatus, AC, area from productSells where OrderStatus = ? limit ?";
        $stmt = $con -> prepare($quiry);
        $stmt-> bind_param('si', $req, $limit);
        $stmt-> execute();
        $stmt-> store_result();
        $stmt-> bind_result($SelsID, $ProductList, $TotalProduct, $CustomerInfo, $PriceAppDetect, $PriceInsertCustomer, $PyamentOption, $PyamentTnxID, $CustomerInsertTime, $OrderStatus, $AC, $area);
        echo '<form class="table-search" action="#" method="post">
            <label for="search">Type name or ID :</label>
            <input style="padding : 5px; margin : 5 px;" type="search" name="search" value="" placeholder="mr. xxxx">
            <input type="button" name="" value="search">
        </form>
        <div class="table-total" id = "table-total">
            <table id = "table-content">
                <caption>Pending of contents</caption>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Total.Pro</th>
                        <th>Price</th>
                        <th>TrxID</th>
                        <th>AC No</th>
                        <th>AC Type</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Location</th>
                        <th>Confirm</th>
                        <th>Report</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>';
                if ($_SESSION["rolls"] == 'admin') {
                    while ($stmt-> fetch()) {
                        $arrview = array("IDS"=>"view","DBS"=>'select',"OPS"=>$OrderStatus,"EOPS"=>'pending',"SelsID"=>$SelsID);
                        $jsonView = json_encode($arrview);
                        $cust = json_decode($CustomerInfo,true);
                        $arrArea = json_decode($area, true);
                          echo '<tr>';
                          echo '<td data-id = "'.$PriceInsertCustomer.'">'.$ID++.'</td>';
                          echo '<td>'.$cust["Name"].'</td>';
                          echo '<td>'.$TotalProduct.'</td>';
                          echo '<td>'.$PriceAppDetect.'</td>';
                          echo '<td>'.$PyamentTnxID.'</td>';
                          echo '<td>'.$AC.'</td>';
                          echo '<td data-id = "'.$SelsID.'">'.$PyamentOption.'</td>';
                          echo '<td>'.$cust["Phone"].'</td>';
                          echo '<td>'.$CustomerInsertTime.'</td>';
                          echo '<td>'.$arrArea["location"].','.$arrArea["SubState"].','.$arrArea["state"].'</td>';
                          echo "<td id = 'insert' data-id = 'processing' data-SlsID = '$SelsID' data-stt = '$OrderStatus' class = 'btn-conf pointer process'>&#128077</td>";
                          echo '<td id = "report" class = "reported pointer">&#128078</td>';
                          echo '<td id = "view" class = "view pointer"><a href="/blog/page/sells/view.php?id='.urlencode($jsonView).'" target="blank">&#128195</a></td>';
                          echo '</tr>';
                      } 
                }
            echo "</tbody>
          </table>
        </div>";
        mysqli_close($con);
        break;
        case 'all':
            echo '<link rel="stylesheet" href="/blog/fram/css/table.css">';
            include_once "../admin/config.php";
            include_once "../db/sellsDB.php";
            $ID = 1;
            $limit = 100;
            $req = $OPS;
            $quiry = "select SL, SelsID, ProductList, TotalProduct, CustomerInfo,PriceAppDetect, PriceInsertCustomer, PyamentOption, PyamentTnxID, CustomerInsertTime, OrderStatus, AC, area from productSells where OrderStatus = ? limit ?";
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
                            <th>TrxID</th>
                            <th>AC No</th>
                            <th>AC Type</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>';
                    if ($_SESSION["rolls"] == 'admin') {
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
                              echo '<td>'.$PyamentTnxID.'</td>';
                              echo '<td>'.$AC.'</td>';
                              echo '<td data-id = "'.$SelsID.'">'.$PyamentOption.'</td>';
                              echo '<td>'.$cust["Phone"].'</td>';
                              echo '<td>'.$CustomerInsertTime.'</td>';
                              echo '<td id = "view" class = "view pointer"><a href="/blog/page/sells/view.php?id='.urlencode($jsonView).'" target="blank">&#128195</a></td>';
                              echo '</tr>';
                          } 
                    }
                echo "</tbody>
              </table>
            </div>";
            mysqli_close($con);
        break;
    
    default:
        echo "code not succsse";
        break;
}
?>
