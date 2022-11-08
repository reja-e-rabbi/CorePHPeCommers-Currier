<?php
  session_start();
  
  
?>
<?php
if ($_COOKIE['card']!= null) {
    $localcards = 'card';
    $totalOrder = 'crdlnt';
    $date = time();
    setcookie($totalOrder, null, $date, '/');
    setcookie($localcards, null, $date, '/');
  } {
      echo 'this card is null';
      //header("location: /blog/page/card/parcel.php?id=1");
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Local file</title>
</head>
<body>
    <?php
      echo $_COOKIE['SelsID'];
    ?>
    <script>
        if (!localStorage.getItem('localcards') == '') {
          localStorage.removeItem('localcards');
          localStorage.removeItem('Customer');
          window.location.replace("/blog/page/card/parcel.php?id=1");
        }else {
          localStorage.removeItem('localcards');
          localStorage.removeItem('Customer');
          window.location.replace("/blog/page/card/parcel.php?id=1");
        }
        
    </script>
</body>
</html>
