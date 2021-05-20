<?php
// include('db.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

session_start();
$user= $_SESSION['name'];

$title = $_POST['survey_title'];
$description = $_POST['survey_opis'];

$query = "SELECT a_id FROM ankieta";

$sql = "INSERT INTO ankieta(a_id, a_temat, a_opis, tworca) VALUES ('','$title','$description','$user')";
$result = $connect->query($sql);


$sql = "SELECT * from ankieta WHERE a_temat='$title'";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  $i = $_POST['i'];

  while($row = $result->fetch_assoc()) {
    $a = $row["a_id"];
    $zp = "INSERT INTO pytania(p_id, pytanie, p_t_id, p_a_id) VALUES ('','$i','1','$a')";
    $result = $connect->query($zp);
  }
} 

$connect->close();



?>