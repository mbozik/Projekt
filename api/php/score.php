<?php
include('db.php');
$key = $_POST['key'];

$sql = "SELECT a_id from  ankieta;
$result = $connect->query($sql);
