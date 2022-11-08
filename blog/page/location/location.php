<?php
session_start();
include_once "../../../config.php";
include_once "../db/dbcon.php";
$ids = $_GET["id"];
$arr = $_GET["obj"];
$obj = json_decode($arr, true);

?>

<?php
switch ($ids) {
  case 1:
    $sl = 1;
      $quiry = "select SL, ID, AddBy, dates, users, orders, Country, State, onLoceation, SubState, P_state, s_rate from location order by dates desc limit 15";
      $stmt = $con->prepare($quiry);
      $stmt->execute();
      $stmt-> store_result();
      $stmt->bind_result($SL, $ID, $AddBy, $dates, $users, $orders, $Country, $State, $onLoceation, $SubState, $P_state, $S_rate);
      while ($stmt->fetch()) {
        $ar = json_decode($AddBy);
        echo '<tr>
        <td data-id = "'.$SL.'">'.$sl++.'</td>
        <td>'.$onLoceation.'</td>
        <td>'.$users.'</td>
        <td>'.$orders.'</td>
        <td>'.$P_state.'</td>
        <td>'.$SubState.'</td>
        <td>'.$State.'</td>
        <td>'.$Country.'</td>
        <td>'.$SL.'</td>
        <td>PA</td>
        <td>'.$AddBy.'</td>
        <td>'.$dates.'</td>
        <td> view</td>
      </tr>';
      }
    break;
    
    case 2:
      $st = $obj["NUM"]*15;
      $gt = $st-15;
      $quiry = "select SL, ID, AddBy, dates, users, orders, Country, State, onLoceation, SubState, P_state, s_rate from location where  SL >= ? and SL <= ? order by dates limit 15";
      $stmt = $con->prepare($quiry);
      $stmt->bind_param('ii', $gt, $st);
      $stmt->execute();
      $stmt->store_result();
      $numr = $stmt-> num_rows;
      $stmt->bind_result($SL, $ID, $AddBy, $dates, $users, $orders, $Country, $State, $onLoceation, $SubState, $P_state, $S_rate);
      if ($numr == 0) {
        echo "No data Insert";
      }else {
        while ($stmt->fetch()) {
          $ar = json_decode($AddBy);
          echo '<tr>
          <td data-id = "'.$SL.'">'.$SL.'</td>
          <td>'.$onLoceation.'</td>
          <td>'.$users.'</td>
          <td>'.$orders.'</td>
          <td>'.$P_state.'</td>
          <td>'.$SubState.'</td>
          <td>'.$State.'</td>
          <td>'.$Country.'</td>
          <td>'.$SL.'</td>
          <td>PA</td>
          <td>'.$AddBy.'</td>
          <td>'.$dates.'</td>
          <td> view</td>
        </tr>';
        }
      }
      break;
      case 3:
        # code...
      $onLocation = $obj["sr"];
      $State = $obj["st"];
        $sl = 1;
      $quiry = "select SL, ID, AddBy, dates, users, orders, Country, State, onLoceation, SubState, P_state, s_rate from location where State = ? and onLoceation like '%{$onLocation}%' order by onLoceation limit 50";
      $stmt = $con->prepare($quiry);
      $stmt->bind_param('s', $State);
      $stmt->execute();
      $stmt->store_result();
      $numr = $stmt-> num_rows;
      $stmt->bind_result($SL, $ID, $AddBy, $dates, $users, $orders, $Country, $State, $onLoceation, $SubState, $P_state, $S_rate);
      if ($numr == 0) {
        echo "No data Insert";
      }else {
        while ($stmt->fetch()) {
          $ar = json_decode($AddBy);
          echo '<tr>
          <td data-id = "'.$SL.'">'.$SL.'</td>
          <td>'.$onLoceation.'</td>
          <td>'.$users.'</td>
          <td>'.$orders.'</td>
          <td>'.$P_state.'</td>
          <td>'.$SubState.'</td>
          <td>'.$State.'</td>
          <td>'.$Country.'</td>
          <td>'.$SL.'</td>
          <td>PA</td>
          <td>'.$AddBy.'</td>
          <td>'.$dates.'</td>
          <td> view</td>
        </tr>';
        }
      }
      echo $numr . "data insert";
        break;
  default:
    # code...
    echo "check your url link if not insert data contact to devoloper";
    break;
}       
      ?>