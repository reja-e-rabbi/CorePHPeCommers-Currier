<?php
session_start();
include_once "../../../config.php";
include_once "../db/dbcon.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Location</title>
    <link rel="stylesheet" href="../admin/main.css" />
    <link rel="stylesheet" href="../../fram/css/table-default.css" />
  </head>
  <body>
    <div id="grid">
      <?php
    include "../admin/header.php";
    include "sidnav.php";
        ?>
  <div class="flex-col">
    <!--<div class="s-card">
      <a href="#" class="s-value">
      <p>Total Location</p>
      <p>325</p>
      </a>
      <a href="#" class="s-value">
        <p>New Location</p>
        <p>325</p>
      </a>
      <a href="#" class="s-value">
        <p>Reject Location</p>
        <p>325</p>
      </a>
      <a href="#" class="s-value">
        <p>Block Location</p>
        <p>325</p>
      </a>
    </div>-->
        <link rel="stylesheet" href="../../fram/css/table-default.css" />
        <div class="s-table">
          <div class="form">
            <div class="form-group">
              <input type="text" placeholder="Dhaka" name="State" id="state" />
              <input
                type="search"
                placeholder="search Location or id"
                name="id[]"
                id="search"
              />
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
          <table class="table-content">
            <caption>
              all insert data
            </caption>
            <thead>
              <tr>
                <th>No</th>
                <th>Location</th>
                <th>N User</th>
                <th>Order</th>
                <th>U/P</th>
                <th>Sub-State</th>
                <th>State</th>
                <th>Country</th>
                <th>DA</th>
                <th>PA</th>
                <th>Add By</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody class="tbody">
              <?php
                  include "location.php";
                ?>
            </tbody>
            <tfoot role="alert">
              <tr>
                <td colspan="12">.......</td>
              </tr>
            </tfoot>
          </table>
          <div class="paging">
            <?php
            $quiry = "select count(*) from location";
            $stmt = $con->prepare($quiry); $stmt->execute();
            $stmt->store_result(); $stmt->bind_result($total); $stmt->fetch();
            $pg = round($total/15, 0, PHP_ROUND_HALF_UP)+2; echo '
            <ul id="ulc">
              '; $ic = 0; echo '
              <li><span>Back</span></li>
              '; for($a=1;$a<$pg;$a++){ echo '
              <li data-id="'.$a.'"><span class="pgn">'.$a.'</span></li>
              '; } echo '
              <li><span>Next</span></li>
              '; echo '
            </ul>
            '; ?>
          </div>
        </div>
        <?php
mysqli_close($con);
?>
      </div>
    </div>
    <script src="../../fram/js/script.js"></script>
    <script src="location.js"></script>
  </body>
</html>
