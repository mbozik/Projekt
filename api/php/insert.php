<?php
/**
 * Plik wpisuje dane do tabeli ankieta  oraz przekierowuje do strony odpowiadającej za dodawanie pytań
 */

include 'connect.php';

session_start();
$validation_error = '';

$title = $_POST['survey_title'];
$description = $_POST['survey_opis'];
$user = $_SESSION['name'];
$wartosc = $_POST['wartosc'];

$zapytanie = "SELECT a_temat FROM ankieta WHERE a_temat = '$title'";
$result2 = mysqli_query($connect, $zapytanie);

if (mysqli_num_rows($result2) == null) {
    $sql = "INSERT INTO ankieta(a_id, a_temat, a_opis, tworca) VALUES ('','$title','$description','$user')";
    $result = $connect->query($sql);
    $connect->close();


    header("Location: http://127.0.0.1/projekt-1/api/question.php");} else {
    $validation_error = 'Podana ankieta istnieje';
    header("refresh:4;url=http://127.0.0.1/projekt-1/api/create.php");

    echo '<body style="background-color: #366d7e;"><p style="margin:0 auto; margin-top:20%; padding:5%; width:60%; text-align:center; background-color: #e7586287;font-size:25px;border:solid 2px black;">Ankieta ' . $title . ' istnieje już w bazie.<br> Za 4 sekund zostaniesz przeniesiony do strony z tworzeniem ankiety.</p>';
}
