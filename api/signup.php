<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
</script>
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Rejestracja</title>
</head> 
<body>
    <header>
    <div class="menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">Ankiety</a>

          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item active">
                      <a id="nav-login" class="nav-link" href="login.php">Logowanie</a>
                  </li>
                  <li class="nav-item">
                      <a id="nav-register" class="nav-link" href="signup.php">Rejestracja</a>
                  </li>
          <!--       <li class="nav-item">
                      <a id="logout" class="nav-link logout" onclick="logout()">Wyloguj</a>
                  </li>  -->
                  <li class="nav-item">
                      <a id="profile" class="nav-link" href="profile.html">Profil</a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>
    
    
    </header>
    <div id="center">
    <div id="panel">
    <?php if (empty($_SESSION['user'])) : ?>
     <label for="username">Email:</label>
      <form action="rejestracja.php" method="post">
      <input type="text" id="username" name="login" /> 
      <br/> 
      <label for="password">Hasło:</label>
      <input type="password" id="password" name="password" />
      <br/>
      <label for="password">Powtórz hasło:</label>
      <input type="password" id="password" name="password" />
      <br/>
      <input type="sumbit" id="rejestruj" class="btn btn-info" value="Zarejestruj">
    </form>
    <?php else : ?>
        <p>Hi, <?=$_SESSION['user']?></p>
        <a href="api/logout.php">logout</a>
    <?php endif; ?>
    
   <!-- </div>
      <div id="panel">
      <form method="POST" action="php/rejestracja.php">
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" name="login"><br><br>
        <label for="password">Hasło:</label>
        <input type="password" name="haslo1"><br>
        <label for="password">Powtórz hasło:</label>
        <input type="password" name="haslo2"><br><br>
        <label for="mail">Adres Email:</label
        <input type="text" name="email"><br>
        <input type="submit" value="Utwórz konto" name="rejestruj">
    </form>
    </div>-->
    </div>
</body>
</html>