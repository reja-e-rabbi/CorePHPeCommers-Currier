<div class="aside sninfo">
  <div class="main-side" id="list">
    <ul class="list">
      <span>&#9818</span
      >Company area <span class="point">&#8250</span>
      <?php
        $arr = array("IDS"=> 2, "DBS"=> 'insert', "OPS"=> $cType);
        $id = json_encode($arr);
      
    echo '<li class="about"><span>&#9752</span><span class="list-name"> <a href="index.php?id='.urlencode($id).'">Home</a> </span></li>
      <li class="about"><span>&#9752</span><span class="list-name"> Accounts</span></li>
      <li class="about"><span>&#9752</span><span class="list-name"> Profile</span></li>
      <li class="about"><span>&#9752</span><span class="list-name"> About</span></li>
      <li class="about"><span>&#9752</span><span class="list-name"> Notice</span></li>
      <li class="about"><span>&#9752</span><span class="list-name"> Complane</span></li>
      <li><a href="../compress/index.html?id='.urlencode($id).'" target="_blank"><span>&#9882</span>Image compress</a></li>
      <li><a href="form.php?id='.urlencode($id).'" target="_blank"><span>&#9882</span>Upload</a></li>
      
      ';
    ?>
    </ul>
    <ul class="list">
      <span>&#9818</span
      >Order <span class="point">&#8250</span>
      <li ><span>&#9752</span><span class="list-name ord" data-id="pending"> Pending</span></li>
      <li class="about"><span>&#9752</span><span class="list-name ord" data-id="processing"> Processing</span></li>
      <li class="about"><span>&#9752</span><span class="list-name ord" data-id="ride"> Ride</span></li>
      <li class="about"><span>&#9752</span><span class="list-name ord" data-id="complete"> Complete</span></li>
      <li class="about"><span>&#9752</span><span class="list-name ord" data-id="error"> Error</span></li>
    </ul>
    <ul class="list">
      <span>&#9818</span class = "tog"
      >About Product <span class="point about">&#8250</span>
      <li class=" tog"><span>&#9752</span><span class="list-name about-pro " data-id="active"> Active</span></li>
      <li class="tog"><span>&#9752</span><span class="list-name about-pro" data-id="stock out"> Stock Out</span></li>
      <li class="tog"><span>&#9752</span><span class="list-name about-pro" data-id="service off"> Service Off</span></li>
      <li class="tog"><span>&#9752</span><span class="list-name about-pro" data-id="rejected"> Rejected</span></li>
    </ul>
<?php
/*
switch ($cType) {
  case 'restaurent':
  $arr = array("IDS"=> 2, "DBS"=> 'insert', "OPS"=> 'restaurent');
  $id = json_encode($arr);
    echo '<ul class="list">
    <span>&#9874</span
    >Product <span class="point">&#8250</span>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Coffee & Tea</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Fish Recipe</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Mutton Recipe</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Beef Recipe</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Chiken Recipe</a>
    </li>
    
  </ul>';
    break;
  case 'library':
    echo '<ul class="list">
    <span>&#9874</span
    >Books <span class="point">&#8250</span>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Primary</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>School</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>SSC</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>HSC</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Honours</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Masters</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Degree</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Deploma</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Engineering</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>M.B.B.S</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Islamic</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Story</a>
    </li>
    <li>
      <a href="#" target="blank"><span>&#9882</span>Others</a>
    </li>
  </ul>';
    break;
    case 'groceries':
      echo '<ul class="list">
      <span>&#9874</span
      > Groceries <span class="point">&#8250</span>
      <li>
        <a href="#" target="blank"><span>&#9882</span>Cake</a>
      </li>
      <li>
        <a href="#" target="blank"><span>&#9882</span>Biscuits</a>
      </li>
      <li>
        <a href="#" target="blank"><span>&#9882</span>Cookies</a>
      </li>
      <li>
        <a href="#" target="blank"><span>&#9882</span>Chocolate</a>
      </li>
      <li>
        <a href="#" target="blank"><span>&#9882</span>Ice-Cream</a>
      </li>
      <li>
        <a href="#" target="blank"><span>&#9882</span>Flours</a>
      </li>
      <li>
        <a href="#" target="blank"><span>&#9882</span>Others</a>
      </li>
    </ul>';
      break;
      case 'home decoration':
        echo '<ul class="list">
        <span>&#9874</span
        >HOME DECORATION <span class="point">&#8250</span>
        <li>
          <a href="#" target="blank"><span>&#9882</span>Bedroom</a>
        </li>
        <li>
          <a href="#" target="blank"><span>&#9882</span>Kitchen & Dinning</a>
        </li>
        <li>
          <a href="#" target="blank"><span>&#9882</span>Bathroom</a>
        </li>
        <li>
          <a href="#" target="blank"><span>&#9882</span>Garden</a>
        </li>
        <li>
          <a href="#" target="blank"><span>&#9882</span>Furniture</a>
        </li>
        <li>
          <a href="#" target="blank"><span>&#9882</span>Others</a>
        </li>
      </ul>';
        break;
        case 'fashion':
          echo '<ul class="list">
          <span>&#9874</span
          >BOYS FASHION <span class="point">&#8250</span>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Shirts</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Pants</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Bags</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Shoes</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Shorts</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Glass</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Others</a>
          </li>
        </ul>
        <ul class="list">
          <span>&#9874</span
          >GIRLS FASHION <span class="point">&#8250</span>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Dresses</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Pants</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Bags</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Shoes</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Shorts</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Glass</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Others</a>
          </li>
        </ul>
        <ul class="list">
          <span>&#9874</span
          >KIDS FASHION <span class="point">&#8250</span>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Dresses</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Pants</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Shoes</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Shorts</a>
          </li>
          <li>
            <a href="#" target="blank"><span>&#9882</span>Others</a>
          </li>
        </ul>';
          break;
          case 'cosmatic':
            echo '<ul class="list">
            <span>&#9874</span
            >COSMATICS <span class="point">&#8250</span>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Lotions</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Creams</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Jewellery</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Shorts</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Others</a>
            </li>
          </ul>';
          break;
          case 'agro':
            echo '<ul class="list">
            <span>&#9874</span
            >AGRO <span class="point">&#8250</span>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Farming</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Fertilizer</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Nursery</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Others</a>
            </li>
          </ul>';
          break;
          case 'electronics':
            echo '<ul class="list">
            <span>&#9874</span
            >ELECTRONIC <span class="point">&#8250</span>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Computer and Accessories</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Mobile and Accessories</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Speaker and Headphone</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Security and Surveillance</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Hardware</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Others</a>
            </li>
          </ul>';
          break;
        case 'sports and fitness':
            echo '<ul class="list">
            <span>&#9874</span
            >ELECTRONIC <span class="point">&#8250</span>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Equipment</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Jersey</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Fitness Accessories</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Supplement</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Others</a>
            </li>
          </ul>';
          break;
          case 'medicine':
            echo '<ul class="list">
            <span>&#9874</span
            >MEDICINE <span class="point">&#8250</span>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Human Medicine</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Veterinary Medicine</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Medical Accessories</a>
            </li>
            <li>
              <a href="#" target="blank"><span>&#9882</span>Others</a>
            </li>
          </ul>';
          break;
  default:
    echo '<p>No Category find</p>';
    break;
}
*/
?>
  </div>
</div>
