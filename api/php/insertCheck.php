<?php
// include('insert.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
  session_start();
  $sql = "INSERT INTO ankieta(a_id, a_temat, a_opis, tworca) VALUES ('','molda','molda','molda')";
  $result = $connect->query($sql);

  $connect->close();

?>