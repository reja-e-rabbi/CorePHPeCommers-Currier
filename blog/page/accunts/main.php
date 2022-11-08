<?php
$IDS = $_GET["id"];
?>
<div class="sm-card">
          <div class="s-card">
            <a href="#" class="s-value">
              <p> Total Income</p>
              <p>0</p>
            </a>
            <a href="#" class="s-value">
              <p>Widthdraw</p>
              <p>0</p>
            </a>
            <a href="#" class="s-value">
              <p>Bill Pay</p>
              <p>0</p>
            </a>
            <a href="#" class="s-value">
              <p>Salarry</p>
              <p>0</p>
            </a>
</div>
<div class="s-table">
  <div class="form">
    <div class="form-group">
      <input type="search" placeholder="search name or id" name="id[]" id="" />
      <input type="submit" value="submit" />
    </div>
  </div>
  <table>
    <caption>
      all insert data
    </caption>
    <thead>
      <tr>
        <th>No</th>
        <th>Amount</th>
        <th>Comments</th>
        <th>Cheker</th>
        <th>AC</th>
        <th>Date</th>
        <th>Link</th>
      </tr>
    </thead>
    <tbody>
    <?php
switch ($IDS) {
  case 1: 
    # code...
    $DBS = 'select';
    include_once "../db/mainDB.php";
    $quiry = "select Amount, Exlpane,Entry,EntryDates,AddForm,AddBy,ID,AcNo from Budget order by EntryDates desc limit 50";
    $stmt = $con->prepare($quiry);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($Amount,$Exlpane,$Entry, $EntryDates,$AddForm,$AddBy, $ID, $AcNo);
    //$numrows = $stmt-> num_rows;
    //echo $numrows;
    $No = 1;
    while ($stmt->fetch()) {
      
      echo '<tr>
        <td>'.$No++.'</td>
        <td>'.$Amount.'</td>
        <td>'.$Exlpane.'</td>
        <td>'.$AddBy.'</td>
        <td>'.$AcNo.'</td>
        <td>'.$EntryDates.'</td>
        <td>view</td>
      </tr>';
    }
    break;
  
  default:
    # code...
    echo "quiry not succese";
    break;
}


?>
    </tbody>
    <tfoot role="alert">
      <tr>
        <td colspan="7">......</td>
      </tr>
    </tfoot>
  </table>
</div>

