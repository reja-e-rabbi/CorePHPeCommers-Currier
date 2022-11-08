<?php
session_start();
include_once "../db/dbcon.php";
include_once "/config.php";
$rolls = $_SESSION["rolls"];
?>
<link rel="stylesheet" href="../../fram/css/table-default.css">
<?php
$id = $_GET["id"];
echo '<table>
        <caption>
          all insert data
        </caption>
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>ID</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Rolls</th>
            <th>Activity</th>
            <th>View</th>
          </tr>
        </thead>
        <tbody class="tbody">';
switch ($id) {
    case 1:
        $script = "select SL, FirstName, LastName, UserName, ID, email, contact, Rolls, AddBy, activity from userlog where Rolls = 'admin' and activity = 'active' order by JoinDate";
        $query = mysqli_query($con, $script);
        $a = mysqli_fetch_assoc($query);
        $No = 1; 
        if ($rolls = "admin") {
          while ($a = $query->fetch_assoc()) {
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
        else {
          echo "check your prpper connection";
        }
        
   
        break;
    
    case 2:
    $script = "select SL, FirstName, LastName, UserName, ID, email, contact, Rolls, AddBy, activity from userlog where Rolls = 'company' and activity = 'active' limit 50";
    $query = mysqli_query($con, $script);
    $No = 1;  
               while ($a = mysqli_fetch_assoc($query)) {
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
      break;

    case 3:
    $qirry_1 = "select SL, FirstName, LastName, UserName, ID, email, contact, Rolls, AddBy, activity from userlog where Rolls = 'supplyman' and activity = 'active' limit 50";
    $result_1 = mysqli_query($con, $qirry_1);
    $a = mysqli_fetch_assoc($result_1);
    $No = 1;
    if ($rolls = "admin") {
      while ($a = mysqli_fetch_assoc($result_1)) {
        $arr = array("f_name"=> $a["FirstName"],"l_name"=> $a["LastName"],"u_name"=>$a["UserName"],"ID"=>$a["ID"],"email"=>$a["email"],"contact"=>$a["contact"],"rolls"=>$a["Rolls"],"addby"=>$a["AddBy"]);
            $array = json_encode($arr);
        echo "<tr>";
        echo "<td>".$No."</td>";
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
    case 4:
      # code...
      echo "that is wrire track";
      break;
    default:
        echo "Check your page link Connection";
        break;
}
echo '</tbody>
    <tfoot role="alert">
      <tr>
        <td colspan="5"> ....</td>
      </tr>
    </tfoot>
  </table>';
?>
