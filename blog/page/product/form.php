<?php
session_start();
$get = $_GET["id"];
$arr = json_decode($get, true);
$IDS = $arr["IDS"];
$DBS = $arr["DBS"];
$OPS = $arr["OPS"];
$SOPS = $arr["SOPS"];
$EOPS = $arr["EOPS"];
$allarr = $_SESSION["all"];
include_once "../db/mainDB.php";
$cul = "SL,img,proname,quantity,price,info,category,subcategory,uploader,email,location, views,localinfo,facbook,contact,totalview,totalsels,totalmoney,shopName,dates,productID,statuses,country,State,SubState,P_state,Activity,DA,coID";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo '<title>'.$IDS.' Product</title>'; ?>
    <link rel="stylesheet" href="../../fram/css/form_one.css">
</head>
<body>
    <?php
    $quiry = "select ".$cul." from product where productID = ? ";
    $stmt = $con->prepare($quiry);
    $stmt->bind_param('s',$EOPS);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($SL,$img,$proName,$quantity,$price,$info,$category,$subcategory,$uploader,$email,$location, $views,$localinfo,$facebook,$contact,$totlaview,$totalsels,$totlamoney,$ShopName,$dates,$productID,$statuses,$country,$state,$substate,$P_state,$activity,$DA,$coID);
    $stmt->fetch();
    echo '<form action="action.php?id='.urlencode($get).'" data-id="2" class="form" enctype="multipart/form-data" method="POST">
        <div class="form-group">
          <p>Check each of the value perfectly, maximum time 15 minutes</p>
        </div>
        <div class = "form-group">
          <label for="login Password">Login Password :</label>
          <input type="password" name="did[]" id="password" placeholder="xxxxxxxxxxxx" required>
        </div>
        <div class = "form-group">
          <label for="product-name">Product Name :</label>
          <input type="text" name="did[]" id="product-name" value="'.$proName.'" required>
        </div>
        <div class = "form-group">
          <label for="product-name">Quantity :</label>
          <input type="number" name="did[]" id="quantity" value="'.$quantity.'" required>
        </div>
        
        ';
        $all = json_decode($_COOKIE["all"],true);
        switch ($all["com_type"]) {
          case 'restaurent':
            echo '<div class="form-group">
                <label for="category">Category :</label>
                <select name="did[]" id="category">
                  <option value="'.$category.'">"'.$category.'" </option>
                  <option value="Coffee and Tea">Coffee & Tea </option>
                  <option value="Chicken recipy">Chicken Recipy</option>
                  <option value="marton recipy">Mutton Recipy</option>
                  <option value="Beef recipy">Beef Recipy</option>
                  <option value="fish recipy">Fish Recipy</option>
                  <option value="vegetable recipy">Vegetable Recipy</option>
                  <option value="drinks">drinks</option>
                  <option value="others">Others</option>
                </select>
              </div>';
            break;
            case 'library':
              echo '<div class="form-group">
                  <label for="category">Category :</label>
                  <select name="did[]" id="category">
                    <option value="'.$category.'">"'.$category.'" </option>
                    <option value="ssc">SSC</option>
                    <option value="hsc">HSC</option>
                    <option value="school">School </option>
                    <option value="Primary">Primary </option>
                    <option value="honors">Honours</option>
                    <option value="masters">Masters</option>
                    <option value="engineering">Engineering </option>
                    <option value="medical">Medical</option>
                    <option value="degree">Degree</option>
                    <option value="others">Others</option>
                  </select>
                </div>';
              break;
              case 'groceries':
                echo '<div class="form-group">
                    <label for="category">Category :</label>
                    <select name="did[]" id="category">
                      <option value="'.$category.'">"'.$category.'" </option>
                      <option value="ice cream">Ice Cream</option>
                      <option value="bakery">Bakery</option>
                      <option value="drinks">Drinks </option>
                      <option value="flour">Flours </option>
                      <option value="vegetable">Vegetables</option>
                      <option value="fruits">Fruits</option>
                      <option value="others">Others</option>
                    </select>
                  </div>';
                break;
                case 'home decoration':
                  echo '<div class="form-group">
                      <label for="category">Category :</label>
                      <select name="did[]" id="category">
                        <option value="'.$category.'">"'.$category.'" </option>
                        <option value="kitchen and dining">Kitchen and Dining</option>
                        <option value="home applies">Home Appliance</option>
                        <option value="gardening">Gardening </option>
                        <option value="furneture">Furniture </option>
                        <option value="others">Others</option>
                      </select>
                    </div>';
                  break;
                case 'cosmatic':
                  echo '<div class="form-group">
                    <label for="category">Category :</label>
                      <select name="did[]" id="category">
                        <option value="'.$category.'">"'.$category.'" </option>
                        <option value="perfume">Perfume</option>
                        <option value="skin care">Skin Care</option>
                        <option value="oil">Oil</option>
                        <option value="metal">Metal</option>
                        <option value="cloth">Cloth</option>
                        <option value="others">Others</option>
                      </select>
                    </div>';
                  break;
                case 'fashion':
                  echo '<div class="form-group">
                    <label for="category">Category :</label>
                      <select name="did[]" id="category">
                        <option value="'.$category.'">"'.$category.'" </option>
                        <option value="boys fashion">Men\'s Fashion</option>
                        <option value="girls fashion">Ladies Fashion</option>
                        <option value="kids fashion">Kids Fashion</option>
                        <option value="others">Others</option>
                      </select>
                    </div>';
                  break;
                case 'agro':
                  echo '<div class="form-group">
                    <label for="category">Category :</label>
                      <select name="did[]" id="category">
                        <option value="'.$category.'">"'.$category.'" </option>
                        <option value="farming">Farming</option>
                        <option value="fertilizer">Fertilizer</option>
                        <option value="nursery">Nursery</option>
                        <option value="others">Others</option>
                      </select>
                      </div>';
                    break;
                case 'sports and fitness':
                      echo '<div class="form-group">
                        <label for="category">Category :</label>
                        <select name="did[]" id="category">
                          <option value="'.$category.'">"'.$category.'" </option>
                          <option value="equipment">Equipment</option>
                          <option value="jersey">Jersey</option>
                          <option value="fitness accessories">Fitness Accessories</option>
                          <option value="supplement">Supplement</option>
                          <option value="others">Others</option>
                        </select>
                      </div>';
                      break;
                case 'electronics':
                      echo '<div class="form-group">
                        <label for="category">Category :</label>
                          <select name="did[]" id="category">
                            <option value="'.$category.'">"'.$category.'" </option>
                            <option value="computer and accessories">Computer and Accessories</option>
                            <option value="mobile and accessories">Mobile and Accessories</option>
                            <option value="speaker and headphone">Speaker and Headphone</option>
                            <option value="security and surveillance">Security and Surveillance</option>
                            <option value="hardware">Hardware</option>
                            <option value="others">Others</option>
                          </select>
                      </div>';
                      break;
                case 'medicine':
                      echo '<div class="form-group">
                        <label for="category">Category :</label>
                          <select name="did[]" id="category">
                              <option value="'.$category.'">"'.$category.'" </option>
                              <option value="human medicine">Human Medicine</option>
                              <option value="veterinary medicine">Veterinary Medicine</option>
                              <option value="medical accessories">Medical Accessories</option>
                              <option value="others">Others</option>
                          </select>
                      </div>';
                      break;
          default:
            echo 'select option not work';
            break;
        }
   echo '<div class="form-group">
          <label for="sub-category">Sub-Category :</label>
          <input type="text" name="did[]" id="sub-category" value="'.$subcategory.'" required >
        </div>
     <div class = "form-group">
          <label for="product-name">Price :</label>
          <input type="number" name="did[]" id="price" value='.$price.' required>
     </div>
     <div class = "form-group">
          <label for="product-name">Discount (Optional) :</label>
          <input type="number" name="did[]" id="discount" min= 1 max = 90 placeholder = 40 >
     </div>
     <div class = "form-group">
       <p class="letter"></p>
     </div>
     <div class = "form-group">
       <input type="submit" value="submit">
          <!--<a class="submit">Next</a>-->
     </div>
      </form>';
    ?>
</body>
</html>
<?php
mysqli_close($con);
?>