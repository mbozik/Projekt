<?php
include('connect.php');


  session_start();
  $sql = "INSERT INTO ankieta(a_id, a_temat, a_opis, tworca) VALUES ('','molda','molda','molda')";
  $result = $connect->query($sql);

  $connect->close();

?>