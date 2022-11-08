<?php
session_start();
include_once "../../../config.php";
$country = 'Bangladesh';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add user</title>
    <link rel="stylesheet" href="../../fram/css/grid.css" />
    <link rel="stylesheet" href="../../fram/css/form_one.css" />
  </head>
  <body>
      <?php
      if ($country == 'Bangladesh') {
echo '<form class="form" data-id="1" action="action.php" method="POST">
<div class="form-group">
  <p>Add a Location</p>
</div>
<div class="form-group">
  <label for="id[]">Location : </label>
  <input
    type="text"
    name="id[]"
    id="f-name"
    placeholder="Location,Police Station"
  />
  <p class="f-name"></p>
</div>
<div class="form-group">
  <label for="Substate">City :</label>
  <select name="id[]" id="id">
    <option value="Narsingdi">Narshingdi</option>
    <option value="Gazipur">Gazipur</option>
    <option value="Naringang">Naringang</option>
    <option value="Tangail">Tangail</option>
  </select>
</div>
<div class="form-group">
  <label for="Substate">State :</label>
  <select name="id[]" id="id">
    <option value="Dhaka">Dhaka</option>
    <option value="Rajshahi">Rajshahi</option>
    <option value="Rongpur">Rongpur</option>
    <option value="Sylet">Sylet</option>
  </select>
</div>
<div class="form-group">
  <label for="id[]">U/P : </label>
  <input
    type="text"
    name="id[]"
    id="f-name"
    placeholder="Location,Police Station"
  />
  <p class="f-name"></p>
</div>
<div class="form-group">
  <label for="range">Range :</label>
  <select name="id[]" id="rang">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select>
</div>
<div class="form-group">
    <input type="submit" value="submit">
</div>
<div class="form-group">
    <p>Check : '.$_GET["id"].'</p>
</div>
</form>';
      }

      ?>
    <script src="../../fram/js/script.js"></script>
  </body>
</html>
