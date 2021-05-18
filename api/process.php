<?php

include('php/db.php');
$i = $_POST['i'];
// $description = $_POST['survey_opis'];

$sql = "INSERT INTO ankieta(a_id, a_temat, a_opis) VALUES ('','$i','$i')";
$result = $connect->query($sql);