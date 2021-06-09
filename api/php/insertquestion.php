<?php
/**
 * Plik odpowiada za wpisywanie pytań podanych podczas tworzenia ankiety do tabeli pytania
 */
include 'connect.php';

session_start();
$user = $_SESSION['name'];
$sql = "SELECT * from ankieta WHERE a_id=(SELECT max(a_id) from ankieta)AND tworca='$user'";

$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $pyt = $_POST['pyt'];

    while ($row = $result->fetch_assoc()) {
        $a = $row["a_id"];

        $zp = "INSERT INTO pytania(p_id, pytanie, p_t_id, p_a_id) VALUES ('','$pyt','1','$a')";
        $result = $connect->query($zp);
    }
}

$connect->close();
