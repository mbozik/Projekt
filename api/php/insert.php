<?php
// include('testowe.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
  session_start();
   // $a=$tab[0];
  $validation_error = '';

  $title = $_POST['survey_title'];
  $description = $_POST['survey_opis'];
  if(empty($error))
  {
  $zapytanie = "SELECT * FROM users WHERE email = '$title'";
  $result2 = $connect->prepare($zapytanie);
  if($result2==NULL){
  $sql = "INSERT INTO ankieta(a_id, a_temat, a_opis, tworca) VALUES ('','$title','$description','$user')";
  $result = $connect->query($sql);
  $connect->close();
  header("Location: http://127.0.0.1/Projekt/api/question.php");
}
  else
   $validation_error = 'Podana ankieta istnieje';
   header("refresh:4;url=http://127.0.0.1/Projekt/api/create.php");
 
   echo '<body style="background-color: #366d7e;"><p style="margin:0 auto; width:60%; text-align:center; background-color: #e7586287;font-size:25px;border:solid 2px black;">Podana ankieta istnieje już w bazie.<br> Za 4 sekund zostaniesz przeniesiony do strony z tworzeniem ankiety.</p>';
  }
?>

