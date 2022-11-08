
<?php
session_start();
include_once "../db/dbcon.php";
$req_email = $_REQUEST['email'];
$req_pass = $_REQUEST['password'];
$quiry = "select  FirstName, LastName, UserName, ID, Pass, Rolls, email, contact, BirthDate, JoinDate, AddBy, activity, State, SubState, P_state, onLocation, selectType from userlog  where email = ? and Pass = ? limit 1";
$stmt = $con -> prepare($quiry);
$stmt -> bind_param('ss', $req_email,$req_pass);
$stmt ->execute();
$stmt -> store_result();
$stmt -> bind_result($frist_name, $last_name, $UserName, $ID, $Pass, $Rolls, $email, $contact,$BirthDate,$JoinDate,$AddBy,$activity,$State,$SubState,$P_state,$onLocation, $selectType);
$stmt -> fetch();
$arrIn = array("f_name"=> $frist_name, "l_name"=> $last_name, "u_name"=> $UserName, "id"=> $ID, "rolls"=> $Rolls, "email"=> $email, "contact"=> $contact, "birth"=> $BirthDate, "j_date"=>$JoinDate, "addby"=> $AddBy, "state"=>$State, "s_state"=>$SubState, "P_state"=>$P_state, "location"=> $onLocation, "pass"=>$Pass, "com_type"=>$selectType);
$all = json_encode($arrIn);
$_SESSION["all"] = $all;
$bta = base64_encode($all);

if (($req_email == $email) and ($req_pass == $Pass)) {
    switch ($Rolls) {
        case 'admin':
            $_SESSION["name"] =$frist_name;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $Pass;
            $_SESSION["username"] = $UserName;
            $_SESSION["ID"] = $ID;
            $_SESSION["contact"] = $contact;
            $_SESSION["rolls"] = $Rolls;
            if (($_SESSION["name"]) or ($_SESSION["email"]) or ($_SESSION["password"]) or ($_SESSION["username"]) or ($_SESSION["ID"]) or ($_SESSION["contact"]) or ($_SESSION["rolls"]) != null) {
                    $pss = password_hash($Pass,PASSWORD_DEFAULT);
                    $arrIn = array("f_name"=> $frist_name, "l_name"=> $last_name, "u_name"=> $UserName, "id"=> $ID, "rolls"=> $Rolls, "email"=> $email, "contact"=> $contact, "birth"=> $BirthDate, "j_date"=>$JoinDate, "addby"=> $AddBy, "state"=>$State, "s_state"=>$SubState, "P_state"=>$P_state, "location"=> $onLocation, "pass"=>$pss, "com_type"=>$selectType);
                    $all = json_encode($arrIn);
                    $bta = base64_encode($all);
                    setcookie("all",$bta,time()+60*60*24*7,"/");
                redirect_to("/blog/page/admin/index.php");
                echo "this session is write tag"."<br>";
                echo $_SESSION["name"];
            }else {
                echo "this session not work";
            } 
            
            break;
        case 'company':
        $_SESSION["name"] =$frist_name;
        $_SESSION["email"] = $email;
        $_SESSION["password"] = $Pass;
        $_SESSION["username"] = $UserName;
        $_SESSION["ID"] = $ID;
        $_SESSION["contact"] = $contact;
        $_SESSION["rolls"] = $Rolls;
        $_SESSION["activity"] = $activity;
        if ($_SESSION["activity"] === 'block') {
            echo "youre ID hasbeen Blocked contact to office to get sugetions";
        }elseif ($_SESSION["activity"] === 'reject') {
            echo 'you are rejected contact to office to get sugetions';
        }elseif ($_SESSION["activity"] === 'suspend') {
            echo 'you are suspended contact to office to get sugetions';
        }elseif ($_SESSION["activity"] === 'active') {
            if (($State || $SubState || $P_state || $onLocation) == null) {
                $arr = array("IDS"=> 1, "DBS"=> 'update', "OPS"=> 'unknow', "pass"=>$Pass);
                $id = json_encode($arr);
                header("location: /blog/page/company/form.php?id=".urlencode($id));
            } else {
                if (($_SESSION["name"]) or ($_SESSION["email"]) or ($_SESSION["password"]) or ($_SESSION["username"]) or ($_SESSION["ID"]) or ($_SESSION["contact"]) or ($_SESSION["rolls"]) != null) {
                    $pss = password_hash($Pass,PASSWORD_DEFAULT);
                    $arrIn = array("f_name"=> $frist_name, "l_name"=> $last_name, "u_name"=> $UserName, "id"=> $ID, "rolls"=> $Rolls, "email"=> $email, "contact"=> $contact, "birth"=> $BirthDate, "j_date"=>$JoinDate, "addby"=> $AddBy, "state"=>$State, "s_state"=>$SubState, "P_state"=>$P_state, "location"=> $onLocation, "pass"=>$pss, "com_type"=>$selectType);
                    $all = json_encode($arrIn);
                    $bta = base64_encode($all);
                    setcookie("all",$bta,time()+60*60*24*7,"/");
                    $arr = array("IDS"=> 1, "DBS"=> 'select', "OPS"=> 'unknow', "ID"=> $_SESSION["ID"]);
                    $id = json_encode($arr);
                    setcookie("all",$all,time()+60*60*24*7,"/");
                    redirect_to("/blog/page/company/index.php?id=".urlencode($id));
                    echo "this session is write tag"."<br>";
                    echo $_SESSION["name"];
                }else {
                    echo "this session not work";
                }
                echo "that is write track";
            }
        }else {
            echo "check which type of ID it is contact to admin";

        }
            break;
            case 'supplyman':
                $_SESSION["name"] =$frist_name;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $Pass;
                $_SESSION["username"] = $UserName;
                $_SESSION["ID"] = $ID;
                $_SESSION["contact"] = $contact;
                $_SESSION["rolls"] = $Rolls;
                $_SESSION["activity"] = $activity;
                if ($_SESSION["activity"] === 'block') {
                    echo "youre ID hasbeen Blocked contact to office to get sugetions";
                }elseif ($_SESSION["activity"] === 'reject') {
                    echo 'you are rejected contact to office to get sugetions';
                }elseif ($_SESSION["activity"] === 'suspend') {
                    echo 'you are suspended contact to office to get sugetions';
                }elseif ($_SESSION["activity"] === 'active') {
                    if (($State || $SubState || $P_state || $onLocation) == null) {
                        $arr = array("IDS"=> 1, "DBS"=> 'update', "OPS"=> 'unknow', "pass"=>$Pass);
                        $id = json_encode($arr);
                        header("location: /blog/page/supplyman/form.php?id=".urlencode($id));
                    } else {
                        if (($_SESSION["name"]) or ($_SESSION["email"]) or ($_SESSION["password"]) or ($_SESSION["username"]) or ($_SESSION["ID"]) or ($_SESSION["contact"]) or ($_SESSION["rolls"]) != null) {
                            $pss = password_hash($Pass,PASSWORD_DEFAULT);
                            $arrIn = array("f_name"=> $frist_name, "l_name"=> $last_name, "u_name"=> $UserName, "id"=> $ID, "rolls"=> $Rolls, "email"=> $email, "contact"=> $contact, "birth"=> $BirthDate, "j_date"=>$JoinDate, "addby"=> $AddBy, "state"=>$State, "s_state"=>$SubState, "P_state"=>$P_state, "location"=> $onLocation, "pass"=>$pss, "com_type"=>$selectType);
                            $all = json_encode($arrIn);
                            $bta = base64_encode($all);
                            setcookie("all",$bta,time()+60*60*24*7,"/");
                            $arr = array("IDS"=> 1, "DBS"=> 'select', "OPS"=> 'unknow', "ID"=> $_SESSION["ID"]);
                            $id = json_encode($arr);
                            redirect_to("/blog/page/supplyman/index.php?id=".urlencode($id));
                            echo "this session is write tag"."<br>";
                            echo $_SESSION["name"];
                        }else {
                            echo "this session not work";
                        }
                        echo "that is write track";
                    }
                }else {
                    echo "check which type of ID it is contact to admin";
        
                }
                    break;
        default:
            echo 'You are not identyfy';
            break;
    }
    
} else {
    echo "<p>The password and Email not match try agane</p>";
} 

