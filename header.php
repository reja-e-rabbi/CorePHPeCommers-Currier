<header class="header">
      <div class="upper">
          <ul class="info">
            <li><span>&#128222</span><span>+08801940462325</span></li>
            <li><span>&#128231</span><span>carefiopl@gmail.com</span></li>
            <?php echo '<li><a href="../sequr/location.php"><span>&#9873</span><span>'. $locPub["location"].'</span></a></li>'; ?>
            <?php echo '<li><a href="../card/parcel.php" target="_blank"><span>&#9832</span><span>parcel</span></a></li>'; ?>
          </ul>
          <ul class="socil">
            <li class="button facebook" data-sharer="facebook"  data-hashtag="Fiopl " data-url="https://fiopl.com/index.php">f</li>
            <li class="button facebook" data-sharer="twitter"  data-hashtag="Fiopl " data-title="HOME||FIOPL" data-url="http://fiopl.com/index.php" >t</li>
            <li class="button ln" data-sharer="linkedin"  data-hashtag="Fiopl " data-title="HOME||FIOPL" data-url="http://fiopl.com/index.php">ln</li>
            <li class="button ln"data-sharer="vk"  data-hashtag="Fiopl " data-title="HOME||FIOPL" data-url="http://fiopl.com/index.php" >vk</li>
            <li class="button ln" data-sharer="reddit" data-hashtag="Fiopl " data-title="HOME||FIOPL" data-url="http://fiopl.com/index.php">rdt</li>
          </ul>
      </div>
      <div class="main-head">
        <div class="nav-brand">
          <?php echo '<h1><a href="/index.php?id='.$get.'">FIOPL</a></h1>'; ?>
        </div>
        <div class="nav-info">
          <ul>
            <li onclick="toggle()" class="product">&#9776  Product</li>
            <li class="wish"><span>&#9733</span><span> Wishlist</span></li>
            <li class="cart"><a href="/blog/page/card/cart.php" target="_blank" rel="noopener noreferrer">&#128722 <sup class="lnt">0</sup>cart</a></li>
            <li class="log"><span>&#128274</span><span><a href="/blog/page/log/login.php">Log</a></span></li>
          </ul>
        </div> 
        <div class="search">
            <input class="search-box" type="search" name="search" id="search-value">
            <input type="submit" id="serch" value="search">
        </div>
        <div class="border"></div>
      </div>
      
        <div onclick="toggle()" id="drop" class="drop-down slid-had">
          <div class="drop-menu">
            <span>GROCERIES</span>
            <ul>
              <li class = "snp" data-cat = "grocerie" data-value="ice cream">Ice cream</li>
              <li class = "snp" data-cat = "grocerie" data-value="bakery">Bakery</li>
              <li class = "snp" data-cat = "grocerie" data-value="drinks">Drinks </li>
              <li class = "snp" data-cat = "grocerie" data-value="flour">Flour </li>
              <li class = "snp" data-cat = "grocerie" data-value="vegetable">Vegetables</li>
              <li class = "snp" data-cat = "grocerie" data-value="fruits">Fruits</li>
              <li class = "snp" data-cat = "grocerie" data-value="others">Others</li>
            </ul>
          </div>
          <div class="drop-menu">
            <span>HOME DECORATION</span>
            <ul>
              <li class = "snp" data-cat = "home decoration" data-value="kitchen and dining">Kitchen and Dining</li>
              <li class = "snp" data-cat = "home decoration" data-value="home applies">Home Applies</li>
              <li class = "snp" data-cat = "home decoration"  data-value="gardening">Gardening </li>
              <li class = "snp" data-cat = "home decoration"  data-value="furneture">Furneture </li>
              <li class = "snp" data-cat = "home decoration" data-value="others">Others</li>
            </ul>
          </div>
          <div class="drop-menu">
            <span>FASHIONS</span>
            <ul>
              <li class = "snp" data-cat = "cosmatic" data-value="boys fashion">Boys fashion</li>
              <li class = "snp" data-cat = "cosmatic" data-value="girls fashion">Girls fashion</li>
              <li class = "snp" data-cat = "cosmatic" data-value="kids fashion">Kids fashion</li>
              <li class = "snp" data-cat = "cosmatic" data-value="others">Others</li>
            </ul>
          </div>
          <div class="drop-menu">
            <span>RESTURENT FOODS</span>
            <ul data-id="restaurent">
              <li class = "snp" data-value="Coffee and Tea" data-cat = "restaurent">Coffe & Tea </li>
              <li class = "snp" data-value="Chicken" data-cat = "restaurent" >Chicken Recepy</li>
              <li class = "snp" data-value="marton" data-cat = "restaurent" >Marton Recepy</li>
              <li class = "snp" data-value="Beef" data-cat = "restaurent">Beef Recepy</li>
              <li class = "snp" data-value="fish" data-cat = "restaurent" >Fish Recepy</li>
              <li class = "snp" data-value="vegetable" data-cat = "restaurent">Vegetable Recepy</li>
              <li class = "snp" data-value="others" data-cat = "restaurent">Others</li>
            </ul>
          </div>
          <div class="drop-menu">
            <span>BOOKS</span>
            <ul>
               <li class = "snp" data-cat = "library" data-value="hsc">HSC</li>
               <li class = "snp" data-cat = "library" data-value="ssc">SSC</li>
               <li class = "snp" data-cat = "library" data-value="school">School</li>
               <li class = "snp" data-cat = "library" data-value="primary">Primary</li>
               <li class = "snp" data-cat = "library" data-value="honors">Honors</li>
               <li class = "snp" data-cat = "library" data-value="masters">Masters</li>
               <li class = "snp" data-cat = "library" data-value="engineering">Engineering</li>
               <li class = "snp" data-cat = "library" data-value="medical">Medical</li>
               <li class = "snp" data-cat = "library" data-value="degree">Degree</li>
               <li class = "snp" data-cat = "library" data-value="others">others</li>
            </ul>
          </div>
          <div class="drop-menu">
            <span>AGRO</span>
            <ul>
              <li class = "snp" data-cat="agro" data-value="farming">Farming</li>
              <li class = "snp" data-cat="agro" data-value="fertilizer">Fertilizer</li>
              <li class = "snp" data-cat="agro" data-value="nursery">Nursery</li>
              <li class = "snp" data-cat="agro" data-value="others">Others</li>
            </ul>
          </div>
          <div class="drop-menu">
            <span>SPORTS & FITNESS</span>
            <ul>
              <li class = "snp" data-cat="sports and fitness" data-value="equipment">Equipment</li>
              <li class = "snp" data-cat="sports and fitness" data-value="jersey">Jersey</li>
              <li class = "snp" data-cat="sports and fitness" data-value="fitness accessories">Fitness Accessories</li>
              <li class = "snp" data-cat="sports and fitness" data-value="supplement">Supplement</li>
              <li class = "snp" data-cat="sports and fitness" data-value="others">Others</li>
            </ul>
          </div>
          <div class="drop-menu">
            <span>ELECTRONICS</span>
            <ul>
              <li class = "snp" data-cat="electronics" data-value="computer and accessories">Computer & Accessories</li>
              <li class = "snp" data-cat="electronics" data-value="mobile and accessories">Mobile & Accessories</li>
              <li class = "snp" data-cat="electronics" data-value="speaker and headphone">Speaker and Headphone</li>
              <li class = "snp" data-cat="electronics" data-value="security and surveillance">Security and Surveillance</li>
              <li class = "snp" data-cat="electronics" data-value="hardware">Hardware</li>
            </ul>
          </div>
        </div>
    </header>