<?php 
  session_start(); 

  if (!isset($_SESSION["name"])) {
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki</title>
</head>
<body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
</script>
<script src="js/app.js"></script>
<script src="js/profile.js"></script>
<script src="js/auth.js"></script>
<div class="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand active" href="index.php">Ankiety</a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        
          <!--      <li class="nav-item">
                    <a id="nav-register" class="nav-link" href="signup.php">Rejestracja</a>
                </li>
               <li class="nav-item">
                    <a id="logout" class="nav-link logout" onclick="logout()">Wyloguj</a>
                </li>  -->
                <li class="nav-item">
                    <a id="profile" class="nav-link active" href="profile.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a id="create" class="nav-link active" href="create.php">Stwórz</a>
                </li>
                <li class="nav-item">
                      <a id="logout" class="nav-link active" href="wyniki.php">Wyniki</a>
                  </li> 
                <li class="nav-item">
                      <a id="logout" class="nav-link logout" href="php/logout.php">Wyloguj</a>
                  </li> 
            </ul>
            
            <?php  if (isset($_SESSION['name'])) : ?>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0" style=" margin-left: 69%;">
                    <li class="nav-item" style="text-align:right;margin:auto"> 
                        Zalogowany: <strong><?php echo $_SESSION['name']; ?></strong>
                        </li>
                        </ul>
                 <?php endif ?>
        </div>
    </nav>
</div>
    <div id="panel_wyniki">
                <div id="stworzone">
                    <h1>Ankiety stworzone przez użytkownika</h1>
                    <?php  if (isset($_SESSION['name'])) : ?>
                                Zalogowany: <strong><?php echo $_SESSION['name']; ?></strong>
                                </li>
                                </ul>
                 <?php endif ?>

                </div>
                <div id="glosowane">
                    <h1>Ankiety na które użytkownik głosował</h1>
                </div>

    </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>