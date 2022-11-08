
<?php
session_start();
include_once "../../../config.php";
include_once "../db/dbcon.php";
$id = $_GET["id"];
$quiry = "select FirstName, LastName, UserName, ID, Pass, JoinDate, Rolls, email, contact, AddBy from userlog where ID = ? limit 1";
$stmt = $con->prepare($quiry);
$stmt->bind_param('s', $id);
$stmt-> execute();
$stmt->store_result();
$stmt->bind_result($FirstName, $LastName, $UserName, $ID, $Pass, $JoinDate, $Rolls, $email, $contact, $AddBy);
$stmt->fetch();
$result = $stmt-> num_rows();
?>
<div class="form-list">
    <?php
if ($result != 1) {
    echo "<p> error occurs check error log </p>";
}
echo '<ul>
<li><b>Frist Name : </b><i>'.$FirstName.'</i></li>
<li><b>Last Name : </b><i>'.$LastName.'</i></li>
<li><b>User Name : </b><i>'.$UserName.'</i></li>
<li><b>ID : </b><i>'.$ID.'</i></li>
<li><b>Password : </b><i>'.$Pass.'</i></li>
<li><b>Join Date : </b><i>'.$JoinDate.'</i></li>
<li><b>Rolls : </b><i>'.$Rolls.'</i></li>
<li><b>Email : </b><i>'.$email.'</i></li>
<li><b>Contact : </b><i>'.$contact.'</i></li>
<li><b>Add By : </b><i>'.$AddBy.'</i></li>
</ul>';

    ?>
</div>
