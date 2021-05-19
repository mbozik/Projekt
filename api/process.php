<?php

include('php/db.php');
// session_start();
$i = $_POST['i'];
// $description = $_POST['survey_opis'];

// $sql = "INSERT INTO ankieta(a_id, a_temat, a_opis) VALUES ('','$i','$i')";
// $sql = "INSERT INTO pytania(p_id, pytanie, p_t_id, p_a_id) VALUES ('','$i','1','114')";

// $result = $connect->query($sql);

$query = "SELECT email FROM users";
$result = $connect->query($query);

while ($row = $result->fetch_assoc()) {
    $pid = $row["email"];
}

$zp = "INSERT INTO pytania(p_id, pytanie, p_t_id, p_a_id) VALUES ('','','1','114')";
$result = $connect->query($zp);