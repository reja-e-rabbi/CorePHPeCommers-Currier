<?php
  session_start();
  if (!$_SESSION["all"] == '') {
    $ckall = json_decode( $_SESSION["all"], true);
    switch ($ckall["rolls"]) {
      case 'company':
        $arr = array("IDS"=> 1, "DBS"=> 'select', "OPS"=> 'unknow', "ID"=> $ckall["id"]);
        $id = json_encode($arr);
        header("location: /blog/page/company/index.php?id=".urlencode($id));
        break;
      case 'supplyman':
        $arr = array("IDS"=> 1, "DBS"=> 'select', "OPS"=> 'unknow', "ID"=> $ckall["id"]);
        $id = json_encode($arr);
        header("location: /blog/page/supplyman/index.php?id=".urlencode($id));
        break;
      case 'admin':
        header("location: /blog/page/admin/index.php");
        break;
      default:
        echo "contact your admin";
        break;
    }
  } else{
    if ($_COOKIE["location"]== '') {
      header("location: /blog/page/sequr/location.php");
    }else {
      $ids = array("IDS"=>"public","DBS"=>"select","OPS"=>"active","SOPS"=>"RECOMMENDED");
      $arrON = base64_encode(json_encode($ids));
      header("location: /blog/page/public/index.php?id=$arrON");
    } 
    echo "hallow wo0rld";
  }
?>