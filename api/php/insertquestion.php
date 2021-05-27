<?php
include('connect.php');

  session_start();
  $user= $_SESSION['name'];
  $sql = "SELECT a_id from ankieta WHERE tworca='$user'";
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