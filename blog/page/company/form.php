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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company Form</title>
    <link rel="stylesheet" href="../../fram/css/form_one.css" />
    
  </head>
  <body>
<?php

    switch ($IDS) {
      case 1:
            
        echo '<form class="form" data-id="1" action="action.php" method="GET">
        <div class="form-group">
          <p>Add Your Location Maximum Time 10 Minutes to Submited this Form</p>
        </div>
        <div class="form-group">
          <label for="options">Business Type : </label>
          <select name="id[]" id="busness">
            <option value="">..Select Any Options</option>
            <option value="restaurent">Restaurent</option>
            <option value="library">Library</option>
            <option value="groceries">Groceries</option>
            <option value="home decoration">Home Decoration</option>
            <option value="cosmatic">Cosmatic</option>
            <option value="fashion">Fashion</option>
            <option value="agro">Agro</option>
            <option value="sports and fitness">Sports & Fitness</option>
            <option value="electronics">Electronics</option>
            <option value="medicine">Medicine</option>
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
          <input type="text" name="id[]" id="l-name" placeholder="Location,Police Station"/>
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
      case 2: //action.php?id='.urlencode($get).'
          echo '<form action="#" data-id="2" class="form" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <p>Check each of the value perfectly, maximum time 15 minutes</p>
            </div>
            <div class = "form-group">
              <label for="product-name">Product Name :</label>
              <input type="text" name="id[]" id="product-name" placeholder="product Name">
            </div>
            <div class = "form-group">
              <label for="product-name">Quantity :</label>
              <input type="number" name="id[]" id="quantity" placeholder="200">
            </div>
            
            ';
            $all = json_decode($_SESSION["all"],true);
            switch ($all["com_type"]) {
              case 'restaurent':
                echo '<div class="form-group">
                    <label for="category">Category :</label>
                    <select name="id[]" id="category">
                      <option value="Coffee and Tea">Coffee & Tea </option>
                      <option value="Chicken">Chicken Recipy</option>
                      <option value="marton">Mutton Recipy</option>
                      <option value="Beef">Beef Recipy</option>
                      <option value="fish">Fish Recipy</option>
                      <option value="vegetable">Vegetable Recipy</option>
                      <option value="others">Others</option>
                    </select>
                  </div>';
                break;
                case 'library':
                  echo '<div class="form-group">
                      <label for="category">Category :</label>
                      <select name="id[]" id="category">
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
                        <select name="id[]" id="category">
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
                          <select name="id[]" id="category">
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
                          <select name="id[]" id="category">
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
                          <select name="id[]" id="category">
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
                          <select name="id[]" id="category">
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
                            <select name="id[]" id="category">
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
                              <select name="id[]" id="category">
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
                              <select name="id[]" id="category">
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
              <input type="text" name="id[]" id="sub-category" placeholder="Item Name">
            </div>
         <div class = "form-group">
              <label for="product-name">Price :</label>
              <input type="number" name="id[]" id="price">
         </div>
         <div class = "form-group">
              <label for="product-name">Discount % (Optional) :</label>
              <input type="number" name="id[]" id="discount" placeholder="40">
         </div>
         <div class = "form-group">
           <p class="letter"></p>
         </div>
         <div class = "form-group">
              <a class="submit">Next</a>
         </div>
          </form>'; 
          break;
      default:
            echo "check your options";
            break;
    }

?>
    <script src="../../fram/js/script.js"></script>
    <script src="form.js"></script>
  </body>
</html>