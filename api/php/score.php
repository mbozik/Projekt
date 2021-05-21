<?php
include('php/db.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

$user = $_SESSION['name'];
$sql = "SELECT * from ankieta where tworca='$user'";
$result = $connect->query($sql);




if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
  
    echo "<h1><a href='".$row["a_temat"]. "'>".$row["a_temat"]."</a></h1><br><p> Opis:" . $row["a_opis"]. "</p><br><ul>";
    $id=$row["a_id"];
    $sql2 = "SELECT * from pytania where p_a_id='$id'";
    $result2 = $connect->query($sql2);
    if ($result2->num_rows > 0) {
      while($row = $result2->fetch_assoc()) {
          echo"<li>".$row["pytanie"]."</li>";
          $sql3 = "SELECT * from polacz where con_a_id='$id'";
          $result3 = $connect->query($sql3);
          if ($result3->num_rows > 0) {
            while($row = $result3->fetch_assoc()) {
              echo"<li>".$row["con_o_id"]."</li>";
            }}else
            {
              echo "</ul>Brak odpowiedzi.";
            }

  } echo "</ul>";}else {
    echo "</ul>Brak pytań.";
  }
}} else {
  echo "Brak ankiet.";
}
$connect->close();
?>
