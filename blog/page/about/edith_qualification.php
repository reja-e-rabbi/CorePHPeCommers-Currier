<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>qualification</title>
    <link rel="stylesheet" href="../../fram/css/grid.css" />
    <link rel="stylesheet" href="../../fram/css/form_one.css" />
  </head>
  <body>
    <div id="grid">
      <form id="myForm" class="form" action="#" method="post">
        <div class="form-group">
          <label for="owner">
            Qualification :
          </label>
          <input type="text" name="#" id="qlf" />
          <p class="qlf"></p>
        </div>
        <div class="form-group">
          <label for="owner">
            Date :
          </label>
          <input type="date" name="fa" id="date" />
          <p class="date"></p>
        </div>
        <div class="form-group">
          <label for="textaria">About :</label>
          <textarea name="text" id="about" cols="30" rows="10"></textarea>
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
    <script src="qualification.js"></script>
  </body>
</html>
