<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>edith address</title>
    <link rel="stylesheet" href="../../fram/css/grid.css" />
    <link rel="stylesheet" href="../../fram/css/form_one.css" />
  </head>
  <body>
    <div id="grid">
      <form id="myForm" class="form" action="#" method="post">
        <div class="form-group">
          <label for="owner">
            Work Address :
          </label>
          <textarea id="address" name="tx" cols="30" rows="10"></textarea>
          <p class="address"></p>
        </div>
        <div class="form-group">
          <a class="submit" href="#">Submit</a>
          <a class="reset" href="#">Reset</a>
          <p class="push">write yourself</p>
        </div>
      </form>
    </div>
    <script src="../../fram/js/script.js"></script>
    <script src="addres.js"></script>
  </body>
</html>
