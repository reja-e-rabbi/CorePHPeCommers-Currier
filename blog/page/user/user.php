<?php
include_once "../db/dbcon.php";
$query = "select count(Rolls) from userlog where Rolls='admin' group by Rolls";
$query .= "select count(Rolls) from userlog where Rolls='supplyman' group by Rolls;"; 
$query .= "select count(Rolls) from userlog where Rolls='company' group by Rolls";
$id = $_GET["id"];
?>

<?php
      switch ($id) {
        case 1:
        $qirry_1 = "select SL, FirstName, LastName, UserName, ID, Pass, BirthDate, JoinDate, Rolls, Information, email, contact, AddBy, activity, State, SubState, P_state, onLocation from userlog where Rolls = 'supplyman' or Rolls = 'company'  order by JoinDate limit 20 ";
        $result_1 = mysqli_query($con, $qirry_1);
        $a = mysqli_fetch_assoc($result_1);
        $No = 1;
        if ($rolls = "admin") {
          while ($a = mysqli_fetch_assoc($result_1)) {
            $arr = array("f_name"=> $a["FirstName"],"l_name"=> $a["LastName"],"u_name"=>$a["UserName"],"ID"=>$a["ID"],"email"=>$a["email"],"contact"=>$a["contact"],"rolls"=>$a["Rolls"],"addby"=>$a["AddBy"]);
            $array = json_encode($arr);
            echo "<tr>";
            echo "<td>".$No++."</td>";
            echo "<td>".$a["FirstName"]."</td>";
            echo "<td>".$a["ID"]."</td>";
            echo "<td>".$a["email"]."</td>";
            echo "<td>".$a["contact"]."</td>";
            echo "<td>".$a["Rolls"]."</td>";
            echo "<td>".$a["activity"]."</td>";
            echo "<td>"."<a href='info.php?id=".urldecode($array)."' target='blank'>view</a>"."</td>";
            echo "</tr>"; 
          }
        }

          break;

          case 2:
          echo "that is write track";
          break;

        case 3:
          # code...
          $obj = json_decode($_GET["obj"], true);
          $state = $obj["st"];
          $sr = $obj["sr"];
          $quiry = "select SL, FirstName, LastName, UserName, ID, Pass, BirthDate, JoinDate, Rolls, Information, email, contact, AddBy, activity, State, SubState, P_state, onLocation from userlog where State = ? and UserName like '%{$sr}%' or ID like '%{$sr}%' or email like '%{$sr}%' or FirstName like '%{$sr}%' or contact like '%{$sr}%' or activity like '%{$sr}%' or AddBy like '%{$sr}%' order by JoinDate desc limit 100";
          $stmt = $con->prepare($quiry);
          $stmt->bind_param('s',$state);
          $stmt->execute();
          $stmt->store_result();
          $numr = $stmt->num_rows;
          $stmt->bind_result($SL,$FirstName,$LastName,$UserName,$ID,$Pass,$BirthDate,$JoinDate,$Rolls,$Information,$email,$contact,$AddBy,$activity,$State,$SubState,$P_state,$onLocation);
          while ($stmt->fetch()) {
            # code...
            $arr = array("f_name"=> $FirstName,"l_name"=> $LastName,"u_name"=>$UserName,"ID"=>$ID,"Birth"=>$BirthDate,"email"=>$email,"contact"=>$contact,"rolls"=>$Rolls,"addby"=>$AddBy,"activity"=>$activity,"state"=>$State,"S_state"=>$SubState,"P_state"=>$P_state,"onLocation"=>$onLocation);
            $array = json_encode($arr);
            echo "<tr>";
            echo "<td>".$SL."</td>";
            echo "<td>".$FirstName."</td>";
            echo "<td>".$ID."</td>";
            echo "<td>".$email."</td>";
            echo "<td>".$contact."</td>";
            echo "<td>".$Rolls."</td>";
            echo "<td>".$activity."</td>";
            echo "<td>"."<a href='info.php?id=".urldecode($array)."' target='blank'>view</a>"."</td>";
            echo "</tr>"; 
          }
          break;
          
        default:
          # code...
          echo "check your connection";
          break;
      }
?>
<?php
mysqli_close($con);
?>