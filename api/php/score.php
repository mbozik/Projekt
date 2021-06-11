<?php
/**
 * Plik odpowaida za wyświetlanie odpowiedzi
 */
include 'connect.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// tworzenie połączenia
$connect = new mysqli($servername, $username, $password, $dbname);

$user = $_SESSION['name'];
$sql = "SELECT * from ankieta where tworca='$user'";
$result = $connect->query($sql);
$tytul;
if ($result->num_rows > 0) {
    // output data of each row

    while ($row = $result->fetch_assoc()) {
        $tytul = $row["a_temat"];

        echo "<div><h1><p>" . $row["a_temat"] . "</a></h1><p>" . $row["a_opis"] . "</p><br><ul>";
        $id = $row["a_id"];
        $tem = $row["a_temat"];
        $sql2 = "SELECT * FROM odpowiedzi INNER JOIN pytania ON odpowiedzi.o_p_id=pytania.p_id INNER JOIN ankieta WHERE pytania.p_a_id=ankieta.a_id and p_a_id='$id'";
        $result2 = $connect->query($sql2);


        $zmienna = "";
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {

                if ($zmienna != $row["pytanie"]) {
                    echo "<div style='margin-top:2%;'><div style='background-color:#366d7ea1; padding: 8px; border-radius: 6px;'><p>" . "Pytanie: " . $row["pytanie"] . "</p><div style='background-color: #ffffff59; border-radius: 8px;     padding: 6px;'><p>Odpowiedzi</p>";

                    $zmienna = $row["pytanie"];
                    $pyt = $row["pytanie"];

                    $sql3 = "SELECT COUNT(con_o_id), odpowiedz FROM polacz INNER JOIN odpowiedzi ON odpowiedzi.o_id=polacz.con_o_id INNER JOIN ankieta on ankieta.a_id=polacz.con_a_id INNER JOIN pytania ON pytania.p_a_id=ankieta.a_id WHERE tworca='$user' AND a_temat='$tem' AND pytanie='$pyt' AND odpowiedzi.o_p_id=pytania.p_id GROUP BY con_o_id";
                    $result3 = $connect->query($sql3);

                    while ($row = $result3->fetch_assoc()) {
                        $xx = $row["COUNT(con_o_id)"];
                        echo "<li style='border-bottom: 1px dotted #00000030; list-style:none;'>" . " <span>" . $row["odpowiedz"] . "</span><br><div><span style='float:left;'>Liczba odpowiedzi: </span><div style='background-color:black; border-radius: 15px; color:white;margin-left: 120px; padding-left: 5px;width:" . $row["COUNT(con_o_id)"] . "9px; margin-bottom: 2px;height: 19px;'>" . $row["COUNT(con_o_id)"] . "</div></div></li>";
                    }
                    echo "</div>";
                    echo "</div>";
                }

       

            }

    

            ?>
    <!DOCTYPE HTML>
    <html>
    <head>

    </head>
    <body>

    </body>

    </html>     <?php

        }

        echo "</ul>";

    }

} else {
    echo "Brak ankiet.";
}
$connect->close();

?>

