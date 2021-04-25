<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>login tutorial</title>
</head> 
<body>
    <header>
      
    
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