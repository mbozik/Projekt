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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyniki</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script>

        function ilosc(wartosc){
            var element = document.getElementById("wartosc").value;
            var i;
            document.getElementById("puste").innerHTML='';
            document.getElementById("puste").innerHTML='<br>Podaj adresy email<br>';
            for(i=0;i<element;i++)
            {
              
                
                var input=document.createElement('input');
                var x = document.createElement("INPUT");
                x.setAttribute("type", "submit");
                x.setAttribute("id", "przycisk");
                 x.setAttribute('class', 'btn btn-dark');
                var mybr = document.createElement('br');
                input.setAttribute('name', 'm'+i);
                document.getElementById("puste").appendChild(mybr);
                document.getElementById("puste").appendChild(input);
                document.getElementById("puste").appendChild(mybr);
                if(i==element-1){
                  document.getElementById("puste").appendChild(x);
                 }
            }

            $(document).ready(function () {
                createCookie("wartosc", element, "100");
            });
            function createCookie(name, value, days) {
            var expires;
              
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            }
            else {
                expires = "";
            }
              
            document.cookie = escape(name) + "=" + 
                escape(value) + expires + "; path=/";
        }

        }


</script>


</head>
<style>
    label {
  margin: 10px 0;
}
body{
   background-color: #366d7e;
 }
.question-container .question-label {
  border: none;
  
}
.answer-option {
  width: 200px;
}
input[type=radio], input[type=checkbox] {
  width: 25px;
  float: left;
}

.radio-answer-options {
  background-color: #fcc;
}
.checkbox-answer-options {
  background-color: #fcf;
}
.text-answer-options {
  background-color: #cff;
}
.row {
    margin-right: 1%;
    margin-left: 1%;
}
#przycisk{

  margin: 2%;
}
#sedno{
  margin:0 auto;
  padding:2%;
}

    </style>
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
    <span class="glyphicon glyphicon-list-alt" aria-hidden ="true"></span><a class="navbar-brand active" href="index.php">Ankiety</a>

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
                    <a id="profile" class="nav-link" href="profile.php">Profil</a>
                </li>
                <li class="nav-item">
                    <a id="create" class="nav-link" href="create.php">Stwórz</a>
                </li>
                <li class="nav-item">
                    <a id="create" class="nav-link active" href="odpowiedz.php">Odpowiedz</a>
                </li>
                <li class="nav-item">
                      <a id="score" class="nav-link" href="wyniki.php">Wyniki</a>
                  </li> 
                <li class="nav-item">
                      <a id="logout" class="nav-link logout" href="php/logout.php">Wyloguj</a>
                  </li> 
                
            </ul>
            <?php  if (isset($_SESSION['name'])) : ?>
      

   <?php endif ?>
      
        </div>
    </nav>
</div>
 
        <div class="row">
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Ankiety udostępnione użytkownikowi do odpowiedzi</div>
                <div class="panel-group">
                 <div id="sedno"> 
                 <p> Podaj ilość użytkowników, którzy mają wziąć udział w ankiecie </p>
                    <form>

                                <input id="wartosc"/>
                                <button class="btn btn-dark" onclick="ilosc('wartosc');" type="button">Wysun</button>
                        </form>
                        <form id="puste" action="create.php" method="POST" >
                    
                        </form>
                </div></div>
            </div>
            </div>
        </div>
        </div>
</div>
    </div>
</body>
</html>

