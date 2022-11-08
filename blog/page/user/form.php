<?php
session_start();
include_once "../../../config.php";
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
$id = $_GET["id"];
switch ($id) {
  case 1:
    if ($_SESSION["rolls"] == "admin") {
      echo '<form class="form" data-id = "1" action="#" method="GET">
      <div class="form-group">
        <p>Add a admin </p>
      </div>
      <div class="form-group">
        <label for="id[]">Frist Name : </label>
        <input type="text" name="id[]" id="f-name" />
        <p class="f-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Last Name : </label>
        <input type="text" name="id[]" id="l-name" />
        <p class="l-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Nick Name : </label>
        <input type="text" name="id[]" id="n-name" />
        <p class="n-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Email : </label>
        <input type="email" name="id[]" id="email" />
        <p class="email"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Phone : </label>
        <input type="number" name="id[]" id="phone" />
        <p class="phone"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Password : </label>
        <input type="text" name="id[]" id="pass" />
        <p class="pass"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Retype Password : </label>
        <input type="text" name="id[]" id="r-pass" />
        <p class="r-pass"></p>
      </div>
      <div class="form-group">
        <p class="errorON"></p>
      </div>
      <div class="form-group">
        <a class="submit" href="#">submit</a>
      </div>
    </form>';
    }
    break;
    case 3:
    if ($_SESSION["rolls"] == "admin") {
      echo '<form class="form" data-id = "3" action="#" method="GET">
      <div class="form-group">
        <p>Add a supplyman </p>
      </div>
      <div class="form-group">
        <label for="id[]">Frist Name : </label>
        <input type="text" name="id[]" id="f-name" />
        <p class="f-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Last Name : </label>
        <input type="text" name="id[]" id="l-name" />
        <p class="l-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Nick Name : </label>
        <input type="text" name="id[]" id="n-name" />
        <p class="n-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Email : </label>
        <input type="email" name="id[]" id="email" />
        <p class="email"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Phone : </label>
        <input type="number" name="id[]" id="phone" />
        <p class="phone"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Password : </label>
        <input type="text" name="id[]" id="pass" />
        <p class="pass"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Retype Password : </label>
        <input type="text" name="id[]" id="r-pass" />
        <p class="r-pass"></p>
      </div>
      <div class="form-group">
        <p class="errorON"></p>
      </div>
      <div class="form-group">
        <a class="submit" href="#">submit</a>
      </div>
    </form>';
    }
    break;

    case 4:
    if ($_SESSION["rolls"] == "admin") {
      echo '<form class="form" data-id = "4" action="#" method="GET">
      <div class="form-group">
        <p>Add a company </p>
      </div>
      <div class="form-group">
        <label for="id[]">Frist Name : </label>
        <input type="text" name="id[]" id="f-name" />
        <p class="f-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Last Name : </label>
        <input type="text" name="id[]" id="l-name" />
        <p class="l-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Nick Name : </label>
        <input type="text" name="id[]" id="n-name" />
        <p class="n-name"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Email : </label>
        <input type="email" name="id[]" id="email" />
        <p class="email"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Phone : </label>
        <input type="number" name="id[]" id="phone" />
        <p class="phone"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Password : </label>
        <input type="text" name="id[]" id="pass" />
        <p class="pass"></p>
      </div>
      <div class="form-group">
        <label for="id[]">Retype Password : </label>
        <input type="text" name="id[]" id="r-pass" />
        <p class="r-pass"></p>
      </div>
      <div class="form-group">
        <p class="errorON"></p>
      </div>
      <div class="form-group">
        <a class="submit" href="#">submit</a>
      </div>
    </form>';
    }
    break;
  default:
    echo "check this code";
    break;
}


    
    
    ?>
    <script src="../../fram/js/script.js"></script>
    <script src="form.js"></script>
  </body>
</html>
