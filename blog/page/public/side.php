<?php
session_start();
$get = $_GET["id"];
$arr = json_decode(base64_decode($get),true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
include_once "../db/mainDB.php";
$col = " SL,img,proname,quantity,price,info,category,subcategory,location,totalview,totalsels,shopName,dates,productID,statuses,country,State,SubState,P_state,Activity,coID,priceInfo";
$loc = json_decode($_COOKIE["location"], true);
?>
<?php
switch ($IDS) {
    case 'side':
         $scat = $arr["CAT"];
         $ct = $arr["SubCat"];
         if ($scat != '') {
            $quiry = "select ".$col." from product where P_state = ? and SubState = ? and statuses = ? and category =? order by dates desc limit 20";
            $stmt = $con->prepare($quiry);
            $stmt->bind_param('ssss',$loc["P_state"],$loc ["SubState"],$OPS,$ct);
         }
         $stmt->execute();
         $stmt->store_result();
         $stmt -> bind_result($SL,$img,$proname,$quantity,$price,$info,$category,$subcategory,$location,$totalview,$totalsels,$shopname,$dates,$productID,$ststuses,$country,$State,$SubState,$P_state,$Activity,$coID,$PriceInfo);
         if ($stmt->num_rows != '') {
            echo '
            <div class="recomand flex-col">
                    <div class="recomand-h">
                        <h1>'.strtoupper($scat).'</h1>
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
                    echo "<div class='card-symple flex'>
                        <div class = 'pgnCrd next'>
                           <p class = 'pgn' data-id = 'searchPG'>Next</p>
                        </div>
                    </div>";
         }else {
            echo '<div class="recomand flex-col">';
              echo "no data have";
            echo '</div>';
        }
        break;
        case 'search':
            $search = $arr["OPSs"];
            setcookie('search',$search,time()+60*60*60,'/');
            if ($search != '') {
                $quiry = "select ".$col." from product where P_state = ? and subcategory like '%{$search}%' or category like '%{$search}%' or proname like '%{$search}%' and SubState = ? and statuses = ?  order by dates desc limit 20";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('sss',$loc["P_state"],$loc ["SubState"],$OPS);
            }
            $stmt->execute();
            $stmt->store_result();
            $stmt -> bind_result($SL,$img,$proname,$quantity,$price,$info,$category,$subcategory,$location,$totalview,$totalsels,$shopname,$dates,$productID,$ststuses,$country,$State,$SubState,$P_state,$Activity,$coID,$PriceInfo);
            if ($stmt->num_rows != 0) {
                echo '
            <div class="recomand flex-col">
                    <div class="recomand-h">
                        <h1>'.strtoupper($scat).'</h1>
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
                    echo "<div class='card-symple flex'>
                        <div class = 'pgnCrd next'>
                           <p class = 'pgn' data-id = 'searchPG'>Next</p>
                        </div>
                    </div>";
            }else{
                echo '<div class="recomand flex-col">';
                   echo "search again,input a perfect text for good result ...";
                echo '</div>';
            }
        break;
        case 'searchPG':
            $search = $arr["OPSs"];
            echo $search;
            if ($search != '') {
                $quiry = "select ".$col." from product where P_state = ? and subcategory like '%{$search}%' or category like '%{$search}%' or proname like '%{$search}%' and SubState = ? and statuses = ?  order by dates desc limit 20";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('sss',$loc["P_state"],$loc ["SubState"],$OPS);
            }
            $stmt->execute();
            $stmt->store_result();
            $stmt -> bind_result($SL,$img,$proname,$quantity,$price,$info,$category,$subcategory,$location,$totalview,$totalsels,$shopname,$dates,$productID,$ststuses,$country,$State,$SubState,$P_state,$Activity,$coID);
            echo $stmt->num_rows;
            if ($stmt->num_rows != 0) {
                echo '
            <div class="recomand flex-col">
                    <div class="recomand-h">
                        <h1>'.strtoupper($scat).'</h1>
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
                    echo "<div class='card-symple flex'>
                        <div class = 'pgnCrd next'>
                           <p class = 'pgn' data-id = 'recommand'>Next</p>
                        </div>
                    </div>";
            }else{
                echo '<div class="recomand flex-col">';
                   echo "search again,input a perfect text for good result ...";
                echo '</div>';
            }
        break;
    default:
        echo "that is not match";
        break;
}


?>