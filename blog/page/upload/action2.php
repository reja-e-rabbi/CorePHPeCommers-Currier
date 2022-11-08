<?php
session_start();
include_once "../../../config.php";
$json = $_GET["id"];
$arr = json_decode($json, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
?>
<?php
switch ($_SESSION['rolls']) {
    case 'company':
        include_once "../db/mainDB.php";
        $quiry = "select img,id,coid from images where id = ? limit 1";
        $stmt = $con->prepare($quiry);
        $stmt->bind_param('s',$_SESSION['bytes']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($img,$id,$coid);
        $stmt->fetch();
        if ($stmt->num_rows != 0) {
            $productInfo = json_decode($_SESSION["productInfo"],true);
            $ProName = $productInfo['Name'];
            $Quantity = $productInfo['Quantity'];
            $Category = $productInfo['Category'];
            $SubCategory = $productInfo['SubCate'];
            $Price = $productInfo['Price'];
            $priceInfo = json_encode(array("Price"=>$Price,"Discount"=>$productInfo["Discount"]));
            $detels = $_SESSION['detels'];
            $SnAll = json_decode($_SESSION['all'],true);
            $status = 'active';
            $country = 'Bangladesh';
            $activity = 'on';
            echo $priceInfo;
            $quiry = "insert into product (img,proname,quantity,price, info,category,subcategory,uploader, email,location,contact,shopName, productID,statuses,country,State, SubState,P_state,Activity,coID,priceInfo) values(?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?, ?,?,?,?, ?)";
            $stmt = $con->prepare($quiry);
            $stmt->bind_param('ssiisssssssssssssssss',$img,$ProName,$Quantity,$Price, $detels,$Category,$SubCategory,$_SESSION["name"], $_SESSION["email"],$SnAll['location'],$SnAll['contact'], $SnAll['u_name'],$id,$status,$country,$SnAll['state'],$SnAll['s_state'],$SnAll['P_state'],$activity,$coid,$priceInfo);
            $stmt->execute();
            if ($stmt->insert_id) {
                header('location: /blog/page/view/index.php?id='.urlencode($id));
            } else{
                echo 'product upload not success but image upload is success';
            } 
            
        }else{
            echo "this data not success to load try agane";
        }
        break;
    
    default:
        # code...
        break;
}

?>