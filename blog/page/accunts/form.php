<?php
session_start();
include_once "../../../config.php";
$IDS = $_GET["id"];
$string = $_GET["string"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Capitals</title>
    <link rel="stylesheet" href="../../fram/css/form_one.css" />
  </head>
  <body>
      <?php
      switch ($IDS) {
          case 1:
              # code...
              echo '<form action="#" class="form" data-id="1">
              <div class="form-group">
                <label for="budget">Budget Amounts :</label>
                <input type="number" name="id[]" id="budget" />
                <p class="budget"></p>
              </div>
              <div class="form-group">
                <label for="Inbester">Inbester Name :</label>
                <input type="text" name="id[]" id="inbester" />
                <p class="inbester"></p>
              </div>
              <div class="form-group">
                <label for="Inbester">AC :</label>
                <input type="text" name="id[]" id="AcInfo" />
                <p class="AcInfo"></p>
              </div>
              <div class="form-group">
                <label for="Inbester">comments :</label>
                <textarea name="id[]" id="comments" cols="30" rows="10"></textarea>
                <p class="comments"></p>
              </div>
              <div class="form-group">
                <a href="#" class="submit">Submit</a>
              </div>
              <div class="form-group">
              <p class="info">'.$string.'</p>
              </div>
              </form>';
              break;
          
          default:
              # code...
              echo "Check Data ID value";
              break;
      }
      ?>
    <script src="../../fram/js/script.js"></script>
    <script src="form.js"></script>
  </body>
</html>
