<?php
include('db.php');
$key = $_POST['key'];

$sql = "SELECT * from  ankieta(a_id, a_temat, a_opis) VALUES ('','$title','$description')";
$result = $connect->query($sql);
