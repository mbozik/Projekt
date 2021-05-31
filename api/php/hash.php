<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);
$i=1;
$wynik=$_POST['wynik'];
$a_id="";
$o_id="";

for($k=1;$k<$wynik+1;$k++){
    $odp=$_POST['q'.$k];
    $que=$_POST['p'.$k];
    $name=$_POST['nazwa_t'];
    echo $odp;
    echo $que;
    echo $name;
    $sql ="SELECT a_id FROM ankieta WHERE ankieta.a_temat='$name'";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
                $a_id=$row['a_id'];
        }
    }
   //sql3="SELECT * FROM `odpowiedzi` WHERE odpowiedzi.odpowiedz='$odp' AND odpowiedzi.o_p_id=(SELECT p_id from pytania where p_a_id='$a_id')"
    $sql = "INSERT INTO polacz(con_id, con_u_id, con_a_id, con_o_id) VALUES ('','$title','$description','$user')";

}



?>