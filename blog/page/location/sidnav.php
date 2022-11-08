<?php
$ar = array("id"=> 1, "rolls"=> $_SESSION["rolls"]);
$id = json_encode($ar);
?>
<?php
echo '<div class="aside">
<div class="main-side" id="list">
  <ul class="list">
    <span>&#9874</span
    >ZONE <span class="point">&#8250</span>
    <li>
      <a href="form.php?id='.urlencode($id).'" target="blank"><span>&#9882</span>Creat Zone</a>
    </li>
    <li>
      <a href="index.php?id=1"><span>&#9882</span> All
    </li>
    <li>
      <a href="#"><span>&#9882</span> Top User</a>
    </li>
    <li>
      <a href="#"><span>&#9882</span> Top Rank</a>
    </li>
    <li>
      <a href="#"><span>&#9882</span> Top Visited</a>
    </li>
  </ul>
  <ul class="list">
    <span>&#9874</span
    >Country <span class="point">&#8250</span>
    <li>
      <a href="#"><span>&#9882</span>Bangladesh</a>
    </li>
    <li>
      <a href="#"><span>&#9882</span>Nepla</a>
    </li>
    <li>
      <a href="#"><span>&#9882</span>India</a>
    </li>
    <li>
      <a href="#"><span>&#9882</span>Bhutan</a>
    </li>
    <li>
      <a href="#"><span>&#9882</span>Pakistan</a>
    </li>
  </ul>
</div>
</div>';

?>

