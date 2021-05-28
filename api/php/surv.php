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
$i=0;
$q=0;

if ($result->num_rows > 0) {
  // output data of each row
  
  while($row = $result->fetch_assoc()) {
        echo "<h3>Ankieta ".$row['a_temat']." </h3><p>Opis ankiety:".$row['a_opis']."</p>";
        $nazwa=$row['a_temat'];
  }}
        echo"<form id='quiz' action='hash.php' method='post'>";
        $sql3 = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta WHERE pytania.p_a_id=ankieta.a_id and ankieta.a_temat='$nazwa'";
          $result3 = $connect->query($sql3);
           if ($result3->num_rows > 0) {
               
            while($row = $result3->fetch_assoc()) {
                if($wypisz != $row["pytanie"]){
                    echo "<p name='".$row['p_id']."'>".$row["pytanie"]."</p><br>";
                    $wypisz=$row["pytanie"];
                    $q++;
              
                }
               if($row['o_p_id']===$row['p_id']){
              
    
               echo "<label>".$row["odpowiedz"]."<input type='radio' name='q".$q."' value='".$row["odpowiedz"]."'/></label><br>";
               }
             }}else
             {
               echo "</ul>Brak odpowiedzi.";
             }
             echo " <button type='submit' id='submit' onclick='tabulateAnswers()'>Wyslij</button>
               <button type='reset' id='reset' onclick='resetAnswer()'>Reset</button>
               </form>
               <div id='answer'>Hash zawierający twoje odpowiedzi znajdzie się tutaj!</div>
               ";



               
?>