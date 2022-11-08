<?php
session_start();
include_once "../../../config.php";
include_once "../db/dbcon.php";
echo $val = $_GET["val"];
echo $sl = $_GET["sl"];
$jsondc = json_decode($val, true); 
$a = json_decode($val, true);
?>
<?php
  $bytes = random_bytes(5);
  $today = date('Ymd');
  $bytesTohex = bin2hex($bytes).$today;
 ?>
 <?php 
  $FirstName = $jsondc["f_name"];
  $LastName = $jsondc["l_name"];
  $NicName = $jsondc["n_name"];
  $Email = $jsondc["email"];
  $Phone = $jsondc["phone"];
  $Password = $jsondc["pass"];
  $RetypePass = $jsondc["r_pass"];
  $request = $_SESSION["username"];
  $id = $bytesTohex; 
echo '<div class="form-list">
<ul>
  <li><b>Frist Name : </b> <i>'.$FirstName.'</i></li>
  <li><b>Last Name : </b><i>' .$LastName.'</i></li>
  <li><b>Nice Name : </b> <i>'.$NicName.'</i></li>
  <li><b>Email : </b> <i>'.$Email.'</i></li>
  <li><b>Phone : </b> <i>'.$Phone.'</i></li>
  <li><b>Password : </b> <i>'.$Password.'</i></li>
  <li><b>Retype Password : </b> <i>'.$RetypePass.'</i></li>
  <li><b>ID : </b> <i>'.$id.'</i></li>
  <li><b>Add By : </b> <i>'.$request.'</i></li>
</ul>
</div>';

?>
<?php
switch ($sl) {
    case 1 :
        if ( !$_SESSION["rolls"] == "admin") {
            echo "Check your rolls ...";
        } else {
            if ( !$Password == $RetypePass) {
                echo "password not metch";
            }else {
                $quiry = "select email from userlog where email = ?";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('s', $email);
                $stmt-> execute();
                $stmt -> store_result();
                $stmt -> bind_result($email);
                $efrows = $stmt-> num_rows(); 
                if ($efrows != 0) {
                    echo "this email addres ".$email." allready have a accunts";
                }else {
                $quiry = "insert into userlog(FirstName, LastName, UserName, ID, Pass, Rolls, email, contact, AddBy)";
                $quiry .= "values ('{$FirstName}', '{$LastName}', '{$NicName}', '{$id}', '{$Password}', 'admin', '{$Email}', '{$Phone}', '{$request}')";
                $input = mysqli_query($con, $quiry);
                header('location: /blog/page/user/user_check.php?id='.$id);
                }
            }
        }
        break;
        case 2 :
        if ( !$_SESSION["rolls"] == "admin") {
            echo "Check your rolls ...";
        } else {
            if ( !$Password == $RetypePass) {
                echo "password not metch";
            }else {
                $quiry = "select email from userlog where email = ?";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('s', $email);
                $stmt-> execute();
                $stmt -> store_result();
                $stmt -> bind_result($email);
                $efrows = $stmt-> num_rows(); 
                if ($efrows != 0) {
                    echo "this email addres ".$email." allready have a accunts";
                }else {
                $quiry = "insert into userlog(FirstName, LastName, UserName, ID, Pass, Rolls, email, contact, AddBy)";
                $quiry .= "values ('{$FirstName}', '{$LastName}', '{$NicName}', '{$id}', '{$Password}', 'manager', '{$Email}', '{$Phone}', '{$request}')";
                $input = mysqli_query($con, $quiry);
                header('location: /blog/page/user/user_check.php?id='.$id);
                }
            }
        }
        break;
        case 3 :
        if ( !$_SESSION["rolls"] == "admin") {
            echo "Check your rolls ...";
        } else {
            if ( !$Password == $RetypePass) {
                echo "password not metch";
            }else {
                $quiry = "select email from userlog where email = ?";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('s', $email);
                $stmt-> execute();
                $stmt -> store_result();
                $stmt -> bind_result($email);
                $efrows = $stmt-> num_rows(); 
                if ($efrows != 0) {
                    echo "this email addres ".$email." allready have a accunts";
                }else {
                $quiry = "insert into userlog(FirstName, LastName, UserName, ID, Pass, Rolls, email, contact, AddBy)";
                $quiry .= "values ('{$FirstName}', '{$LastName}', '{$NicName}', '{$id}', '{$Password}', 'supplyman', '{$Email}', '{$Phone}', '{$request}')";
                $input = mysqli_query($con, $quiry);
                header('location: /blog/page/user/user_check.php?id='.$id);
                }
            }
        }
        break;

        case 4 :
        if ( !$_SESSION["rolls"] == "admin") {
            echo "Check your rolls ...";
        } else {
            if ( !$Password == $RetypePass) {
                echo "password not metch";
            }else {
                $quiry = "select email from userlog where email = ?";
                $stmt = $con->prepare($quiry);
                $stmt->bind_param('s', $email);
                $stmt-> execute();
                $stmt -> store_result();
                $stmt -> bind_result($email);
                $efrows = $stmt-> num_rows(); 
                if ($efrows != 0) {
                    echo "this email addres ".$email." allready have a accunts";
                }else {
                $quiry = "insert into userlog(FirstName, LastName, UserName, ID, Pass, Rolls, email, contact, AddBy)";
                $quiry .= "values ('{$FirstName}', '{$LastName}', '{$NicName}', '{$id}', '{$Password}', 'company', '{$Email}', '{$Phone}', '{$request}')";
                $input = mysqli_query($con, $quiry);
                header('location: /blog/page/user/user_check.php?id='.$id);
                }
            }
        }
        break;
        case 20:
            # code...
            if ( !$_SESSION["rolls"] == "admin") {
                echo "Check your rolls ...";
            } else {
                $id = $_GET["id"];
                /*$quiry = 'delete from userlog where ID = ? limit 1';
                $stmt = $con->prepare($quiry);
                $stmt->bind_param("s", $id);
                $stmt->execute();
                echo '<p>Total effected Row is '.$stmt->affected_rows .'</p>'; */
                echo '<p> This service have not avalable</p>';
            }
            break;
        case 30:
            if ($rolls = "admin") {
              $quiry = "update userlog set activity = ? where ID = ? limit 1 ";
              $stmt = $con->prepare($quiry);
              $stmt -> bind_param('ss', $_REQUEST["action"], $a["ID"]);
              $stmt -> execute(); 
              $succes = $stmt -> affected_rows;
              if ( $succes != 0) {
                  echo '</p>This User Is Now '.$_REQUEST["action"].'</p>';
              } else {
                echo '</p>Quiry faild to '.$_REQUEST["action"].'</p>';
              }
            } else {
               echo '<p> check your rolls</p>';
            }
              break;
    default:
        echo '<p>check your connection</p>';
        break;
}
mysqli_close($con);
?>
