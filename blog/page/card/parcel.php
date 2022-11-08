
<?php
session_start();
$allarr = $_SESSION["all"];
$DBS = 'select';
include_once "../db/sellsDB.php";
$stt = "SelsID,ProductList,TotalProduct,CustomerInfo,PriceAppDetect,PriceInsertCustomer,PriceOperatorDetect,PyamentOption,PyamentTnxID,OperatorName,OperatorRulls,CustomerInsertTime,ServerInsertTime,ServiceManInsertTime,OparatorInsertTime,OrderStatus,CoreareCharge,AC,OperatorContact,report,ServiceManInfo,completTime,payStatus,SMid,priceInfo,area";
$quiry = "select ".$stt." from productsells where SelsID = ? limit 1";
$testID = $_COOKIE['crdID'];
$stmt = $con-> prepare($quiry);
$stmt->bind_param('s',$testID);
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
  <link rel="stylesheet" href="../sells/style.css">
  <script src="../../fram/js/script.js"></script>
</head>
<body>
  <?php
  echo '
  <div id="grid">
    <div class = "hader">
      <h1 class="logo"><a style="color: yellowgreen;" href="/index.php">FIOPL</a></h1>
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
</body>
</html>
<?php
    mysqli_close($con);
?>