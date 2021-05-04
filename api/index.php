<?php

session_start();


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
</script>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>HOME</title>
</head> 
<body>
    <header>
    <div class="menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand active" href="index.html">Ankiety</a>

          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>


          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                  <li class="nav-item">
                      <a id="nav-login" class="nav-link" href="login.php">Logowanie</a>
                  </li>
                  <li class="nav-item">
                      <a id="nav-register" class="nav-link" href="signup.php">Rejestracja</a>
                  </li>
          <!--       <li class="nav-item">
                      <a id="logout" class="nav-link logout" onclick="logout()">Wyloguj</a>
                  </li>  -->
                  <li class="nav-item">
                      <a id="profile" class="nav-link" href="profile.php">Profil</a>
                  </li>
              </ul>
          </div>
      </nav>
  </div>
    
    </header>
    <div id="centerI">
        <h1>Projekt Inżynierski</h1>
        <hr>
    <div id="opis_index"><p>
    Projekt i implemetacja systemu webowego umożliwiającego głosowanie (lub ankietowanie)
    w sposób umożliwiający zachowanie anonimowości użytkowników.
    System zrealizowany w formie aplikacji webowej powinien uwzględniać możliwość oddania głosu lub wyrażenia opinii w taki sposób, aby realizować następujące funkcje:</p>
    <ul><li> informacje przechowywane w bazie danych </li>
    <li>reprezentacja nie umożliwia powiązania użytkownika z konkretnymi danymi,</li>
    <li>reprezentacja umożliwia sprawdzenie czy dana osoba przekazała dane,</li>
    <li>reprezentacja umożliwia sprawdzenie przez użytkownika czy jego dane są zapisane w bazie.</li></ul>
    <p>Implementacja powinna uzględniać responsywny interfejs. Do zapewnienia anonimowości należy wykorzystać techniki kryptograficzne (funkcje skrótu) oraz metody generowania tokenów.
    Rekomedowane jest wykorzystanie ogólnodostępnych bibliotek programistycznych.</p>    
    </div>
    </div>
</body>
</html>