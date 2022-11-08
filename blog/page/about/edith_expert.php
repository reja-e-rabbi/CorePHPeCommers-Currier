<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Expert</title>
    <link rel="stylesheet" href="../../fram/css/grid.css" />
    <link rel="stylesheet" href="../../fram/css/form_one.css" />
  </head>
  <body>
    <div id="grid">
      <form id="myForm" class="form" action="#" method="post">
        <div class="form-group">
          <label for="owner">
            Expert :
          </label>
          <input type="text" name="#" id="Expert" />
          <p class="Expert"></p>
        </div>
        <div class="form-group">
          <label for="owner">
            Scinc :
          </label>
          <input type="date" name="fa" id="date" />
          <p class="date"></p>
        </div>
        <div class="form-group">
          <label for="owner">
            About Expert :
          </label>
          <textarea id="about" name="tx" cols="30" rows="10"></textarea>
          <p class="about"></p>
        </div>
        <div class="form-group">
          <a class="submit" href="#">Submit</a>
          <a class="reset" href="#">Reset</a>
          <p class="push">write yourself</p>
        </div>
      </form>
    </div>
    <script src="../../fram/js/script.js"></script>
    <script src="expert.js"></script>
  </body>
</html>
