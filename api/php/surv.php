<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

$dane = htmlspecialchars($_GET["name"]);

$sql = "SELECT * from ankieta where a_temat='$dane'";
$result = $connect->query($sql);
$wypisz="";
$nazwa="";

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
        echo "<h3>Ankieta ".$row['a_temat']." </h3><p>Opis ankiety:".$row['a_opis']."</p>";
        $nazwa=$row['a_temat'];
  }}
        echo"<form>";
        $sql3 = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta WHERE pytania.p_a_id=ankieta.a_id and ankieta.a_temat='$nazwa'";
          $result3 = $connect->query($sql3);
           if ($result3->num_rows > 0) {
               
            while($row = $result3->fetch_assoc()) {
                if($wypisz != $row["pytanie"]){
                    echo $row["pytanie"]."<br>";
                    $wypisz=$row["pytanie"];
                }
               if($row['o_p_id']===$row['p_id']){
    
               echo $row["odpowiedz"]."<input type='checkbox' value='".$row["odpowiedz"]."'></input><br>";
               }
             }}else
             {
               echo "</ul>Brak odpowiedzi.";
             }

?>