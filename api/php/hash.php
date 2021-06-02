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
$user= $_SESSION['name'];
$hash="";

for($k=1;$k<$wynik+1;$k++){
    $odp=$_POST['q'.$k];
    $que=$_POST['p'.$k];
    $name=$_POST['nazwa_t'];
    echo $odp;
    echo $que;
    echo $name;
    //$sql ="SELECT a_id FROM ankieta WHERE ankieta.a_temat='$name'";
    $sql ="SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta ON ankieta.a_id=pytania.p_a_id WHERE tworca='$user' AND a_temat='$name' AND odpowiedz='$odp'";

    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
                $a_id=$row['a_id'];
                $o_id=$row['o_id'];
                
                echo $o_id;
        }
    }
    $sql1 = "INSERT INTO polacz(con_id, con_a_id, con_o_id) VALUES ('','$a_id','$o_id')";
    $result = $connect->query($sql1);
   //sql3="SELECT * FROM odpowiedzi WHERE odpowiedzi.odpowiedz='$odp' AND odpowiedzi.o_p_id=(SELECT p_id from pytania where p_a_id='$a_id')"
    //$sql = "INSERT INTO polacz(con_id, con_a_id, con_o_id) VALUES ('','$a_id','$o_id')";
    $sql2 = "UPDATE mail SET odpowiedz='1' WHERE mail='$user' AND m_a_id='$a_id'";
    $result = $connect->query($sql2);

}
//$sql2 = "UPDATE mail SET odpowiedz='1' WHERE mail='$user'";
//$result = $connect->query($sql2);


?>