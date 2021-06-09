<?php 
  session_start(); 

//   if (!isset($_SESSION["name"])) {
//   	$_SESSION['msg'] = "You must log in first";
//   	header('location: login.php');
//   }
//   if (isset($_GET['logout'])) {
//   	session_destroy();
//   	unset($_SESSION['username']);
//   	header("location: login.php");
//   }






?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>

.form_style
  {
   width: 600px;
   margin: 0 auto;
  }
  body{
    background:#366d7e;
  }
  .panel-body{
    padding: 15px;
    padding-bottom: 0px;
  }
  </style>
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
    <a class="navbar-brand" href="index.php" style="border-right: solid #366d7e 1px;"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><span id="logo_naw">Ankiety</span></a>

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
                    <a id="create" class="nav-link" href="create.php">Stwórz</a>
                </li>
                <li class="nav-item">
                    <a id="create" class="nav-link" href="odpowiedz.php">Odpowiedz</a>
                </li>
                <li class="nav-item">
                      <a id="score" class="nav-link" href="wyniki.php">Wyniki</a>
                  </li> 
                <li class="nav-item">
                      <a id="logout" class="nav-link logout" href="php/logout.php">Wyloguj</a>
                  </li> 
            </ul>
            
            <?php  if (isset($_SESSION['name'])) : ?>
      
      <p class="nav-item" style="text-align:right;margin:auto"> 
           <strong><?php echo $_SESSION['name']; ?></strong>
          </p>
        
   <?php endif ?>
      
        </div>
    </nav>
</div>
  


    <div class="profile">
        <!-- <div id="r_p" class="right-panel">           -->
            <!--<p class="lead" id="email-profile">No data.</p>-->
            <?php if (isset($_SESSION['success'])) : ?>
                <div class="error success" >
                    <h3>
                    <?php 
                    
                        echo $_SESSION['success']; 
                        unset($_SESSION['success']);
          ?>
        </div>
    </div>
    <?php endif ?>
    <div  id="panel2" >
        <div class="form-group">
            <!-- <label for="key">Aby uzyskać odpowiedzi podaj klucz:</label> -->
            <?php
// include('testowe.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
$user= $_SESSION['name'];
$join="";
$tab1[] = "";
$tab2[] = "";
$hash ="";
// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
   // $a=$tab[0];
$validation_error = '';
$z="";
$a_id="";
$key= $_POST['key'];
// echo $key;
$zmienna="SELECT * FROM odpowiedzi INNER join polacz_hash on odpowiedzi.o_id=polacz_hash.ph_o_id INNER JOIN hash ON hash.h_id = polacz_hash.ph_h_id WHERE hash.hash='$key'";
$result = mysqli_query($connect,$zmienna);
if ($result->num_rows > 0) {
while($row = mysqli_fetch_array($result)){
    $z=$row['o_p_id'];
    $zmienna2="SELECT * FROM pytania where p_id='$z'";
    $result2 = mysqli_query($connect,$zmienna2);
    
    while($row2 = mysqli_fetch_array($result2)){
            $join = $join." " .$row['odpowiedz'];
            $a_id=$row2['p_a_id'];
        // echo $join;
                // echo "Pytanie ".$row2['pytanie']."<br>";}
                // echo "Odpowiedz ".$row['odpowiedz']."<br>";
                $tab1[]=$row2['pytanie'];
                }
            $tab2[]=$row['odpowiedz'];

            }
            $join = $join." " . $user. " ". $a_id;
            $hash = md5($join);

            if($hash==$key){
                echo "Twój hash zgadza się z hashem w bazie danych <br>";
                echo "<br>"."Hash wygenerowany: ".$hash;
                echo "<br>"."Hash w bazie: ".$key."<br>"."<br>";
                for( $x = 1, $cnt = count($tab1); $x < $cnt; $x++ ){
                    
                    echo "Pytanie: ".$tab1[$x]."<br>";
                    echo "Odpowiedz: ".$tab2[$x]."<br>";
                 } 
                
            }else {
                echo"ODPOWIEDZI ZOSAŁY ZMIENIONE!<br>";
                echo "<br>"."Hash wygenerowany: ".$hash;
                echo "<br>"."Hash w bazie: ".$key;

                $hash="";
            }
            
}
else
echo "<p style='text-align: center;'>Błędny hash lub zostały zmienione odpowiedzi w bazie</p>";
?>
            
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

