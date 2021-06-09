<?php
/**
 * Plik wpisuje dane do tabeli połącz_hash, połącz, aktualizuje tabele mail oraz generuje kod hash
 */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";
// tworzenie połączenia
$connect = new mysqli($servername, $username, $password, $dbname);
$i = 1;
$wynik = $_POST['wynik'];
$a_id = "";
$o_id = "";
$user = $_SESSION['name'];
$hash = "";
$join = "";
$hashId = "";


//W pętli wpisywane są dane do tabeli w bazie danych oraz w zmiennnej $join tworzony jest ciąg odpowiedzi potrzebny do stworzenia hasha.
for ($k = 1; $k < $wynik + 1; $k++) {
    $odp = $_POST['q' . $k];
    $que = $_POST['p' . $k];
    $name = $_POST['nazwa_t'];

    $sql = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta ON ankieta.a_id=pytania.p_a_id WHERE tworca='$user' AND a_temat='$name' AND odpowiedz='$odp'";

    $result = $connect->query($sql);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $a_id = $row['a_id'];
            $o_id = $row['o_id'];

        }
    }

    $sql1 = "INSERT INTO polacz(con_id, con_a_id, con_o_id) VALUES ('','$a_id','$o_id')";
    $result = $connect->query($sql1);

    $join = $join . " " . $odp;

}
//zapytanie aktualizuje tabele mail aby użytkownik nie mógł udzielic dwa razy tej amej odpowiedzi na daną ankietę
$sql2 = "UPDATE mail SET odpowiedz='1' WHERE mail='$user'";
$result = $connect->query($sql2);
//przypisanie nazwy użytkownika orazd id ankiety do zmiennej $join zawierającej ciąg odpowiedzi
$join = $join . " " . $user . " " . $a_id;
//stworzenie kodu hash w md5
$hash = md5($join);
$sql2 = "INSERT INTO hash(h_id, hash) VALUES ('','$hash')";
$result = $connect->query($sql2);

$sql4 = "SELECT h_id FROM hash WHERE hash='$hash'";
$result = $connect->query($sql4);
while ($row = $result->fetch_assoc()) {
    $hashId = $row["h_id"];
}
//W pętli wpisywane są odpowiedzi do tabeli połącz hash znajudjącej się w bazie danych, które ptrzebne są w celu werfikacji swoich odpowiedzi
for ($k = 1; $k < $wynik + 1; $k++) {
    $odp = $_POST['q' . $k];
    $name = $_POST['nazwa_t'];
    $sql4 = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta ON ankieta.a_id=pytania.p_a_id WHERE tworca='$user' AND a_temat='$name' AND odpowiedz='$odp'";
    $result = $connect->query($sql4);
    while ($row = $result->fetch_assoc()) {
        $oId = $row["o_id"];
        $sql5 = "INSERT INTO polacz_hash(ph_id, ph_h_id, ph_o_id) VALUES ('','$hashId','$oId')";
        $result1 = $connect->query($sql5);
    }
}
echo ("Hash: " . $hash);
$connect->close();
