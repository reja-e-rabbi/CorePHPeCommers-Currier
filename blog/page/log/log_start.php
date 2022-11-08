<?php 
session_start();
include_once "db/db_conn.php";
$script = "select FirstName, LastName, ID, Pass, email, contact from userlog limit 2";
$quiry = mysqli_query($con, $script);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <table>
  <?php 
  $stmt =  $con->stmt_init();
  if ($stmt->prepare("SELECT ID FROM userlog WHERE Name=?")) {
  
      /* bind parameters for markers */
      $stmt->bind_param("s", $city);
  
      /* execute query */
      $stmt->execute();
  
      /* bind result variables */
      $stmt->bind_result($district);
  
      /* fetch value */
      $stmt->fetch();
  
      printf("%s is in district %s\n", $city, $district);
  
      /* close statement */
      $stmt->close();
  }
  

?>
  </table>
</body>
</html>

<?php 
  //mysqli_free_result($quiry);
  $con ->close();
?>