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
$join="";
$hashId="";


for($k=1;$k<$wynik+1;$k++){
    $odp=$_POST['q'.$k];
    $que=$_POST['p'.$k];
    $name=$_POST['nazwa_t'];
    echo $odp;
    // echo $que;
    //echo $name;
    //$sql ="SELECT a_id FROM ankieta WHERE ankieta.a_temat='$name'";
    $sql ="SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta ON ankieta.a_id=pytania.p_a_id WHERE tworca='$user' AND a_temat='$name' AND odpowiedz='$odp'";

    $result = $connect->query($sql);
    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
                $a_id=$row['a_id'];
                $o_id=$row['o_id'];
               
                // echo $o_id;
        }
    }
    // echo $a_id;
     //echo $o_id."<Br>";
     $sql1 = "INSERT INTO polacz(con_id, con_a_id, con_o_id) VALUES ('','$a_id','$o_id')";
     $result = $connect->query($sql1);
    
    $join = $join." ".$odp;

    //$sql3="SELECT * FROM odpowiedzi WHERE odpowiedzi.odpowiedz='$odp' AND odpowiedzi.o_p_id=(SELECT p_id from pytania where p_a_id='$a_id')";
    // $sql4 = "INSERT INTO polacz(con_id, con_a_id, con_o_id) VALUES ('','$a_id','$o_id')";
    // $result = $connect->query($sql4);

    // $sql2 = "UPDATE mail SET odpowiedz='1' WHERE mail='$user' AND m_a_id='$a_id'";
    // $result = $connect->query($sql2);

}
$sql2 = "UPDATE mail SET odpowiedz='1' WHERE mail='$user'";
$result = $connect->query($sql2);

$join = $join." " . $user. " ". $a_id;
echo $join;
$hash = md5($join);
$sql2 = "INSERT INTO hash(h_id, hash) VALUES ('','$hash')";
$result = $connect->query($sql2);

$sql4 = "SELECT h_id FROM hash WHERE hash='$hash'";
$result = $connect->query($sql4);
while($row = $result->fetch_assoc()) {
    $hashId=$row["h_id"];
    
}

for($k=1;$k<$wynik+1;$k++){
    $odp=$_POST['q'.$k];
    $name=$_POST['nazwa_t'];
    $sql4 ="SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta ON ankieta.a_id=pytania.p_a_id WHERE a_temat='$name' AND odpowiedz='$odp'";
    $result = $connect->query($sql4);
    $oId="";
    while($row = $result->fetch_assoc()) {
        if($oId!=$row["o_id"]){
        $oId = $row["o_id"];
         $sql5 = "INSERT INTO polacz_hash(ph_id, ph_h_id, ph_o_id) VALUES ('','$hashId','$oId')";
         $result1 = $connect->query($sql5);}
    }
}
echo ("Hash: ".$hash);
$connect->close();
?>