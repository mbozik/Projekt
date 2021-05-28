<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$connect = new mysqli($servername, $username, $password, $dbname);

$pytanie = $_POST['survey_title'];
$description = $_POST['survey_opis'];