<?php
session_start();
include_once "../../../config.php";
$json = $_GET["id"];
$arr = json_decode($json, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$busness = $arr["busness"];
$country = $arr["country"];
$state = $arr["state"];
$sdiv = $arr["sdiv"];
$up = $arr["up"];
$l_name = $arr["l_name"];
include_once ("../db/mainDB.php");
?>
<?php
switch ($IDS) {
    case 1:
        $req_email = $_SESSION['email'];
        $req_pass = $_SESSION['password'];
        $ID = $_SESSION["ID"];
        $quiry = "update userlog set Country = ? , State = ? , SubState = ? , P_state = ? , onLocation = ? , selectType = ? where ID = ? limit 1";
        $stmt = $con->prepare($quiry);
        $stmt->bind_param('sssssss', $country,$state, $sdiv,$up,$l_name,$busness,$ID);
        $stmt->execute();
        $affected = $stmt->affected_rows;
        echo $affected;
        if ($affected == 0 ) {
            echo "Number of effected rows 0";
        } elseif ($affected == 1) {
            header("location: /blog/page/log/log_pros.php?email=".urlencode($req_email)."&password=".urlencode($req_pass));
        }elseif ($affected > 1) {
            echo "unlimited row effected";
        }
         else {
            $string = "there Have some types of error find, plese try agane letter";
            header("location: /blog/page/company/form.php?id=".urlencode($json)."&string=".urlencode($string));
        } 
        break;
    case 2:
        
        $file = $_FILES['upload-img'];
        $fileName = $file['name'];
        $fileTmpDir = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png', 'svg', 'webp');
        //$fileNewName = date('Y-m-d-His'). '.'.$fileActualExt;
        //$path = '/var/www/userd.com/blog/upload/'.$_SESSION['URL'].'/'.$fileNewName;
        $date = date('Y-m-d-H-i-s-u');
        $sessNam = $_SESSION["name"];
        $sesemail = $_SESSION["email"];
        $sesphone = $_SESSION["contact"];
        $bytes = bin2hex(random_bytes(3)).date('Ymd-His');
        $filecount = count($file["name"]);
        if ($filecount < 5) {
            for ($i=0; $i < $filecount ; $i++) { 
                $flsz =  array($i + 1 => $fileSize[$i]);
                foreach ($flsz as $value) {
                    if ($value > 100000) {
                        echo "file size is big, Maximum image size is 100KB";
                        echo $fileName[$i];
                    }else {
                        $ProName = $_POST["id"][0];
                        $Quantity = $_POST["id"][1];
                        settype($Quantity, "integer");
                        $FoodDetels = $_POST["id"][2];
                        $Category = $_POST["id"][3];
                        $SubCategory = $_POST["id"][4];
                        $Price = $_POST["id"][5];
                        settype($Price, "integer");
                        echo 'Name :'.$Name. 'Quantity :'.$Quantity.'FoodDetels :'.$FoodDetels;
                        echo 'Category :'.$Category.'Sub Category :'.$SubCategory.'Price :'.$Price;
                        $arrAll = $_SESSION["all"];
                        echo $arrAll;
                        $fl = $file["name"][$i];
                        $imgarr = array($i + 1 => $fl);
                        $img = json_encode($imgarr);
                        $fileTmpDir = $file['tmp_name'][$i];
                        $fileNewName = $bytes. '.'.$fileName[$i].$fileActualExt[$i];
                        $open = array("proName"=>$ProName,"quantity"=>$Quantity,"foodDetels"=>$FoodDetels,"Category"=>$Category,'subCategory'=>$SubCategory,"price"=>$Price,"dID"=>$bytes);
                        //$path = '/var/www/userd.com/blog/upload/'.$_SESSION['URL'].'/'.$fileNewName; // for linux
                        $path = '../../upload/'.$_SESSION['URL'].'/'.$fileNewName;
                        /*$quiry = "insert into product(img,proname,quantity,price, info,category,subcategory,uploader) values(?,?,?,?, ?,?,?,?)";
                        $stmt = $con->prepare($quiry);
                        $stmt->bind_param('ssisssss',$fileone,$ProName,$Quantity,$Price, $FoodDetels, $Category,$SubCategory,$_SESSION["name"]);
                        $stmt->execute();*/
                        //move_uploaded_file($fileTmpDir, $path);
                    }
                }
            }
        } else {
            echo "Maximum 10 Image upload and each of the file size 100KB maximum, quiry faild";
        }
            break;
        case 'com':
            $_SESSION['productInfo'] = $_COOKIE['productInfo'];
            header('location: /blog/page/edit/index.php?id='.urldecode($json));
            break;
     default:
                echo "there have some error chech this";
        break;
}


?>
<?php
 mysqli_close($con);
?>

