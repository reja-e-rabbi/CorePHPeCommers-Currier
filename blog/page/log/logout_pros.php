<?php
session_start();
if (($_SESSION["pass"] or $_SESSION["email"] or $_SESSION["name"] or $_SESSION["username"]) != null or "") {
    setcookie("all",'',time(),"/");
    header("location: /blog/page/log/login.php");
    session_destroy();
}else {
    setcookie("all",'',time(),"/");
    session_destroy();
    header("location: /index.php");
}
?>
