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
?>
<?php
switch ($IDS) {
    case 'detect':
        include_once "../db/mainDB.php";
        $quiry = "select SL,ID,AddBy,dates,Country,State,users,orders,onLoceation,SubState,P_state,s_rate from location where SubState = ? and onLoceation like '%{$EOPS}%' limit 1";
        $stmt = $con->prepare($quiry);
        $stmt->bind_param('s', $SOPS);
        $stmt->execute();
        $stmt->store_result();
        $numr = $stmt-> num_rows;
        $stmt->bind_result($SL,$ID,$AddBy,$dates,$Country,$State,$Users,$orders,$onLoceation,$SubState, $P_state, $S_rate);
        $stmt->fetch();
        if (!$numr == 0) {
            $ids = array("IDS"=>"public","DBS"=>"select","OPS"=>"active","SOPS"=>"RECOMMENDED");
            $arrON = base64_encode(json_encode($ids));
            $vlu = array("ID"=>$ID,"Country"=>$Country,"state"=>$State,"user"=>$Users,"order"=>$orders,"location"=>$onLoceation,"SubState"=>$SubState,"P_state"=>$P_state,"s_rate"=>$S_rate);
            echo $arrvlu = json_encode($vlu);
            setcookie('location',$arrvlu,time()+60*60*24*30, '/');
            header("location: /blog/page/public/index.php?id=$arrON");
        }else {
            echo '<p>your village and police station do\'t match, back to try agane</p>';
            echo '<button><a href="location.php">BACK</a></button>';
        }
        mysqli_close($con);
        break;
    
    default:
        echo 'check perfect IDS';
        break;
}
?>