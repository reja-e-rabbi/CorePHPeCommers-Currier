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
if ($_GET["obj"] != '') {
  $objjson = $_GET["obj"];
  $objarr = json_decode($objjson,true);
  $NUM = $objarr["NUM"];
  $LASTv = $objarr["LASTv"];
}
$cul = "SL,img,proname,quantity,price,info,category,subcategory,uploader,email,location, views,localinfo,facbook,contact,totalview,totalsels,totalmoney,shopName,dates,productID,statuses,country,State,SubState,P_state,Activity,DA,coID";
?>
<?php
     switch ($IDS) {
       case '1':
        echo '<link rel="stylesheet" href="../../fram/css/table.css">';
        session_start();
        include_once "../db/mainDB.php";
        if($arr["STT"]== ''){
          $stt = 'active';
        }else {
          $stt = $arr["STT"];
        }
        $tab = $LASTv * $NUM - 20;
        switch ($_SESSION["rolls"]) {
          case 'company':
            $quiry = "select ".$cul." from product where coID = ? and statuses = ? order by dates desc limit 20";
            if (($LASTv != '') && ($NUM != '')) {
              $quiry = "select ".$cul." from product where coID = ? and statuses = ? and SL < ".$tab." order by dates desc limit 20";
              $stmt = $con->prepare($quiry);
              $stmt->bind_param('ss',$_SESSION["ID"],$stt);
            }
            $stmt = $con->prepare($quiry);
            $stmt->bind_param('ss',$_SESSION["ID"],$stt);
            $stmt->execute();
            $stmt->store_result();
            break;
          case 'admin':
            $quiry = "select ".$cul." from product where statuses = ?  order by dates desc limit 20";
            if (($LASTv != '') && ($NUM != '')) {
              $quiry = "select ".$cul." from product where statuses = ? and SL < ".$tab." order by dates desc limit 20";
              $stmt = $con->prepare($quiry);
              $stmt->bind_param('ss',$_SESSION["ID"],$stt);
            }
            $stmt = $con->prepare($quiry);
            $stmt->bind_param('s',$stt);
            $stmt->execute();
            $stmt->store_result();
            break;
          default:
            echo "this code is null check agane";
            break;
        }
        $stmt->bind_result($SL,$img,$proName,$quantity,$price,$info,$category,$subcategory,$uploader,$email,$location, $views,$localinfo,$facebook,$contact,$totlaview,$totalsels,$totlamoney,$ShopName,$dates,$productID,$statuses,$country,$state,$substate,$P_state,$activity,$DA,$coID);
        $No = 1;
         echo '<div class="s-table">
         <div class="form">
           
           <div class="form-group">
             <input type="search" placeholder="Product Name or sub Category" name="id[]" id="search"/>
             <input type="submit" class="submit" value="submit" />
           </div>
           <div class="form-group">
             <input type="hidden" name="hide value" />
             <ul>
               <li data-id="Dhanua, shibpur">
                 <span class="search-val">Dhanua, shibpur</span>
               </li>
               <li data-id="Dhanua college para, shibpur">
                 <span class="search-val"> Dhanua college para, shibpur</span>
               </li>
               <li>
                 <span class="search-val">Dhanua Karebare, shibpur</span>
               </li>
               <li>
                 <span class="search-val">Dhanua Uttor para, shibpur</span>
               </li>
               <li>
                 <span class="search-val">Dhanua Setera para, shibpur</span>
               </li>
             </ul>
           </div>
         </div>
         <table class="table-content">';
           echo'<caption class="stt1">
             '.$stt.' data
           </caption>';
           echo'<thead>
             <tr>
               <th>No</th>
               <th>Image</th>
               <th>Name</th>
               <th>Price</th>
               <th>Status</th>
               <th>Action</th>';
               if ($_SESSION["rolls"] == "admin") {
                 echo '
                 <th>Shop</th>
                 <th>Add By</th>
                 <th>Date</th>';
               }
              echo '
               <th>Edit</th>
               <th>View</th>
             </tr>
           </thead>
           <tbody class="tbody">';
           while ($stmt->fetch()) {
            echo "<tr>
               <td data-id=".$SL.">".$No++."</td>
               <td><img src='../../upload/".$img."' width='80px' height='75px' alt='".$proName."'></td>
               <td>".$proName."</td>
               <td>".$price."</td>
               <td>".$statuses."</td>";
            if ($_SESSION["rolls"]== 'admin') {
                echo "<td>".$substate.",".$state.",".$country."</td>";
                echo "<td>".$ShopName."</td>";
                echo "<td>".$dates."</td>";
              }
            echo "<td><select name='action' data-id = '$productID' id='action'>
                <option data-id = '$productID' value=''>".$statuses."</option>
                <option class='action' data-id = '$productID' value='active'>active</option>
                <option class='action' data-id = '$productID' value='stock out'>Stock out</option>
                <option class='action'data-id = '$productID'  value='service off'>Service off</option>
                ";
                if ($_SESSION["rolls"]== 'admin') {
                  echo "<option class='action' data-id = '$productID' value='block'>Block</option>
                  <option class='action' data-id = '$productID' value='reject'>Reject</option>
                  ";
                }
            echo "</select><button class='submit1'>submit</button></td>
               <td><a href='../product/form.php?id=".urlencode(json_encode(array("IDS"=>"edit","DBS"=>"select","OPS"=>"pdtedt","EOPS"=>$productID)))."' target='_blank' rel='noopener noreferrer'>Edit</a></td>
               <td><a href='../view/index.php?id=".urlencode($productID)."' target='_blank' rel='noopener noreferrer' >view</a></td>
            </tr>";
           }
           
           echo '</tbody>
           <tfoot role="alert">
             <tr>
               <td colspan="7">.......</td>
             </tr>
           </tfoot>
         </table>
         ';
         echo '<div class="paging">';
         $tabExt = $tab;
         switch ($_SESSION["rolls"]) {
           case 'company':
            $quiry2 = "select count(*) from product where coID = ? and statuses = ? order by dates desc limit 200";
            if (($LASTv != '') && ($NUM != '')) {
              $quiry2 = "select count(*) from product where coID = ? and statuses = ? and SL < ".$tabExt." order by dates desc limit 200";
            }
            $stmt = $con->prepare($quiry2);
            $stmt->bind_param('ss', $_SESSION["ID"],$stt);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($total); 
            $stmt->fetch();
            break;
           case 'admin':
            $quiry2 = "select count(*) from product where statuses = ? order by dates desc limit 200";
            if (($LASTv != '') && ($NUM != '')) {
              $quiry2 = "select count(*) from product where statuses = ? and SL < ".$tabExt." order by dates desc limit 200";
            }
            $stmt = $con->prepare($quiry2);
            $stmt->bind_param('s',$stt);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($total); 
            $stmt->fetch();
             break;
           default:
             # code...
             break;
         }
         $pg = round($total/20, 0, PHP_ROUND_HALF_UP)+1;
         echo '<ul id="ulc">'; 
         $ic = 0;
          echo '<li><span>Back</span></li>'; 
           for($a=1;$a<$pg;$a++){ echo '
           <li data-id="'.$a.'"><span class="pgn paging" data-id="'.$stt.'">'.$a.'</span></li>
           '; } echo '
           <li data-id="'.$SL[0].'"><span class="pgn paging" data-id="'.$stt.'" >Next</span></li>
           '; echo '
         </ul>
         '; 
        echo  '</div>
         </div>';
         break;
       case 'action':
        include_once "../db/mainDB.php";
        if ($arr["STT"] != '') {
          $status = $arr["STT"];
          $dataID = $arr["DID"];
          $quiry = "update product set statuses = ? where productID = ? limit 1";
          $stmt = $con->prepare($quiry);
          $stmt->bind_param('ss', $status, $dataID);
          $stmt->execute();
          if ($stmt->affected_rows == 1) {
            echo $status;
          }
        }
         break;
       case 'edit':
         echo "hallow form";
         break;
       default:
         echo "Check your value";
         break;
     
        }
?>
<!--<div class="s-card">
  <a href="#" class="s-value">
    <p>Recent upload</p>
    <p>325</p>
  </a>
  <a href="#" class="s-value">
    <p>Error product</p>
    <p>325</p>
  </a>
  <a href="#" class="s-value">
    <p>Reject product</p>
    <p>325</p>
  </a>
  <a href="#" class="s-value">
    <p>Delete product</p>
    <p>325</p>
  </a>
</div>
<div>-->
