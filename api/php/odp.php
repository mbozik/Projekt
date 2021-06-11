<?php
/**
 * Plik odpowiada 
 */
include 'connect.php';

$validation_error = '';
$user = $_SESSION['name'];

$test = "SELECT * FROM mail INNER JOIN ankieta ON mail.m_a_id=ankieta.a_id where mail='$user' AND odpowiedz='0'";
$result = mysqli_query($connect, $test);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "Ankieta :<a href='survey.php?name=" . $row['a_temat'] . "'>" . $row['a_temat'] . "</a><br>";}
}