?>
<?php

/*$em = $con->real_escape_string($_REQUEST["email"]);
$ps = $con->real_escape_string($_REQUEST["password"]);
$script = "select FirstName, LastName,UserName, ID, Pass, Rolls, email, contact from userlog where email = '$em' and Pass = '$ps' limit 1";
$quiry = mysqli_query($con, $script);
 while ($a = mysqli_fetch_assoc($quiry)) {
   echo $req_pass = $a["Pass"];
   echo $req_email = $a["email"];
   echo $frist_name = $a["FirstName"];
   echo $last_name = $a["LastName"];
    $username = $a["UserName"];
    $id = $a["ID"];
    $contact = $a["contact"];
    $rolls = $a["Rolls"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $array = array( "Email" => $email, "FristName" => $frist_name, "LastName" => $last_name, "UserName" => $username , "ID" => $id, "Contact" => $contact, "Rolls" => $rolls);
    $json = json_encode($array);
    $time = time()+60*60*24*1;
    $path = "/"; 
    
    if (($_POST["email"] == $req_email) and ($_POST["password"] == $req_pass)) {
        
        if ($rolls == "admin") {
            echo ". you are admin";
            $_SESSION["name"] =$frist_name;
            $_SESSION["email"] = $req_email;
            $_SESSION["password"] = $req_pass;
            $_SESSION["username"] = $username;
            $_SESSION["ID"] = $id;
            $_SESSION["contact"] = $contact;
            $_SESSION["rolls"] = $rolls;
            echo "status ok";
              redirect_to("/admins.php");
            
        }else {
            $user_2 = $a["Rolls"];
            switch ($user_2) {
                case 'company':
                    echo "youre have a company";
                    $_SESSION["name"] =$frist_name;
                    $_SESSION["email"] = $req_email;
                    $_SESSION["password"] = $req_pass;
                    $_SESSION["username"] = $username;
                    $_SESSION["ID"] = $id;
                    $_SESSION["contact"] = $contact;
                    $_SESSION["rolls"] = $rolls;
                    
                     redirect_to("/view/user/company/index.php");
                    
                    break;
                case 'supplyman':
                    echo "are you supply man";
                    $_SESSION["name"] =$frist_name;
                    $_SESSION["email"] = $req_email;
                    $_SESSION["password"] = $req_pass;
                    $_SESSION["username"] = $username;
                    $_SESSION["ID"] = $id;
                    $_SESSION["contact"] = $contact;
                    $_SESSION["rolls"] = $rolls;
                   
                       redirect_to("/view/user/supplyman/index.php");
                    
                    break;
                default:
                    echo "something wrong";
                    break;
            }
        }
        
    } else {
        echo "<p>The password and Email not match try agane</p>";
    } 
 }
*/
function redirect_to($new_location){
    header("location:".$new_location);
} 
?>
<?php // mysqli_free_result($quiry_log_main); ?>
<?php   mysqli_close($con); ?>
<a href="login.php">back</a>