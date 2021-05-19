<?php

include('php/db.php');
$i = $_POST['i'];
// $description = $_POST['survey_opis'];

// $sql = "INSERT INTO ankieta(a_id, a_temat, a_opis) VALUES ('','$i','$i')";
$sql = "INSERT INTO pytania(p_id, pytanie, p_t_id, p_a_id) VALUES ('','$i','1','114')";
// $id = "SELECT p_id FROM pytania WHERE pytanie="$i"";
// $zp = "INSERT INTO ankieta(a_id, a_temat, a_opis) VALUES ('','$id','$id')";

$result = $connect->query($sql);