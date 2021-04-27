<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head> 
<body>
    <header>
    <div class="menu">
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="index.html">Projekt inżynierski</a>

          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a id="nav-login" class="nav-link" href="login.html">Login</a>
                  </li>
                  <li class="nav-item">
                      <a id="nav-register" class="nav-link" href="register.html">Register</a>
                  </li>
                  <li class="nav-item">
                      <a id="logout" class="nav-link logout" onclick="logout()">Logout</a>
                  </li>
                  <li class="nav-item">
                      <a id="profile" class="nav-link" href="profile.html">Profile</a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>
    
    </header>
    <div id="center">
    <?php if (empty($_SESSION['user'])) : ?>
     <div id="panel">
     <label for="username">Nazwa użytkownika:</label>
      <form action="login.php" method="post">
      <input type="text" id="username" name="login" /> 
      <br/> 
      <label for="password">Hasło:</label>
      <input type="password" id="password" name="password" />
      <br/>
      <a href="signup.php"><button id="rejestr" type="button">Rejestracja!</button></a>
      <input type="submit" value="Login">
    </form>
    <?php else : ?>
        <p>Hi, <?=$_SESSION['user']?></p>
        <a href="api/logout.php">logout</a>
    <?php endif; ?>
    </div>
    </div>
</body>
</html>