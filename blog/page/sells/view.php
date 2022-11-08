
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
include_once "../db/sellsDB.php";
$stt = "SelsID,ProductList,TotalProduct,CustomerInfo,PriceAppDetect,PriceInsertCustomer,PriceOperatorDetect,PyamentOption,PyamentTnxID,OperatorName,OperatorRulls,CustomerInsertTime,ServerInsertTime,ServiceManInsertTime,OparatorInsertTime,OrderStatus,CoreareCharge,AC,OperatorContact,report,ServiceManInfo,completTime,payStatus,SMid,priceInfo,area";
$quiry = "select ".$stt." from productsells where SelsID = ? limit 1";
$stmt = $con-> prepare($quiry);
$stmt->bind_param('s',$arr["SelsID"]);
$stmt->execute();
$stmt-> store_result();
$stmt-> bind_result($SlsID,$ProductList,$Totalproduct,$CustomerInfo,$PriceAppDetected,$PriInsCs,$PricOpDtt,$PyaOpt,$PyaTnxID,$OperatorName,$OptRulls,$CusInsertTime,$ServerInsertTime,$ServInsTime,$OptInsTime,$orsStt,$corerCharg,$AC,$OptContact,$Report,$ServInfo,$CompletTime,$PayStt,$SerID,$PriceInfo,$area);
$stmt->fetch();
$arrProductList = json_decode($ProductList,true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cards</title>
  <link rel="stylesheet" href="../../fram/css/grid.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  echo '
  <div id="grid">
    <div class = "hader">
      <h1 class="logo">FIOPL</h1>
    </div>
    <div class="pro-card">
      <div class="procard">';
        foreach ($arrProductList as $key => $value) {
        echo '<div class="card">
          <div class="info">
            <img src="../../upload/'.$value["img"].'" alt="img">
          </div>
          <div class="info">
            <ul>
              <li>Price : '.$value["price"].' tk</li>
              <li>Total order: '.$value["total"].'</li>
              <li>Total Price: '.$value["total"] * $value["price"] .'</li>
              <li>Product name : '.$value["proname"].'</li>
              <li>Shop Name :'.$value["ShopName"].'</li>
              <li>Shop Address : '.$value["location"].'</li>
              <li>Recommand : '.$value["recommand"].'</li>
            </ul>
            <div class="info">
              <div class="link">
                <a href="../view/index.php?id='.urlencode($value["proID"]).'" target="_blank" rel="noopener noreferrer">View</a>
              </div>
            </div>
          </div>
        </div>';
        }
      echo '</div>
    </div>
    <div class="cus-info process">
      <div class="cusinfo">
        <div class="cust">
          <p>Customer Information</p>
        </div>
        <div class="cust-dt">
          <ul>';
          $cusInfo = json_decode($CustomerInfo,true);
          foreach ($cusInfo as $key => $value) {
            echo '<li>'.$key.':'.$value.'</li>';
          }
          $ar = json_decode($area,true);
          foreach ($ar as $key => $value) {
            echo '<li>'.$key.':'.$value.'</li>';
          }
          echo '<li> Date : '.$ServerInsertTime.'</li>';
          echo'</ul>
        </div>
        <div class="btn-conf">
          <ul>';
          switch ($_SESSION["rolls"]) {
            case 'admin':
              switch ($orsStt) {
                case 'pending':
                  echo "
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Pending</li>
                  <li class = 'pross' data-id = 'processing' data-SlsID = '$SlsID' data-stt = '$orsStt' >Processing</li>
                  <li class = 'pross' data-id = 'ride' data-SlsID = '$SlsID' data-stt = '$orsStt' >Ride</li>
                  <li class = 'pross' data-id = 'complete' data-SlsID = '$SlsID' data-stt = '$orsStt' >Confirm</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Error</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Block</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Rejected</li>";
                  break;
                case 'processing':
                  echo "
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Pending</li>
                  <li class = 'pross' data-id = 'processing' data-SlsID = '$SlsID' data-stt = '$orsStt' >Processing</li>
                  <li class = 'pross' data-id = 'ride' data-SlsID = '$SlsID' data-stt = '$orsStt' >Ride</li>
                  <li class = 'pross' data-id = 'complete' data-SlsID = '$SlsID' data-stt = '$orsStt' >Confirm</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Error</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Block</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Rejected</li>";
                  break;
                case 'ride':
                  echo "
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Pending</li>
                  <li class = 'pross' data-id = 'processing' data-SlsID = '$SlsID' data-stt = '$orsStt' >Processing</li>
                  <li class = 'pross' data-id = 'ride' data-SlsID = '$SlsID' data-stt = '$orsStt' >Ride</li>
                  <li class = 'pross' data-id = 'complete' data-SlsID = '$SlsID' data-stt = '$orsStt' >Complete</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Error</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Block</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Rejected</li>";
                  break;
                case 'block':
                  echo "
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Pending</li>
                  <li class = 'pross' data-id = 'processing' data-SlsID = '$SlsID' data-stt = '$orsStt' >Processing</li>
                  <li class = 'pross' data-id = 'ride' data-SlsID = '$SlsID' data-stt = '$orsStt' >Ride</li>
                  <li class = 'pross' data-id = 'complete' data-SlsID = '$SlsID' data-stt = '$orsStt' >Complete</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Error</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Block</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Rejected</li>";
                  break;
                case 'error':
                  echo "
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Pending</li>
                  <li class = 'pross' data-id = 'processing' data-SlsID = '$SlsID' data-stt = '$orsStt' >Processing</li>
                  <li class = 'pross' data-id = 'ride' data-SlsID = '$SlsID' data-stt = '$orsStt' >Ride</li>
                  <li class = 'pross' data-id = 'complete' data-SlsID = '$SlsID' data-stt = '$orsStt' >Complete</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Error</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Block</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Rejected</li>";
                  break;
                case 'complete':
                  echo "
                  <li class = 'pross' data-id = 'complete' data-SlsID = '$SlsID' data-stt = '$orsStt' >Complete</li>
                  ";
                  break;
                case 'rejected':
                  echo "
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Pending</li>
                  <li class = 'pross' data-id = 'processing' data-SlsID = '$SlsID' data-stt = '$orsStt' >Processing</li>
                  <li class = 'pross' data-id = 'ride' data-SlsID = '$SlsID' data-stt = '$orsStt' >Ride</li>
                  <li class = 'pross' data-id = 'confirm' data-SlsID = '$SlsID' data-stt = '$orsStt' >Complete</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Error</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Block</li>
                  <li class = 'pross' data-id = 'all' data-SlsID = '$SlsID' data-stt = '$orsStt' >Rejected</li>";
                  break;
                  
                default:
                  echo "check your service";
                  break;
              }
              break;
            case 'supplyman':
              switch ($orsStt) {
                case 'processing':
                  echo "<li class = 'serv' data-id = 'ride' data-SlsID = '$SlsID' data-stt = '$orsStt' >Ride</li>";
                  break;
                case 'ride':
                  echo "<li class = 'serv' data-id = 'complete' data-SlsID = '$SlsID' data-stt = '$orsStt' >Complete</li>";
                  break;
                case 'completed':
                    echo '<li>service completed</li>';
                  break;
                default:
                  echo "check your service";
                  break;
              }
              break;
              case 'company':
                echo '';
                break;
            default:
              echo 'check rolls';
              break;
          }
          echo '</ul>
        </div>
      </div>

      <div class="cusinfo">
        <div class="cust">
          <p>Price Information</p>
        </div>
        <div class="cust-dt">
          <ul>';
          $pr = json_decode($PriceInfo,true);
          foreach ($pr as $key => $value) {
            echo '<li>'.$key.':'.$value.'</li>';
          }
          echo '<li> Detected Price : '.$PriceAppDetected.' TK</li>';
          echo '<li> Paid : '.$Report.'</li>
                <li> Pay Option : '.$PyaOpt.' TK</li>
                <li> Amount Pay Option : '.$PyaOpt.'</li>';
          echo'</ul>
        </div>
      </div>

      <div class="cusinfo">
        <div class="cust">
          <p>Order Information</p>
        </div>
        <div class="cust-dt">
          <ul>';
          echo '<li>Order Ststuses : '.$orsStt.'</li>';
          echo '<li>Total Product : '.$Totalproduct.'</li>';

          echo'</ul>
        </div>
      </div>

      <div class="cusinfo">
        <div class="cust">
          <p>Serviceman Information</p>
        </div>
        <div class="cust-dt">
          <ul>';
          $pre = json_decode($ServInfo,true);
            echo '<li>Name : '.$pre["f_name"].'</li>';
            echo '<li>Contact : '.$pre["contact"].'</li>';
            echo '<li>ID : '.$pre["id"].'</li>';
          echo'</ul>
        </div>
      </div>

    </div>
  </div>';
  ?>
  <script src="../../fram/js/script.js"></script>
  <script src="app.js"></script>
</body>
</html>