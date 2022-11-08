<?php
session_start();
include_once "../../../config.php";
$get = $_GET["id"];
$arr = json_decode($get, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
#$string = $_GET["string"];
settype($IDS, "integer");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../fram/css/form_one.css" />
</head>
<body>
<?php
    switch ($IDS) {
        case 1:
            
            echo '<form class="form" data-id="1" action="action.php" method="GET">
            <div class="form-group">
              <p>Add Your Location Maximum Time 10 Minits to Submited this Form</p>
            </div>
            <div class="form-group">
                <label for="options">Service Type : </label>
                <select name="id[]" id="busness">
                    <option value="">..Select Any Options</option>
                    <option value="PartTime">Part time</option>
                    <option value="FullTime">Full Time</option>
                </select>
                <p class="busness"></p>
            </div>
            <div class="form-group">
              <label for="id[]">Country : </label>
              <input type="text" name="id[]" placeholder="Bangladesh" id="country" />
              <p class="country"></p>
            </div>
            <div class="form-group">
              <label for="id[]">State/Division : </label>
              <input type="text" name="id[]" placeholder="Dhaka" id="state" />
              <p class="state"></p>
            </div>
            <div class="form-group">
              <label for="id[]">Substate/Sub-Devision : </label>
              <input type="text" name="id[]" id="s-div" placeholder="Narsingdi" />
              <p class="s-div"></p>
            </div>
            <div class="form-group">
              <label for="id[]">U/P : </label>
              <input type="text" name="id[]" id="P-stat" placeholder="Shibpur" />
              <p class="P-stat"></p>
            </div>
            <div class="form-group">
              <label for="id[]">Location : </label>
              <input
                type="text"
                name="id[]"
                id="l-name"
                placeholder="Location,Police Station"
              />
              <p class="l-name"></p>
            </div>
            <div class="form-group">
              <a href="#" class="submit">submited</a>
            </div>
            <div class="form-group">
              <p class="latter">'.$string.'</p>
            </div>
            </form>';
            break;
        
        default:
            echo "check This IDS have any problem";
            break;
    }

?>
    <script src="../../fram/js/script.js"></script>
    <script src="form.js"></script>
</body>
</html>