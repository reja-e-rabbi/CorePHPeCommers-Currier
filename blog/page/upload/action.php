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

switch ($_SESSION["rolls"]) {
    case 'company':
        include_once('../db/mainDB.php');
        $file = $_FILES['upload-img'];
        $fileName = $file['name'];
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
                        echo '<a href="index.php?id='.urlencode($json).'">Back .. to..try agane</a>';
                        
                    }else {
                        $fl = $file["name"][$i];
                        $imgarr = array($i + 1 => $fl);
                        $img = json_encode($imgarr);
                        $fileTmpDir = $file['tmp_name'][$i];
                        $fileNewName = $bytes. '.'.$fileName[$i].$fileActualExt[$i];
                        //$path = '/var/www/userd.com/blog/upload/'.$_SESSION['URL'].'/'.$fileNewName; // for linux
                        $path = '../../upload/'.$_SESSION['URL'].'/'.$fileNewName; //for windows
                        $quiry = "insert into images (img,id,coid) values(?,?,?)";
                        $stmt = $con->prepare($quiry);
                        $stmt->bind_param('sss',$fileNewName,$bytes,$_SESSION["ID"]);
                        $stmt->execute();
                        $_SESSION["bytes"] = $bytes;
                        if ($stmt->insert_id != '') {
                            move_uploaded_file($fileTmpDir, $path);
                            header('location: /blog/page/upload/action2.php?id='.urlencode($json));
                        }
                        
                    }
                }
            }
        } else {
            echo "Maximum 4 Image upload and each of the file size 100KB maximum, quiry faild";
        }
        break;
    
    default:
        # code...
        break;
}

?>