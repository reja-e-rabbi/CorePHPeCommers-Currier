<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | FIOPL </title>
    <link rel="stylesheet" href="/blog/fram/css/grid.css" />
    <link rel="stylesheet" href="/main.css" />
    <script src="../../fram/js/script.js"></script>
  </head>
  <body>
    <div id="grid">
        <?php include "../../../header.php";?>
        <div class="carosel-v location">
            <div class="flex-col">
                <div class="para">
                    <h1>Enter Your Location</h1>
                    <p class="set1">Set your village and police station to get perfect store</p>
                </div>
                <div class="form">
                    <select style="color: yellowgreen;" class="size" name="state" id="opt">
                        <option class="cls" selected = "selected" value="Dhaka">Dhaka</option>
                        <option class="cls" selected = "selected" value="Narsingdi">Narsingdi</option>
                    </select>
                    <input class="size" placeholder="Dhanua,Shibpur" type="search" name="search" id="loc">
                    <p class="size search01 ">Search</p>
                </div>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
  </body>
</html>
