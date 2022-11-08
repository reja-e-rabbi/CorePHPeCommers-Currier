<?php
session_start();
include_once "../db/dbcon.php";
include_once "/config.php";
$rolls = $_SESSION["rolls"];
$id = $_GET["id"];
$a = json_decode($id, true);  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Info</title>
  </head>
  <link rel="stylesheet" href="../../fram/css/grid.css" />
  <link rel="stylesheet" href="info.css" />
  <body>
    <div class="grid">
      <div class="wall">
        <div class="img">
          <img src="../../img/logo.jpg" alt="img" />
        </div>
        <?php
echo '<div class="name">
<ul>
  <li><b>'.$a["f_name"].' '.$a["l_name"].'</b></li>
  <li><i>'.$a["rolls"].'</i></li>
</ul>
</div>';
        ?>
        
      </div>
      <div class="aside">
        <div class="main-side" id="list">
          <ul class="list">
            <span class="user" >&#9818 <span>USER <span class="point">&#8250</span></span></span>
            <li class="admins"><span>&#9819</span><span class="list-name"> Pyament Info </span> </li>
            <li class="manager"><span>&#9819</span><span class="list-name"> User Info </span> </li>
            <li class="serviceman"><span>&#9819</span><span class="list-name"> Store Location </span> </li>
            <li class="company"><span>&#9819</span><span class="list-name"> Status </span> </li>
            </ul>
          <ul class="list">
            <span class="user" >&#9818 <span>Order <span class="point">&#8250</span></span></span>
            <li class="admins"><span>&#9819</span><span class="list-name"> Panding order </span> </li>
            <li class="admins"><span>&#9819</span><span class="list-name"> Processing order </span> </li>
            <li class="admins"><span>&#9819</span><span class="list-name"> Serviceing order </span> </li>
            <li class="admins"><span>&#9819</span><span class="list-name"> Rejected order </span> </li>
            <li class="admins"><span>&#9819</span><span class="list-name"> Error Order </span> </li>
            <li class="admins"><span>&#9819</span><span class="list-name"> Delete order </span> </li>
          </ul>
        </div>
      </div>
      <div class="flex-col">
        <div class="sm-card">
          <div class="s-card">
            <a href="#" class="s-value">
              <p> Total Income</p>
              <p>325</p>
            </a>
            <a href="#" class="s-value">
              <p>Widthdraw</p>
              <p>325</p>
            </a>
            <a href="#" class="s-value">
              <p>Total order</p>
              <p>325</p>
            </a>
            <a href="#" class="s-value">
              <p>Complan</p>
              <p>325</p>
            </a>
          </div>
        </div>
        <?php
        
echo '<div class="list-info">
<ul>
  <li><b>ID : </b><i>'.$a["ID"].'</i></li>
  <li><b>First Name : </b><i>'.$a["f_name"].'</i></li>
  <li><b>Last Name : </b><i>'.$a["l_name"].'</i></li>
  <li><b>Nick Name : </b><i>'.$a["u_name"].'</i></li>
  <li><b>Email : </b><i>'.$a["email"].'</i></li>
  <li><b>Contact : </b><i>'.$a["contact"].'</i></li>
  <li><b>Add By : </b><i></i>'.$a["addby"].'</li>
  <li><b>Store Location : </b><i></i></li>
  <li><b>Addreses : </b><i></i></li>
</ul>
</div>';
        ?>
        <?php
      echo '<div class="action" data-ID="12345">
          <ul>
            <li><a href="action.php?sl=20 &id= '.$a["ID"].'">Delete</a></li>
            <li><a href="action.php?sl=60 &id= '.$a["ID"].'">Edith</a></li>
            <li><a href="action.php?sl=30 &id= '.urlencode($id).'&action= reject">Reject</a></li>
            <li><a href="action.php?sl=30 &val= '.urlencode($id).'&action= block">Block</a></li>
            <li><a href="action.php?sl=30 &val= '.urlencode($id).'&action= suspend">Suspend</a></li>
            <li><a href="action.php?sl=30 &id= '.urlencode($id).'&action= active">Active</a></li>
          </ul>
        </div>';
        ?>
      </div>
    </div>
    <script src="../../fram/js/script.js"></script>
    <script src="info.js"></script>
  </body>
</html>
