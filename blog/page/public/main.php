<?php
session_start();
$get = $_GET["id"];
$arr = json_decode(base64_decode($get),true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
?>
<?php 
include_once "../db/mainDB.php";
$col = " SL,img,proname,quantity,price,info,category,subcategory,location,totalview,totalsels,shopName,dates,productID,statuses,country,State,SubState,P_state,Activity,coID,priceInfo";
?>
<?php
switch ($SOPS) {
  case 'RECOMMENDED':
    $quiry = "select ".$col." from product where P_state = ? and SubState = ? and statuses = ? order by totalsels,rand() desc limit 20";
    $stmt = $con->prepare($quiry);
    $stmt->bind_param('sss',$locPub["P_state"],$locPub ["SubState"],$OPS);
    $stmt->execute();
    $stmt->store_result();
    $stmt -> bind_result($SL,$img,$proname,$quantity,$price,$info,$category,$subcategory,$location,$totalview,$totalsels,$shopname,$dates,$productID,$ststuses,$country,$State,$SubState,$P_state,$Activity,$coID,$PriceInfo);
    echo '
    <div class="recomand flex-col">
            <div class="recomand-h">
                <h1>RECOMMENDED</h1>
            </div>
            <div class="card-symple flex">';
            while ($stmt->fetch()) {
              $arrPriceInfo = json_decode($PriceInfo,true);
              if ($arrPriceInfo != '') {
                if ($arrPriceInfo["Discount"] != '') {
                  $discountPrice = $arrPriceInfo["Price"]-(($arrPriceInfo["Price"]/100) * $arrPriceInfo["Discount"]);
                }
                else {
                  $discountPrice = $price;
                }
              }else {
                $discountPrice = $price;
              }
              $arrCt = array("img"=>$img,"proname"=>$proname,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory,"location"=>$location.','.$SubState.','.$State,"ShopName"=>$shopname);
              $arrcatJson = json_encode($arrCt);
              $arrCom = array("img"=>$img,"proname"=>$proname,"info"=>$info,"location"=>$location,"shopName"=>$shopname,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory);
              $arrNext = array("SL"=> $SL,"sttuses"=>$ststuses,"category"=> $category, "subCat"=>$subcategory,"totalsels"=>$totalsels);
              $arrNextJson = json_encode($arrNext);
              $arrComJson = json_encode($arrCom);
          echo  "<div class='card card-did'>";
          echo  '<img src="/blog/upload/'.$img.'" alt="'.$proname.'">
            <ul>
                <li>TK :'.$discountPrice.'</span></li>';
                echo "<li id = 'data-next' data-next = '$arrNextJson'>".$proname."</li>";
                echo "<li><input type='number' name='number' class = 'ttpro' value='1'></li>
                <li>Discount : ".$arrPriceInfo["Discount"]." %</li>
                <li>Regular Price : ".$arrPriceInfo["Price"]."</li>
            </ul>";
            echo '<div class="btn-group">';
              echo  "<p class = 'add-to-cart' data-id = '$arrcatJson'> &#128722 Add to cart</p>";
              echo  "<p class = 'add-to-order' data-id = '$arrcatJson'> &#128722 Order</p>";
              echo  '<a href="../view/index.php?id='.$productID.'" target="_blank" rel="noopener noreferrer"><span>&#9783</span><span>view</span></a>
            </div>
            <div class="other flex">';
            echo "<p><span>&#9814</span><span class='wish-com' data-vl = '$arrComJson' data-id = 'compair'>Compare</span></p>
              <p><span>&#9814</span><span class='wish-com' data-vl = '$arrComJson' data-id='wishlist'>Wishlist</span></p>";
          echo  '</div>
          </div>';
            }
            echo'</div>';
            
        echo '</div>';
        echo "<div class='card-symple flex'>
        <div class = 'pgnCrd next'>
           <p class = 'pgn' data-id = 'recommand'>Next</p>
        </div>
    </div>";
    break;
    case 'NEXT':
        $arrNEXT = json_decode($arr["LASTv"], true);
        $osl = $arrNEXT ["SL"];
        if ($osl != 0) {
            $arrNEXT = json_decode($arr["LASTv"], true);
            $locPub = json_decode($_COOKIE["location"], true);
            $quiry = "select ".$col." from product where P_state = ? and SubState = ? and statuses = ? and SL < ? limit 20";
            $stmt = $con->prepare($quiry);
            $stmt->bind_param('sssi',$locPub["P_state"],$locPub ["SubState"],$OPS,$osl);
            $stmt->execute();
            $stmt->store_result();
            $stmt -> bind_result($SL,$img,$proname,$quantity,$price,$info,$category,$subcategory,$location,$totalview,$totalsels,$shopname,$dates,$productID,$ststuses,$country,$State,$SubState,$P_state,$Activity,$coID,$priceInfo);
        }
        echo '
        <div class="recomand flex-col">
            <div class="recomand-h">
                <h1>RECOMMENDED</h1>
            </div>
            <div class="card-symple flex">';
            while ($stmt->fetch()) {
              $arrPriceInfo = json_decode($PriceInfo,true);
              if ($arrPriceInfo != '') {
                if ($arrPriceInfo["Discount"] != '') {
                  $discountPrice = $arrPriceInfo["Price"]-(($arrPriceInfo["Price"]/100) * $arrPriceInfo["Discount"]);
                }
                else {
                  $discountPrice = $price;
                }
              }else {
                $discountPrice = $price;
              }
              $arrCt = array("img"=>$img,"proname"=>$proname,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory,"location"=>$location.','.$SubState.','.$State,"ShopName"=>$shopname);
              $arrcatJson = json_encode($arrCt);
              $arrCom = array("img"=>$img,"proname"=>$proname,"info"=>$info,"location"=>$location,"shopName"=>$shopname,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory);
              $arrNext = array("SL"=> $SL,"sttuses"=>$ststuses,"category"=> $category, "subCat"=>$subcategory,"totalsels"=>$totalsels);
              $arrNextJson = json_encode($arrNext);
              $arrComJson = json_encode($arrCom);
          echo  "<div class='card card-did'>";
          echo  '<img src="/blog/upload/'.$img.'" alt="'.$proname.'">
            <ul>
                <li>TK :'.$price.'</span></li>';
                echo "<li id = 'data-next' data-next = '$arrNextJson'>".$proname."</li>";
                echo "<li><input type='number' name='number' class = 'ttpro' value='1'></li>
                <li>Discount : ".$arrPriceInfo["Discount"]." %</li>
                <li>Regular Price : ".$arrPriceInfo["Price"]."</li>
            </ul>";
            echo '<div class="btn-group">';
              echo  "<p class = 'add-to-cart' data-id = '$arrcatJson'> &#128722 Add to cart</p>";
              echo  "<p class = 'add-to-order' data-id = '$arrcatJson'> &#128722 Order</p>";
              echo  '<p><a href="../view/index.php?id='.$productID.'" target="_blank" rel="noopener noreferrer"><span>&#9783</span><span>view</span></a></p>
            </div>
            <div class="other flex">';
            echo "<p><span>&#9814</span><span class='wish-com' data-vl = '$arrComJson' data-id = 'compair'>Compare</span></p>
              <p><span>&#9814</span><span class='wish-com' data-vl = '$arrComJson' data-id='wishlist'>Wishlist</span></p>";
          echo  '</div>
          </div>';
            }
            echo'</div>';
            echo "<div class='card-symple flex'>
                <div class = 'pgnCrd next'>
                   <p class = 'pgn' data-id = 'NEXT'>Next</p>
                </div>
            </div>";
        echo '</div>';
    break;
  default:
  $quiry = "select ".$col." from product where P_state = ? and SubState = ? and statuses = ? order by totalsels desc limit 20";
  $stmt = $con->prepare($quiry);
  $stmt->bind_param('sss',$locPub["P_state"],$locPub ["SubState"],$OPS);
  $stmt->execute();
  $stmt->store_result();
  $stmt -> bind_result($SL,$img,$proname,$quantity,$price,$info,$category,$subcategory,$location,$totalview,$totalsels,$shopname,$dates,$productID,$ststuses,$country,$State,$SubState,$P_state,$Activity,$coID,$priceInfo);
  echo '
  <div class="recomand flex-col">
          <div class="recomand-h">
              <h1>RECOMMENDED</h1>
          </div>
          <div class="card-symple flex">';
          while ($stmt->fetch()) {
            $arrPriceInfo = json_decode($PriceInfo,true);
            if ($arrPriceInfo != '') {
              if ($arrPriceInfo["Discount"] != '') {
                $discountPrice = $arrPriceInfo["Price"]-(($arrPriceInfo["Price"]/100) * $arrPriceInfo["Discount"]);
              }
              else {
                $discountPrice = $price;
              }
            }else {
              $discountPrice = $price;
            }
              $arrCt = array("img"=>$img,"proname"=>$proname,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory,"location"=>$location.','.$SubState.','.$State,"ShopName"=>$shopname);
              $arrcatJson = json_encode($arrCt);
              $arrCom = array("img"=>$img,"proname"=>$proname,"info"=>$info,"location"=>$location,"shopName"=>$shopname,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory);
              $arrNext = array("SL"=> $SL,"sttuses"=>$ststuses,"category"=> $category, "subCat"=>$subcategory,"totalsels"=>$totalsels);
              $arrNextJson = json_encode($arrNext);
              $arrComJson = json_encode($arrCom);
          echo  "<div class='card card-did'>";
          echo  '<img src="/blog/upload/'.$img.'" alt="'.$proname.'">
            <ul>
                <li>TK :'.$price.'</span></li>';
                echo "<li id = 'data-next' data-next = '$arrNextJson'>".$proname."</li>";
                echo "<li><input type='number' name='number' class = 'ttpro' value='1'></li>
                <li>Discount : ".$arrPriceInfo["Discount"]." %</li>
                <li>Regular Price : ".$arrPriceInfo["Price"]."</li>
            </ul>";
            echo '<div class="btn-group">';
              echo  "<p class = 'add-to-cart' data-id = '$arrcatJson'> &#128722 Add to cart</p>";
              echo  "<p class = 'add-to-order' data-id = '$arrcatJson'> &#128722 Order</p>";
              echo  '<p><a href="../view/index.php?id='.$productID.'" target="_blank" rel="noopener noreferrer"><span>&#9783</span><span>view</span></a></p>
            </div>
            <div class="other flex">';
            echo "<p><span>&#9814</span><span class='wish-com' data-vl = '$arrComJson' data-id = 'compair'>Compare</span></p>
              <p><span>&#9814</span><span class='wish-com' data-vl = '$arrComJson' data-id='wishlist'>Wishlist</span></p>";
          echo  '</div>
          </div>';
          }
          echo'</div>';
          echo "<div class='card-symple flex'>
              <div class = 'pgnCrd next' data-id = 'card'>
                 <p class = 'pgn' data-id = 'recommand'>Next</p>
              </div>
          </div>";
      echo '</div>';
    break;
}

?>
        
<?php

mysqli_close($con);
?>

