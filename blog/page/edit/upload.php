<?php
session_start();
include_once "../../../config.php";
$json = $_GET["id"];
$arr = json_decode($json, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
//echo "<script type='text/javascript > localStorage.getItem('productInfo') </script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload images</title>
    <link rel="stylesheet" href="../../fram/css/form_one.css">
</head>
<body>
<?php
    switch ($EOPS) {
		case 'product':
			echo '<form  method="POST" action="action.php?id='.urlencode($json).'" data-id="2" class="form" enctype="multipart/form-data">
                <div class="form-group">
                    <p>Check each of the value perfectly maximum time 15 minutes</p>
                </div>
                <div class="form-group">
                    <label for="upload">Upload image :</label>
                    <input type="file" name="image" multiple id="images">
                    <p>Each of the image size is 100KB</p>
				</div>
				<div class="form-group">
                    <p><a href="../compress/index.html" target="_blank">Frist resize image then upload ... click here</a></p>
                </div>
                <div class = "form-group">
                    <input type="submit" name="submit" value="Submit" />
                </div>
            </form>'; 
			break;
		
		default:
			echo 'check perfect eops';
			break;
	}
        ?>
</body>
</html>