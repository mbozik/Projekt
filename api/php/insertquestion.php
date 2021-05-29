<?php
include('connect.php');

  session_start();
  $user= $_SESSION['name'];
  // $sql = "SELECT a_id from ankieta WHERE tworca='$user' AND a_id=MAX";
  $sql = "SELECT * from ankieta WHERE a_id=(SELECT max(a_id) from ankieta)AND tworca='$user'";
  
  $result = $connect->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $pyt = $_POST['pyt'];

    while($row = $result->fetch_assoc()) {
      $a = $row["a_id"];
  
      $zp = "INSERT INTO pytania(p_id, pytanie, p_t_id, p_a_id) VALUES ('','$pyt','1','$a')";
      $result = $connect->query($zp);
    }
  } 

  $connect->close();

?>