<?php
include('connect.php');

  session_start();
  $user= $_SESSION['name'];
  $odp = $_POST['odp'];
  $pyt = $_POST['pyt'];
  
  $sql = "SELECT p_id FROM pytania WHERE pytanie='$pyt'";
  $result = $connect->query($sql);
    while($row = $result->fetch_assoc()) {
      $a = $row["p_id"];
      $sql1 = "INSERT INTO odpowiedzi(o_id, odpowiedz, o_p_id) VALUES ('','$odp','$a')";
      $result1 = $connect->query($sql1);
    }
  $connect->close();

?>