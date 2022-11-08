<?php
session_start();
include_once "../../../config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User</title>
    <link rel="stylesheet" href="../admin/main.css" />
  </head>
  <body>
    <div id="grid">
      <?php include "../admin/header.php"; include "sidnav.php"; ?>
      <div class="flex-col">
      <div class="s-card">
  <a href="#" class="s-value">
    <p>Admins</p>
    <p>325</p>
  </a>
  <a href="#" class="s-value">
    <p>Manager</p>
    <p>325</p>
  </a>
  <a href="#" class="s-value">
    <p>Service man</p>
    <p>325</p>
  </a>
  <a href="#" class="s-value">
    <p>Company</p>
    <p>325</p>
  </a>
</div>

<link rel="stylesheet" href="../../fram/css/table-default.css" />
<div class="s-table">
  <div class="form">
  <div class="form-group">
              <input type="text" placeholder="Dhaka" name="State" id="state" />
              <input
                type="search"
                placeholder="Name or id or email or phone"
                name="id[]"
                id="search"
              />
              <input type="submit" class="submit" value="submit" />
            </div>
  </div>
  <div class="table">
  <table>
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
    <tbody class="tbody">
      <?php
include "user.php";
      ?>
    </tbody>
    <tfoot role="alert">
      <tr>
        <td colspan="3">dcb edfcb</td>
      </tr>
    </tfoot>
  </table>
 
  
</div>
      </div>
    </div>
    <script src="../../fram/js/script.js"></script>
    <script src="user.js"></script>
  </body>
</html>
