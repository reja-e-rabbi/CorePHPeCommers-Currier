<div class="aside sninfo">
  <div class="main-side sidnav-spm" id="list">
    <ul class="list">
      <span>&#9874</span>About Serviceman <span class="point">&#8250</span>
      <li>
        <a href="#"><span>&#9752</span>Pyament Request</a>
      </li>
    </ul>
    <ul class="list">
      <span>&#9874</span>Work Serviceman <span class="point">&#8250</span>
      <li>
      <?php  echo "<a href='index.php?id=".urlencode($get)."'><span>&#9752</span>Pending Order</a>"; ?>
      </li>
      <li>
        <a class='ord' data-id='ride'><span>&#9752</span> Your Ride</a>
      </li>
      <li>
        <a class='ord' data-id='complete'><span>&#9752</span> Complete order</a>
      </li>
      <li>
        <a class='ord' data-id='error'><span>&#9752</span> Error order</a>
      </li>
      <li>
        <a class='ord' data-id='reject'><span>&#9752</span> Reject order</a>
      </li>
    </ul>
  </div>
</div>
