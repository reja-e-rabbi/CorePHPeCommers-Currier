<?php
session_start();
$DBS = 'select';
include_once "../db/mainDB.php";
$productID = $_GET["id"];
$quiry = "select img,proname,quantity,price,info,category,subcategory,location,uploader,email,location, views,localinfo,facbook,contact,totalview,totalsels,totalmoney,shopName,dates,productID,statuses,country,State,SubState,P_state,Activity,DA,coID,priceInfo from product where productID = ? limit 1";
$stmt = $con->prepare($quiry);
$stmt->bind_param('s',$productID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($img,$proName,$quantity,$price,$info,$category,$subcategory,$location,$uploader,$email,$location, $views,$localinfo,$facebook,$contact,$totlaview,$totalsels,$totlamoney,$ShopName,$dates,$productID,$statuses,$country,$state,$substate,$P_state,$activity,$DA,$coID,$PriceInfo);
$stmt->fetch();
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
$arrCt = array("img"=>$img,"proname"=>$proName,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory,"location"=>$location.','.$substate.','.$state, "ShopName"=>$ShopName);
$arrCom = array("img"=>$img,"proname"=>$proName,"info"=>$info,"location"=>$location,"shopName"=>$ShopName,"proID"=> $productID,"coID"=>$coID,"price"=>$discountPrice,"quantity"=>$quantity,"category"=>$category,"SubCat"=>$subcategory);
$arrcatJson = json_encode($arrCt);
$arrComJson = json_encode($arrCom);
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="designer" content="reja-e-rabbi">
	<meta name="developer" content="fiopl">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1,maximum-scale=1">
    <meta http-equiv="Accept-CH" content="DPR, Width, Viewport-Width">
    <?php
    echo '
    <meta property="og:url"           content="https://www.fiopl.com/blog/page/view/index.php?id='.$productID.'" />
    <meta property="og:type"          content="article" />
    <meta property="og:title"         content="'.$proName.'" />
    <meta property="og:description"   content="Price : '.$price.'TK, Location : '.$location.', Uploaded : '.$uploader.' />
    <meta property="og:image"         content="https://www.fiopl.com/blog/upload/'.$img.'" />';
    ?>
<?php	echo "<title>".$proName."</title>" ?>
	<link rel="stylesheet" media="screen, projection" href="dist/drift-basic.min.css">
	<link rel="stylesheet" href="view.css">
</head>

<body>
	<div class="wrapper mainapp">
        <?php
            echo "<img class='drift-demo-trigger' data-zoom='../../upload/".$img."' src='../../upload/".$img."'>";
        ?>
        <?php
        $quiryI = "select img,id,coid from images where id = ? limit 5";
        $stmtI = $con->prepare($quiryI);
        $stmtI->bind_param('s',$productID);
        $stmtI->execute();
        $stmtI->store_result();
        $stmtI->bind_result($imge,$id,$coid);
        ?>
        <div class="media">
            <div class="img">
                <div class="all-img">
                    <?php
                    while ($stmtI->fetch()) {
                        echo '<img class = "focus" src="../../upload/'.$imge.'" alt="'.$proName.'">';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="bages">
            <div class="btn-group">
            <?php
            if ($_SESSION["rolls"]=="company") {
                $arr321 = array("IDS"=> 2, "DBS"=> 'insert', "OPS"=> $cType);
                $idse = json_encode($arr321);
                echo  "<ul>
                    <li class='company-main'>Company Page</li>
                    <li class='Home'><a href='../company/form.php?id=".urlencode($idse)."'>New Upload</a></li>
                    <li class = 'view-cart'>VIEW CART (<span class ='lnt'></span>)</li>
                </ul>";
            } else {
                echo  "<ul>
                    <li class='Home'><a href='/index.php'>HOME</a></li>
                    <li class='add-to-cart' data-id='$arrcatJson'>ADD TO CART</li>
                    <li class='go-to-order' data-id='$arrcatJson'>ORDER</li>
                    <li class = 'view-cart'>VIEW CART (<span class ='lnt'></span>)</li>
                </ul>";
            }
               ?>
            </div>
        </div>
        <div class="log">
            <?php
            echo '<ul style="display: inline;" class = "tav">
            <li style="display: inline; margin: 5px;padding-left: 10px;padding-right: 10px;padding-bottom: 5px;padding-top: 5px;border-radius: 50px;background-color: rgb(10, 14, 13);color: rgb(226, 208, 208); cursor: pointer;" class = "button facebook" data-sharer="facebook"  data-hashtag="Fiopl " data-url="https://fiopl.com/blog/page/view/index.php?id='.urlencode($productID).'" >f</li>
            <li style="display: inline; margin: 5px;padding-left: 10px;padding-right: 10px;padding-bottom: 5px;padding-top: 5px;border-radius: 50px;background-color: rgb(10, 14, 13);color: rgb(226, 208, 208); cursor: pointer; " class = "button twiter" data-sharer="twitter"  data-hashtag="Fiopl " data-url="https://fiopl.com/blog/page/view/index.php?id='.urlencode($productID).'">t</li>
            <li style="display: inline; margin: 5px;padding-left: 10px;padding-right: 10px;padding-bottom: 5px;padding-top: 5px;border-radius: 50px;background-color: rgb(10, 14, 13);color: rgb(226, 208, 208);cursor: pointer; " class = "button ln" data-sharer="linkedin"  data-hashtag="Fiopl " data-url="https://fiopl.com/blog/page/view/index.php?id='.urlencode($productID).'">ln</li>
            <li style="display: inline; margin: 5px;padding-left: 10px;padding-right: 10px;padding-bottom: 5px;padding-top: 5px;border-radius: 50px;background-color: rgb(10, 14, 13);color: rgb(226, 208, 208); cursor: pointer;" class = "button ln" data-sharer="reddit"  data-hashtag="Fiopl " data-url="https://fiopl.com/blog/page/view/index.php?id='.urlencode($productID).'">rdt</li>
            </ul>';
            ?>
        </div>
		<div class="detail">
            <?php
            echo
			"<section>";
            echo "<h1>".$proName."</h1>
                <ul><li>Price : <span>".$discountPrice."</span> TK</li>
                    <li>Total order : <input type='number' class = 'ttpro' name='quantity' value='1' id='number'></li>
                    <li>Maximum order : ".$quantity." piece</li>
                    <li>Size or Recommend : <input type='text' name='size' id='size' placeholder='XL'> </li>
                    <li>Discount : <span>".$arrPriceInfo["Discount"]."</span> %</li>
                    <li>Actual Price : <span>".$price."</span> TK</li>
                    <li>Location : <span>".$location."</span></li>
                    <li> <span>".$P_state.",".$substate.",".$state."</span></li>
                    <li>Code : <span> ".$productID." </span></li>
                    <li>Shop name : <span> ".$ShopName." </span></li>
                    <li>Contact : <span> ".$contact." </span></li>
                    <li>Status : <span> ".$statuses." </span></li>
                </ul>";
                
            echo "<ul>";
                if (($_SESSION["rolls"] == 'company')||($_SESSION["rolls"]=='admin')||($_SESSION["rolls"]=='serviceman')) {
                echo '<li>Category : <span>'.$category.'</span> </li>';
                echo '<li>Sub Category : <span>'.$subcategory.'</span> </li>';
                echo '<li>Uploader : <span>'.$uploader.'</span> </li>';
                echo '<li>Email : <span>'.$email.'</span> </li>';
                echo '<li>Code : <span> '.$productID.' </span></li>';
                if (($_SESSION["rolls"] == 'company')||($_SESSION["rolls"]=='admin')) {
                    echo '<li>Total views : <span>'.$totlaview.'</span> </li>';
                    echo '<li>Total sells : <span>'.$totalsels.'</span> </li>';
                    echo '<li>Date : <span> '.$dates.' </span></li>';
                    if (($_SESSION["rolls"]=='admin')) {
                        echo '<li>Company ID : <span> '.$coID.' </span></li>';
                    }
                }

            }
            echo "</ul>";

            echo  "</section>";
            echo"<section>";
            echo  "<div class='pan'></div>";
                echo base64_decode($info);
            echo"</section>";
            ?>
		</div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/sharer.js@latest/sharer.min.js"></script>
    <script src="dist/Drift.js"></script>
    <script src="view.js"></script>
</body>

</html>



<?php
mysqli_close($con);
?>
</body>
</html>