<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>log in</title>
    <!--<link rel="stylesheet" href="../link/local/css/grid.css" /> -->
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <form method="GET" action="#" class="log">
    <p><a href="/index.php">Back to Home</a></p>
      <div class="form">
        <div class="form-group">
          <h1>LOG IN</h1>
        </div>
        <div class="form-group">
          <label for="email">&#9993</label>
          <input id="email" type="email" maxlength="40" placeholder="your12@gmail.com" />
          
        </div> 
        <div class="form-group">
          <label for="password">&#128273</label>
          <input id="pass" type="password" required = "required" maxlength="40" placeholder="password"/>
        </div>
        <div id="state" class="state">
          <p></p>
        </div>
        <div class="submit">
          <p>Log In</p>
        </div>
      </div>
    </form>
    
    <script src="login.js"></script>
  </body>
</html>
