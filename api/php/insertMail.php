<?php
/**
 * Plik odpowiada za wpisywanie danych to tabeli mail
 */
include 'connect.php';

session_start();
$wartosc = $_POST['war'];
$user = $_SESSION['name'];
$i;
$tab = [];
$sql = "SELECT * from ankieta WHERE a_id=(SELECT max(a_id) from ankieta)AND tworca='$user'";

$result = $connect->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $a = $row["a_id"];
    }}

echo $wartosc;
for ($i = 0; $i < $wartosc; $i++) {
    $tab[$i] = $_POST['m' . $i];
    $zp = "INSERT INTO mail(mail_id, mail, odpowiedz, m_a_id) VALUES ('','$tab[$i]','0','$a')";
    $result = $connect->query($zp);
}
header("Location: http://127.0.0.1/Projekt-1/api/create.php");
$connect->close();

