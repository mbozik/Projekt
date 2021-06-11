<?php
/**
 * Plik odpowiada za połączenie z bazą danych.
 */ 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// tworzenie połączenia
$connect = new mysqli($servername, $username, $password, $dbname);
