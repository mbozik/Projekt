<?php
// include('testowe.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
  session_start();
  $user= $_SESSION['name'];
  // $a=$tab[0];
  $title = $_POST['survey_title'];
  $description = $_POST['survey_opis'];


  $sql = "INSERT INTO ankieta(a_id, a_temat, a_opis, tworca) VALUES ('','$title','$description','$user')";
  $result = $connect->query($sql);
  $connect->close();
header("Location: http://127.0.0.1/Projekt-1/api/question.php");

?>

