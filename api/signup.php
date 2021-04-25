<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="CSS/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>login tutorial</title>
</head> 
<body>
    <header>
      
    
    </header>
    <div id="center">
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
    </div>
    </div>
</body>
</html>